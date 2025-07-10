<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Campign;
use DB;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class CampignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    
    public function index()
    {
        $data = DB::table('campign')
            ->leftJoin('transaksis', function($join) {
                $join->on('campign.id', '=', 'transaksis.id_campign')
                    ->where('transaksis.status', 'settlement'); // ⬅️ pindah ke sini
            })
            ->select('campign.*', DB::raw('SUM(transaksis.nominal) as terkumpul'))
            ->groupBy('campign.id')
            ->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('aksi', function ($data) {
                return view('button.button')->with('data', $data);
            })
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(Request $request)
{
    $validasi = Validator::make(
        $request->all(),
        [
            // Contoh validasi
            'image_campign' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'keluhan' => 'required',
            'perusahaan' => 'required',
            // 'terkumpul' => 'required|numeric',
            'target_waktu' => 'required|date',
            'target_uang' => 'required|numeric',
            'waktu_mulai_donasi' => 'required|date',
        ],
        [
            'image_campign.required' => ' Image Wajib Di Isi',
            'keluhan.required' => ' Keluhan Wajib Di Isi',
            'perusahaan.required' => ' Perusahaan Wajib Di Isi',
            // 'terkumpul.required' => ' Terkumpul Wajib Di Isi',
            'target_waktu.required' => ' Target Waktu Wajib Di Isi',
            'target_uang.required' => ' Target Uang Wajib Di Isi',
        ]
    );

    if ($validasi->fails()) {
        return response()->json(['errors' => $validasi->errors()]);
    }

    // Validasi tanggal
    if ($request->target_waktu <= $request->waktu_mulai_donasi) {
        return response()->json(['errors' => 'Maaf, tanggal target tidak boleh lebih kecil dari waktu mulai']);
    }

    // Handle image
    $imageName = null;
    if ($request->hasFile('image_campign')) {
        $file = $request->file('image_campign');
        $imageName = $file->getClientOriginalName();
        $file->storeAs('public/images', $imageName);
    }

    // Simpan atau update data
    $campign = Campign::updateOrCreate(
        ['id' => $request->id_data], // kolom pencocokan, bisa diganti 'slug', 'kode', dll.
        [
            'image' => $imageName,
            'keluhan' => $request->keluhan,
            'perusahaan' => $request->perusahaan,
            'terkumpul' => $request->terkumpul,
            'target_uang' => $request->target_uang,
            'target_waktu' => $request->target_waktu,
            'target_unix' => strtotime($request->target_waktu),
            'waktu_mulai_donasi' => $request->waktu_mulai_donasi,
        ]
    );

    return response()->json([
        'success' => 'Berhasil Menyimpan Data',
        'data' => $campign,
    ]);
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
     $data = DB::table('campign')
            ->leftJoin('transaksis', function($join) {
                $join->on('campign.id', '=', 'transaksis.id_campign')
                    ->where('transaksis.status', 'settlement');
            })
            ->select('campign.*', DB::raw('SUM(transaksis.nominal) as terkumpul'))
            ->where('campign.id', $id)
            ->groupBy('campign.id')
            ->first();


    return response()->json(['result' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return response()->json(['success' => $request->all()]);


        Campign::where('id', $id)->update(['terkumpul' => $request->terkumpul]);
        Transaksi::create([
            'nominal' => $request->nominal,
            'nama_donatur' => $request->nama_donatur,
            'id_campign' => $id,
        ]);




        return response()->json(['success' => "Berhasil Melakukan Update Data"]);
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Campign::where('id', $id)->delete();
    }
}

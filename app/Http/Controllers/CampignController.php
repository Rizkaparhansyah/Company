<?php

namespace App\Http\Controllers;

use App\Models\Campign;
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
        $data = Campign::where('id', '!=', null);
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
                // 'keluhan' => 'required',
                // 'perusahaan' => 'required',
                // 'terkumpul' => 'required',
                // 'target_waktu' => 'required',
                // 'target_uang' => 'required',

            ],
            [
                'image.required' => ' Image Wajib Di Isi',
                'keluhan.required' => ' Keluhan Wajib Di Isi',
                'perusahaan.required' => ' perusahaan Wajib Di Isi',
                'terkumpul.required' => ' terkumpul Wajib Di Isi',
                'target_waktu.required' => ' target waktu Wajib Di Isi',
                'target_uang.required' => ' Target Uang Wajib Di Isi',
            ]

        );

        if ($validasi->fails()) {

            return response()->json(['errors' => $validasi->errors()]);
        } else {
            if ($request->target_waktu <= $request->waktu_mulai_donasi) {
                return response()->json(['gagal' => 'Maaf tanggal target tidak boleh lebih kecil dari watu mulai']);
            }
            $campign = new Campign();

            if ($request->image != '') {
                $folderPath = "storage/images/";
                $image_parts = explode(";base64,", $request->image);
                $image_base64 = base64_decode($image_parts[1]);
                $image_name = $request->image_name;
                $file = $folderPath . $image_name;
                file_put_contents($file, $image_base64);

                $campign->image = $image_name;
            } else {
                $campign->image = null;
            }

            $campign->target_unix = strtotime($request->target_waktu);
            $campign->waktu_mulai_donasi = $request->waktu_mulai_donasi;
            $campign->keluhan = $request->keluhan;
            $campign->target_uang = $request->target_uang;
            $campign->perusahaan = $request->perusahaan;
            $campign->terkumpul = $request->terkumpul;
            $campign->target_waktu = $request->target_waktu;

            $campign->save();

            return response()->json([
                'success' => "Berhasil Melakukan Tambah Data",
                'error' => 'Maaf tanggal target tidak boleh lebih kecil dari watu mulai'
            ]);
        }
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
        $data = Campign::where('id', $id)->first();
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
        // $validasi = Validator::make(
        //     $request->all(),
        //     [
        //         'image' => 'required',
        //         'keluhan' => 'required',
        //         'perusahaan' => 'required',
        //         'terkumpul' => 'required',
        //         'target_waktu' => 'required',
        //         'target_uang' => 'required',

        //     ],
        //     [
        //         'image.required' => ' Image Wajib Di Isi',
        //         'keluhan.required' => ' Keluhan Wajib Di Isi',
        //         'perusahaan.required' => ' perusahaan Wajib Di Isi',
        //         'terkumpul.required' => ' terkumpul Wajib Di Isi',
        //         'target_waktu.required' => ' target waktu Wajib Di Isi',
        //         'target_uang.target_waktu.required' => ' Target Uang Wajib Di Isi',
        //     ]
        // );

        // if ($validasi->fails()) {
        //     return response()->json(['errors' => $validasi->errors()]);
        // } else {
        $campign = new Campign;
        // if ($request->image != '') {
        //     $folderPath = "storage/images/";
        //     $image_parts = explode(";base64,", $request->image);
        //     $image_base64 = base64_decode($image_parts[1]);
        //     $image_name = $request->image_name;
        //     $file = $folderPath . $image_name;
        //     file_put_contents($file, $image_base64);

        //     $campign->image = $image_name;
        // } else {
        //     $campign->image = null;
        // }

        $campign->target_unix = strtotime($request->target_waktu);
        $campign->image = $request->image;
        $campign->waktu_mulai_donasi = $request->waktu_mulai_donasi;
        $campign->keluhan = $request->keluhan;
        $campign->target_uang = $request->target_uang;
        $campign->perusahaan = $request->perusahaan;
        $campign->terkumpul = $request->terkumpul;
        $campign->target_waktu = $request->target_waktu;


        $data = $campign->toArray();
        Campign::where('id', $id)->update($data);
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

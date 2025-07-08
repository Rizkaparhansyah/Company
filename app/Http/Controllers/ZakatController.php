<?php

namespace App\Http\Controllers;

use App\Models\Zakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class ZakatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Zakat::where('id', '!=', null);
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('aksi', function ($data) {
                return view('button.buttonZakat')->with('data', $data);
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
                'nama' => 'required',
                'jml_donasi' => 'required',
                'tipe_zakat' => 'required',

            ],
            [
                'nama.required' => ' nama Wajib Di Isi',
                'tipe_zakat.required' => ' tipe zakat Wajib Di Isi',
                'jml_donasi.required' => ' donasi Wajib Di Isi',
            ]
        );

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()]);
        } else {
            
            
            $data = [
                'nama_donatur' => $request->nama,
                'tipe_zakat' => $request->tipe_zakat,
                'nik' => $request->nik,
                'jml_donasi' => $request->jml_donasi,
            ];

            Zakat::updateOrCreate(['id' => $request->data_id],$data);
            return response()->json(['success' => "Berhasil"]);
       
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
        $data = Zakat::where('id', $id)->first();
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
        $validasi = Validator::make(
            $request->all(),
            [
                'nama' => 'required',
                'jml_donasi' => 'required',
                'tipe_zakat' => 'required',

            ],
            [
                'nama.required' => ' nama Wajib Di Isi',
                'tipe_zakat.required' => ' tipe zakat Wajib Di Isi',
                'jml_donasi.required' => ' donasi Wajib Di Isi',
            ]
        );

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()]);
        } else {
            $inspirasi = new Zakat();
            $inspirasi->nama_donatur = $request->nama;
            $inspirasi->tipe_zakat = $request->tipe_zakat;
            $inspirasi->nik = $request->nik;
            $inspirasi->jml_donasi = $request->jml_donasi;
            $data = $inspirasi->toArray();
            Zakat::where('id', $id)->update($data);
            return response()->json(['success' => "Berhasil Melakukan Update Data"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Zakat::where('id', $id)->delete();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Inspirasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class InspirasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Inspirasi::where('id', '!=', null);
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
                'image_inspirasi' => 'required',
                'description_inspirasi' => 'required',

            ],
            [
                'image_inspirasi.required' => ' Image Wajib Di Isi',
                'description_inspirasi.required' => ' Description Wajib Di Isi',
            ]
        );

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()]);
        } else {
            $inspirasi = new Inspirasi;

            if ($request->image_inspirasi != '') {
                $folderPath = "storage/images/";
                $image_parts = explode(";base64,", $request->image_inspirasi);
                $image_base64 = base64_decode($image_parts[1]);
                $image_name = $request->nama_file_inspirasi;
                $file = $folderPath . $image_name;
                file_put_contents($file, $image_base64);

                $inspirasi->image_inspirasi = $image_name;
            } else {
                $inspirasi->image_inspirasi = null;
            }

            $inspirasi->description_inspirasi = $request->description_inspirasi;


            $inspirasi->save();

            return response()->json(['success' => "Berhasil Melakukan Tambah Data"]);
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
        $data = Inspirasi::where('id', $id)->first();
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
                'image_inspirasi' => 'required',
                'description_inspirasi' => 'required',

            ],
            [
                'image_inspirasi.required' => ' Image Wajib Di Isi',
                'description_inspirasi.required' => ' Description Wajib Di Isi',
            ]
        );

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()]);
        } else {
            $inspirasi = new Inspirasi;

            if ($request->image_inspirasi != '') {
                $folderPath = "storage/images/";
                $image_parts = explode(";base64,", $request->image_inspirasi);
                $image_base64 = base64_decode($image_parts[1]);
                $image_name = $request->nama_file_inspirasi;
                $file = $folderPath . $image_name;
                file_put_contents($file, $image_base64);

                $inspirasi->image_inspirasi = $image_name;
            } else {
                $inspirasi->image_inspirasi = null;
            }

            $inspirasi->description_inspirasi = $request->description_inspirasi;


            $data = $inspirasi->toArray();
            Inspirasi::where('id', $id)->update($data);
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
        Inspirasi::where('id', $id)->delete();
    }
}

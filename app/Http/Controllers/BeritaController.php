<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Berita::all();
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
        // dd($request);
        $validasi = Validator::make(
            $request->all(),
            [
                'image' => 'required',
                'description' => 'required',

            ],
            [
                'image.required' => ' Image Wajib Di Isi',
                'description.required' => ' Description Wajib Di Isi',
            ]
        );

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()]);
        } else {
            $berita = new Berita;

            if ($request->image != '') {
                $folderPath = "storage/images/";
                $image_parts = explode(";base64,", $request->image);
                $image_base64 = base64_decode($image_parts[1]);
                $image_name = $request->nama_file;
                $file = $folderPath . $image_name;
                file_put_contents($file, $image_base64);

                $berita->image = $image_name;
            } else {
                $berita->image = null;
            }


            $berita->description = $request->description;


            $berita->save();

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
        $data = Berita::where('id', $id)->first();
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
                'image' => 'required',
                'description' => 'required',

            ],
            [
                'image.required' => ' Image Wajib Di Isi',
                'description.required' => ' Description Wajib Di Isi',
            ]
        );

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()]);
        } else {
            $berita = new Berita;
            if ($request->image != '') {
                $folderPath = "storage/images/";
                $image_parts = explode(";base64,", $request->image);
                $image_base64 = base64_decode($image_parts[1]);
                $image_name = $request->nama_file;
                $file = $folderPath . $image_name;
                file_put_contents($file, $image_base64);

                $berita->image = $image_name;
            } else {
                $berita->image = null;
            }
            $berita->description = $request->description;
            $data = $berita->toArray();
            Berita::where('id', $id)->update($data);
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
        Berita::where('id', $id)->delete();
    }
}

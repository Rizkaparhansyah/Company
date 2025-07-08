<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Hero::all();
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
                'name_brand' => 'required',
                'sosmed_whatsapp' => 'required',
                'sosmed_instagram' => 'required',
                'sosmed_facebook' => 'required',
            ],
            [
                'name_brand.required' => ' Nama Brand Wajib Di Isi',
                'sosmed_whatsapp.required' => ' No Whatsapp Wajib Di Isi',
                'sosmed_instagram.required' => 'Link instagram Wajib Di Isi',
                'sosmed_facebook.required' => 'Link facebook Wajib Di Isi',
            ]
        );

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()]);
        } else {

            $data = [
                'name_brand' => $request->name_brand,
                'sosmed_whatsapp' => $request->sosmed_whatsapp,
                'sosmed_instagram' => $request->sosmed_instagram,
                'sosmed_facebook' => $request->sosmed_facebook,

            ];
            $hero = Hero::first();

            if ($hero) {
                $hero->update($data); // update jika ada
            } else {
                Hero::create($data); // create jika belum ada
            }

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
        $data = Hero::where('id', $id)->first();
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
                'name_brand' => 'required',
                'sosmed_whatsapp' => 'required',
                'sosmed_instagram' => 'required',
                'sosmed_facebook' => 'required',
            ],
            [
                'name_brand.required' => ' Nama Brand Wajib Di Isi',
                'sosmed_whatsapp.required' => ' No Whatsapp Wajib Di Isi',
                'sosmed_instagram.required' => 'Link instagram Wajib Di Isi',
                'sosmed_facebook.required' => 'Link facebook Wajib Di Isi',
            ]
        );

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()]);
        } else {

            $data = [
                'name_brand' => $request->name_brand,
                'sosmed_whatsapp' => $request->sosmed_whatsapp,
                'sosmed_instagram' => $request->sosmed_instagram,
                'sosmed_facebook' => $request->sosmed_facebook,

            ];

            Hero::where('id', $id)->update($data);
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
        Hero::where('id', $id)->delete();
         return response()->json(['success' => "Berhasil"]);
    }
}

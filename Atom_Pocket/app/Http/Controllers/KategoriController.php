<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing category data from database.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = DB::table('kategori')->get();
        return view('',compact('kategori'));
    }


    /**
     * Store a newly created category resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Kategori::create([
            'Nama' => $request->Nama,
            'Deskripsi' => $request->Deskripsi,
            'Status_ID' => $request->Status_ID,

        ]);

        return redirect('/');
    }

    /**
     * Display category data according to the required id.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategori = Kategori::find($id);
        return view('',compact('kategori'));
    }

    /**
     * showing category form with id=$id to edit data.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = Kategori::find($id);
        return view('edit-kategori',compact('kategori'));
    }

    /**
     * Update the specified category data in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $kategori = Kategori::find($id);
        $kategori->Nama=$request->Kode;
        $kategori->Deskripsi=$request->Deskripsi;
        $kategori->Status_ID=$request->Status_ID;

        $kategori->save();
        return redirect()->intended('admins');
    }

    /**
     * Delete specified category data using id in database.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Respons e
     */
    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();
        return redirect('admins');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing transaction data from database.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi=Transaksi::all();
        return view('',compact('transaksi'));
    }


    /**
     * Store a newly created transaction in to database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Transaksi::create([
            'Kode' => $request->Kode,
            'Deskripsi' => $request->Deskripsi,
            'Tanggal' => $request->Tanggal,
            'Dompet_ID' => $request->Dompet_ID,
            'Kategori_ID' => $request->Kategori_ID,
            'Status_ID' => $request->Status_ID,

        ]);

        return redirect('/');
    }

    /**
     * Display transaction data according to the required id.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksi = Transaksi::find($id);
        return view('',compact('transaksi'));
    }

    /**
     * showing transaction form with id=$id to edit data.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaksi = transaksi::find($id);
        return view('edit-transaksi',compact('transaksi'));
    }

    /**
     * Update the specified transaction data in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->Kode=$request->Kode;
        $transaksi->Deskripsi=$request->Deskripsi;
        $transaksi->Tanggal=$request->Tanggal;
        $transaksi->Nilai=$request->Nilai;
        $transaksi->Dompet_ID=$request->Dompet_ID;
        $transaksi->Kategori_ID=$request->Kategori_ID;
        $transaksi->Status_ID=$request->Status_ID;

        $transaksi->save();
        return redirect()->intended('admins');
    }

    /**
     * Delete specified transaction data using id in database.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->delete();
        return redirect('admins');
    }
}

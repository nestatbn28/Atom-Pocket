<?php

namespace App\Http\Controllers;

use App\Models\Dompet;
use Illuminate\Http\Request;

class DompetController extends Controller
{
    /**
     * Display a listing wallet data from database.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dompet = DB::table('dompet')->get();
        return view('',compact('dompet'));
    }

    

    /**
     * Store a newly created wallet in to database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Dompet::create([
            'Nama' => $request->Nama,
            'Referensi' => $request->Referensi,
            'Deskripsi' => $request->Deskripsi,
            'Status_ID' => $request->Status_ID,
        ]);

        return redirect('/');
    }

    /**
     * Display wallet data according to the required id.
     *
     * @param  \App\Models\Dompet  $dompet
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dompet = Dompet::find($id);
        return view('',compact('dompet'));
    }

    /**
     * showing wallet form with id=$id to edit data.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dompet = Dompet::find($id);
        return view('edit-dompet',compact('dompet'));
    }

    /**
     * Update the specified wallet data in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dompet  $dompet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dompet = Dompet::find($id);
        $dompet->Nama=$request->Nama;
        $dompet->Referensi=$request->Referensi;
        $dompet->Deskripsi=$request->Deskripsi;
        $dompet->Status_ID=$request->Status_ID;

        $dompet->save();
        return redirect()->intended('admins');
    }

    /**
     * Delete specified wallet data using id in database.
     *
     * @param  \App\Models\Dompet  $dompet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dompet = Dompet::find($id);
        $dompet->delete();
        return redirect('admins');
    }
}

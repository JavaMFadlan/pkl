<?php

namespace App\Http\Controllers;

use App\kelurahan;
use App\rw;
use Illuminate\Http\Request;

class RwController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rw = rw::with('kelurahan')->get();
        return view('admin.rw.index',compact('rw'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelurahan = kelurahan::all();
        return view('admin.rw.create',compact('kelurahan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rw = new rw();
        $rw->id_kel = $request->id_kel;
        $rw->nama_rw = $request->nama;
        $rw->kode_rw = $request->kode;
        $rw->save();
        return redirect()->route('rw.index')->with(['message' => 'Berhasil']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\rw  $rw
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rw = rw::findorFail($id);
        $kelurahan = kelurahan::findorfail($rw->id_kel);
        return view('admin.rw.show',compact('rw','kelurahan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\rw  $rw
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rw = rw::findorFail($id);
        $kelurahan = kelurahan::all();
        return view('admin.rw.edit',compact('rw','kelurahan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\rw  $rw
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rw = rw::findorfail($id);
        $rw->id_kel = $request->id_kel;
        $rw->kode_rw = $request->kode;
        $rw->nama_rw = $request->nama;
        $rw->update();
        return redirect()->route('rw.index')->with(['message' => 'Berhasil']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\rw  $rw
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rw = rw::findorfail($id)->delete();
        return redirect()->route('rw.index')->with(['message1' => 'Data Berhasil Dihapus']);
    }
}

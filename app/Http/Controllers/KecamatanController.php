<?php

namespace App\Http\Controllers;

use App\kecamatan;
use App\kota;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kecamatan = kecamatan::with('kota')->get();
        return view('admin.kecamatan.index',compact('kecamatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kota = kota::all();
        return view('admin.kecamatan.create',compact('kota'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kecamatan = new kecamatan();
        $kecamatan->id_kota = $request->id_kota;
        $kecamatan->nama_kec = $request->nama;
        $kecamatan->kode_kec = $request->kode;
        $kecamatan->save();
        return redirect()->route('kecamatan.index')->with(['message' => 'Berhasil']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kecamatan = kecamatan::findorFail($id);
        $kota = kota::findorfail($kecamatan->id_kota);
        return view('admin.kecamatan.show',compact('kecamatan','kota'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kecamatan = kecamatan::findorFail($id);
        $kota = kota::all();
        return view('admin.kecamatan.edit',compact('kecamatan','kota'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kecamatan = kecamatan::findorfail($id);
        $kecamatan->id_kota = $request->id_kota;
        $kecamatan->kode_kec = $request->kode;
        $kecamatan->nama_kec = $request->nama;
        $kecamatan->update();
        return redirect()->route('kecamatan.index')->with(['message' => 'Berhasil']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kecamatan = kecamatan::findorfail($id)->delete();
        return redirect()->route('kecamatan.index')->with(['message1' => 'Data Berhasil Dihapus']);
    }
}

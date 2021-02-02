<?php

namespace App\Http\Controllers;

use App\kota;
use App\provinsi;
use Illuminate\Http\Request;


class KotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $success = 200;
    public function index()
    {
        $kota = kota::with('provinsi')->get();
        return view('admin.kota.index',compact('kota'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinsi = provinsi::all();
        return view('admin.kota.create',compact('provinsi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi',
            'min' => ':attribute harus diisi minimal :min karakter ',
            'numeric' => 'kode kota Harus Angka',
            'unique' => 'kode kota telah terpakai',
        ];  
        $this->validate($request, [
                    'id_prov' => 'required',
                    'nama' => 'required|min:5',
                    'kode' => 'required|numeric|unique:kotas,kode_kota',
        ], $messages
        );
        $kota = new kota();
        $kota->id_prov = $request->id_prov;
        $kota->nama_kota = $request->nama;
        $kota->kode_kota = $request->kode;
        $kota->save();
        return redirect()->route('kota.index')->with(['message' => 'Berhasil']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kota = kota::findorFail($id);
        $provinsi = provinsi::findorfail($kota->id_prov);
        return view('admin.kota.show',compact('kota','provinsi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kota = kota::findorFail($id);
        $provinsi = provinsi::all();
        return view('admin.kota.edit',compact('kota','provinsi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'required' => ':attribute wajib diisi',
            'min' => ':attribute harus diisi minimal :min karakter ',
            'numeric' => 'kode kota Harus Angka',
            'unique' => 'kode kota telah terpakai'
        ];
        $this->validate($request, [
            'id_prov' => 'required',
            'nama' => 'required|min:5',
            'kode' => "required|numeric|unique:kotas,kode_kota,$id",
        ], $messages);
        $kota = kota::findorfail($id);
        $kota->id_prov = $request->id_prov;
        $kota->kode_kota = $request->kode;
        $kota->nama_kota = $request->nama;
        $kota->update();
        return redirect()->route('kota.index')->with(['message' => 'Berhasil']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kota = kota::findorfail($id)->delete();
        return redirect()->route('kota.index')->with(['message1' => 'Data Berhasil Dihapus']);
    }

    public function Apikota()
    {
        $kota = kota::all();
        return response()->json(['status' => 200 , 'data' => $kota], $this->success);
    }
}

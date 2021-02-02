<?php

namespace App\Http\Controllers;

use App\kelurahan;
use App\kecamatan;
use Illuminate\Http\Request;

class KelurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelurahan = kelurahan::with('kecamatan')->get();
        return view('admin.kelurahan.index',compact('kelurahan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $kecamatan = kecamatan::all();
        return view('admin.kelurahan.create',compact('kecamatan'));
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
            'numeric' => 'kode kelurahan Harus Angka',
            'unique' => 'kode kelurahan telah terpakai',
        ];  
        $this->validate($request, [
                    'id_kec' => 'required',
                    'nama' => 'required|min:5',
                    'kode' => "required|numeric|unique:kelurahans,kode_kel",
        ], $messages
        );
        $kelurahan = new kelurahan();
        $kelurahan->id_kec = $request->id_kec;
        $kelurahan->nama_kel = $request->nama;
        $kelurahan->kode_kel = $request->kode;
        $kelurahan->save();
        return redirect()->route('kelurahan.index')->with(['message' => 'Berhasil']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kelurahan = kelurahan::findorFail($id);
        $kecamatan = kecamatan::findorfail($kelurahan->id_kec);
        return view('admin.kelurahan.show',compact('kelurahan','kecamatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelurahan = kelurahan::findorFail($id);
        $kecamatan = kecamatan::all();
        return view('admin.kelurahan.edit',compact('kelurahan','kecamatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'required' => ':attribute wajib diisi',
            'min' => ':attribute harus diisi minimal :min karakter ',
            'numeric' => 'kode kelurahan Harus Angka',
            'unique' => 'kode kelurahan telah terpakai',
        ];  
        $this->validate($request, [
                    'id_kec' => 'required',
                    'nama' => 'required|min:5',
                    'kode' => "required|numeric|unique:kelurahans,kode_kel",
        ], $messages
        );
        $kelurahan = kelurahan::findorfail($id);
        $kelurahan->id_kec = $request->id_kec;
        $kelurahan->kode_kel = $request->kode;
        $kelurahan->nama_kel = $request->nama;
        $kelurahan->update();
        return redirect()->route('kelurahan.index')->with(['message' => 'Berhasil']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kelurahan = kelurahan::findorfail($id)->delete();
        return redirect()->route('kelurahan.index')->with(['message1' => 'Data Berhasil Dihapus']);
    }
}

<?php

namespace App\Http\Controllers;

use App\provinsi;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $success = 200;
    public function index()
    {
        $provinsi = provinsi::all();
        return view('admin.provinsi.index',compact('provinsi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.provinsi.create');
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
            'numeric' => ':attribute Harus Angka',
            'unique' => ':attribute telah terpakai'
        ];
        $this->validate($request, [
                    'nama' => 'required|min:5',
                    'kode' => 'required|numeric|unique:provinsis,kode_prov',
        ],$messages);
        $provinsi = new provinsi();
        $provinsi->kode_prov = $request->kode;
        $provinsi->nama_prov = $request->nama;
        $provinsi->save();
        return redirect()->route('provinsi.index')->with(['message' => 'Berhasil']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $provinsi = provinsi::findorfail($id);
            return view('admin.provinsi.show',compact('provinsi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $provinsi = provinsi::findorfail($id);
            return view('admin.provinsi.edit',compact('provinsi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'required' => ':attribute wajib diisi',
            'min' => ':attribute harus diisi minimal :min karakter ',
            'numeric' => ':attribute Harus Angka',
            'unique' => ':attribute telah terpakai'
        ];
        $this->validate($request, [
                    'nama' => 'required|min:5',
                    'kode' => "required|numeric|unique:provinsi,kode_prov,$id",
        ],$messages);
        $provinsi = provinsi::findorfail($id);
        $provinsi->kode_prov = $request->kode;
        $provinsi->nama_prov = $request->nama;
        $provinsi->update();
        return redirect()->route('provinsi.index')->with(['message' => 'Berhasil']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $provinsi = provinsi::findorfail($id)->delete();
        return redirect()->route('provinsi.index')->with(['message1' => 'Data Berhasil Dihapus']);
    }

    public function Apiprov()
    {
        // $provinsi = provinsi::all();
        // return response()->json(['status' => 200 , 'data' => $provinsi], $this->success);
    }
}

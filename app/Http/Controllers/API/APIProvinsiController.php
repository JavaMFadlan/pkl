<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\provinsi;
use App\kota;

class APIProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinsi = provinsi::all();
        $arr = [
            'status' => 200,
            'Total Data' => $provinsi->count(),
            'data' => $provinsi,
            'message' => 'Berhasil'
        ];
        return response()->json($arr, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode_prov'     => 'required|unique:provinsis',
            'nama_prov'   => 'required',
        ],
            [
                'kode_prov.required' => 'Masukkan Kode provinsi !',
                'kode_prov.unique' => 'kode telah terpakai !',
                'nama_prov.required' => 'Masukkan Nama Provinsi !',
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'data' => $validator->errors(),
                'message' => 'silahkan isi data yang kosong'
            ],400);
        }
        else{
            $provinsi = provinsi::create([
                'kode_prov' => $request->input('kode_prov'),
                'nama_prov' => $request->input('nama_prov')
            ]);

            if ($provinsi) {
                return response()->json([
                    'status' => true,
                    'message' => 'Berhasil'
                ],200);
            }
            else{
                return response()->json([
                    'status' => false,
                    'message' => 'Gagal'
                ],400);
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
        $provinsi = provinsi::whereId($id)->first();
        if ($provinsi) {
            return response()->json([
                'status' => true,
                'Total Data Kota' => $provinsi->kota->count(),
                'Total Data positif' => $provinsi->kota->count(),
                'data' => $provinsi,
                'message' => '^ isi post ^'
            ],200);
        }
        else {
            return response()->json([
                'status' => false,
                'data' => '',
                'message' => 'data tak ditemukan'
            ],404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $validator = Validator::make($request->all(), [
            'kode_prov'     => 'required|unique:provinsis',
            'nama_prov'   => 'required',
        ],
            [
                'kode_prov.required' => 'Masukkan Kode provinsi !',
                'kode_prov.unique' => 'kode telah terpakai !',
                'nama_prov.required' => 'Masukkan Nama Provinsi !',
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'data' => $validator->errors(),
                'message' => 'silahkan isi data yang kosong'
            ],400);
        }
        else{
            $provinsi = provinsi::whereId($id)->update([
                'kode_prov' => $request->input(kode_prov),
                'nama_prov' => $request->input(nama_prov)
            ]);

            if ($provinsi) {
                return response()->json([
                    'status' => true,
                    'message' => 'Berhasil diupdate'
                ],200);
            }
            else{
                return response()->json([
                    'status' => false,
                    'message' => 'Gagal diupdate'
                ],500);
            }
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
        $provinsi = provinsi::findOrFail($id);
        $provinsi->delete();
        if ($provinsi) {
            return response()->json([
                'status' => true,
                'message' => 'Berhasil dihapus'
            ],200);
        }
        else{
            return response()->json([
                'status' => false,
                'message' => 'Gagal dihapus'
            ],500);
        }
    }
}

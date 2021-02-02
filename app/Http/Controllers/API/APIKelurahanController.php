<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\kelurahan;
use App\tracking;
use App\rw;

class APIKelurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $join = DB::table('trackings')
                    ->select('positif', 'sembuh', 'meninggal')
                    ->join('rws' ,'trackings.id_rw', '=', 'rws.id')
                    ->join('kelurahans' ,'rws.id_kel', '=', 'kelurahans.id')
                    ->where('kelurahans.id', $id)
                    ->get();
        
        $join1 = DB::table('trackings')
                    ->select('positif', 'sembuh', 'meninggal')
                    ->join('rws' ,'trackings.id_rw', '=', 'rws.id')
                    ->join('kelurahans' ,'rws.id_kel', '=', 'kelurahans.id')
                    ->where('kelurahans.id', $id)
                    ->where('trackings.tanggal', date('Y-m-d'))
                    ->get();
        $arr1 = [
            'positif' =>$join->sum('positif'),
            'sembuh' =>$join->sum('sembuh'),
            'meninggal' =>$join->sum('meninggal'),
        ];
        $arr2 = [
            'positif' =>$join1->sum('positif'),
            'sembuh' =>$join1->sum('sembuh'),
            'meninggal' =>$join1->sum('meninggal'),
        ];
        $arr = [
            'status' => 200,
            'data' => [
                'Hari Ini' => $arr2,
                'total' => $arr1
            ],
            'message' => 'Berhasil'
        ];
        
        return response()->json($arr, 200);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\tracking;

class APIRwController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tracking = tracking::get('created_at')->last();
        $positif = tracking::where('tanggal', date('Y-m-d'))->sum('positif');
        $sembuh = tracking::where('tanggal', date('Y-m-d'))->sum('sembuh');
        $meninggal = tracking::where('tanggal', date('Y-m-d'))->sum('meninggal');

        $join = DB::table('trackings')
                    ->select('positif', 'sembuh', 'meninggal')
                    ->join('rws' ,'trackings.id_rw', '=', 'rws.id')
                    ->get();
        $arr1 = [
            'positif' =>$join->sum('positif'),
            'sembuh' =>$join->sum('sembuh'),
            'meninggal' =>$join->sum('meninggal'),
        ];
        $arr2 = [
            'positif' =>$positif,
            'sembuh' =>$sembuh,
            'meninggal' =>$meninggal,
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
        //
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

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\provinsi;
use App\kota;
use App\kecamatan;
use App\kelurahan;
use App\rw;
use App\tracking;

class APIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function provinsi()
    {
        $join1 = DB::table('trackings')
                    ->select(DB::raw('provinsis.id'),DB::raw('provinsis.nama_prov'),DB::raw('SUM(trackings.positif) as positif'),DB::raw('SUM(trackings.sembuh) as sembuh'),DB::raw('SUM(trackings.meninggal) as meninggal'))
                    ->join('rws' ,'trackings.id_rw', '=', 'rws.id')
                    ->join('kelurahans' ,'rws.id_kel', '=', 'kelurahans.id')
                    ->join('kecamatans' ,'kelurahans.id_kec', '=', 'kecamatans.id')
                    ->join('kotas' ,'kecamatans.id_kota', '=', 'kotas.id')
                    ->rightjoin('provinsis' ,'kotas.id_prov', '=', 'provinsis.id')
                    ->groupby('provinsis.id')
                    ->get();

        $join2 = DB::table('trackings')
                    ->select(DB::raw('provinsis.id'),DB::raw('provinsis.nama_prov'),DB::raw('SUM(trackings.positif) as positif'),DB::raw('SUM(trackings.sembuh) as sembuh'),DB::raw('SUM(trackings.meninggal) as meninggal'))
                    ->join('rws' ,'trackings.id_rw', '=', 'rws.id')
                    ->join('kelurahans' ,'rws.id_kel', '=', 'kelurahans.id')
                    ->join('kecamatans' ,'kelurahans.id_kec', '=', 'kecamatans.id')
                    ->join('kotas' ,'kecamatans.id_kota', '=', 'kotas.id')
                    ->join('provinsis' ,'kotas.id_prov', '=', 'provinsis.id')
                    ->whereDate('trackings.tanggal', date('Y-m-d'))
                    ->groupby('provinsis.id')
                    ->get();
        $arr = [
            'status' => 200,
            'data' => [ 
            'Hari Ini' =>[$join2],
            'Total' =>[$join1]
            ],
            'message' => 'Berhasil'
        ];
        return response()->json($arr, 200);
    }

    public function provinsi_show($id)
    {
        $join = DB::table('trackings')
                    ->select('positif', 'sembuh', 'meninggal')
                    ->join('rws' ,'trackings.id_rw', '=', 'rws.id')
                    ->join('kelurahans' ,'rws.id_kel', '=', 'kelurahans.id')
                    ->join('kecamatans' ,'kelurahans.id_kec', '=', 'kecamatans.id')
                    ->join('kotas' ,'kecamatans.id_kota', '=', 'kotas.id')
                    ->join('provinsis' ,'kotas.id_prov', '=', 'provinsis.id')
                    ->where('provinsis.id', $id)
                    ->get();
        
        $join1 = DB::table('trackings')
                    ->select('positif', 'sembuh', 'meninggal')
                    ->join('rws' ,'trackings.id_rw', '=', 'rws.id')
                    ->join('kelurahans' ,'rws.id_kel', '=', 'kelurahans.id')
                    ->join('kecamatans' ,'kelurahans.id_kec', '=', 'kecamatans.id')
                    ->join('kotas' ,'kecamatans.id_kota', '=', 'kotas.id')
                    ->join('provinsis' ,'kotas.id_prov', '=', 'provinsis.id')
                    ->where('provinsis.id', $id)
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

    public function kota()
    {
        $join1 = DB::table('trackings')
                    ->select(DB::raw('kotas.id'),DB::raw('kotas.nama_kota'),DB::raw('SUM(trackings.positif) as positif'),DB::raw('SUM(trackings.sembuh) as sembuh'),DB::raw('SUM(trackings.meninggal) as meninggal'))
                    ->join('rws' ,'trackings.id_rw', '=', 'rws.id')
                    ->join('kelurahans' ,'rws.id_kel', '=', 'kelurahans.id')
                    ->join('kecamatans' ,'kelurahans.id_kec', '=', 'kecamatans.id')
                    ->join('kotas' ,'kecamatans.id_kota', '=', 'kotas.id')
                    ->groupby('kotas.id')
                    ->get();

        $join2 = DB::table('trackings')
                    ->select(DB::raw('kotas.id'),DB::raw('kotas.nama_kota'),DB::raw('SUM(trackings.positif) as positif'),DB::raw('SUM(trackings.sembuh) as sembuh'),DB::raw('SUM(trackings.meninggal) as meninggal'))
                    ->join('rws' ,'trackings.id_rw', '=', 'rws.id')
                    ->join('kelurahans' ,'rws.id_kel', '=', 'kelurahans.id')
                    ->join('kecamatans' ,'kelurahans.id_kec', '=', 'kecamatans.id')
                    ->join('kotas' ,'kecamatans.id_kota', '=', 'kotas.id')
                    ->whereDate('trackings.tanggal', date('Y-m-d'))
                    ->groupby('kotas.id')
                    ->get();
        $arr = [
            'status' => 200,
            'data' => [ 
            'Hari Ini' =>[$join2],
            'Total' =>[$join1]
            ],
            'message' => 'Berhasil'
        ];
        return response()->json($arr, 200);
    }

    public function kota_show($id)
    {
        $join = DB::table('trackings')
                    ->select('positif', 'sembuh', 'meninggal')
                    ->join('rws' ,'trackings.id_rw', '=', 'rws.id')
                    ->join('kelurahans' ,'rws.id_kel', '=', 'kelurahans.id')
                    ->join('kecamatans' ,'kelurahans.id_kec', '=', 'kecamatans.id')
                    ->join('kotas' ,'kecamatans.id_kota', '=', 'kotas.id')
                    ->where('kotas.id', $id)
                    ->get();
        
        $join1 = DB::table('trackings')
                    ->select('positif', 'sembuh', 'meninggal')
                    ->join('rws' ,'trackings.id_rw', '=', 'rws.id')
                    ->join('kelurahans' ,'rws.id_kel', '=', 'kelurahans.id')
                    ->join('kecamatans' ,'kelurahans.id_kec', '=', 'kecamatans.id')
                    ->join('kotas' ,'kecamatans.id_kota', '=', 'kotas.id')
                    ->where('kotas.id', $id)
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

    public function kecamatan()
    {
        $join1 = DB::table('trackings')
                    ->select(DB::raw('kecamatans.id'),DB::raw('kecamatans.nama_kec'),DB::raw('SUM(trackings.positif) as positif'),DB::raw('SUM(trackings.sembuh) as sembuh'),DB::raw('SUM(trackings.meninggal) as meninggal'))
                    ->join('rws' ,'trackings.id_rw', '=', 'rws.id')
                    ->join('kelurahans' ,'rws.id_kel', '=', 'kelurahans.id')
                    ->join('kecamatans' ,'kelurahans.id_kec', '=', 'kecamatans.id')
                    ->groupby('kecamatans.id')
                    ->get();

        $join2 = DB::table('trackings')
                    ->select(DB::raw('kecamatans.id'),DB::raw('kecamatans.nama_kec'),DB::raw('SUM(trackings.positif) as positif'),DB::raw('SUM(trackings.sembuh) as sembuh'),DB::raw('SUM(trackings.meninggal) as meninggal'))
                    ->join('rws' ,'trackings.id_rw', '=', 'rws.id')
                    ->join('kelurahans' ,'rws.id_kel', '=', 'kelurahans.id')
                    ->join('kecamatans' ,'kelurahans.id_kec', '=', 'kecamatans.id')
                    ->whereDate('trackings.tanggal', date('Y-m-d'))
                    ->groupby('kecamatans.id')
                    ->get();
        $arr = [
            'status' => 200,
            'data' => [ 
            'Hari Ini' =>[$join2],
            'Total' =>[$join1]
            ],
            'message' => 'Berhasil'
        ];
        return response()->json($arr, 200);
    }

    public function kecamatan_show($id)
    {
        $join = DB::table('trackings')
                    ->select('positif', 'sembuh', 'meninggal')
                    ->join('rws' ,'trackings.id_rw', '=', 'rws.id')
                    ->join('kelurahans' ,'rws.id_kel', '=', 'kelurahans.id')
                    ->join('kecamatans' ,'kelurahans.id_kec', '=', 'kecamatans.id')
                    ->where('kecamatans.id', $id)
                    ->get();
        
        $join1 = DB::table('trackings')
                    ->select('positif', 'sembuh', 'meninggal')
                    ->join('rws' ,'trackings.id_rw', '=', 'rws.id')
                    ->join('kelurahans' ,'rws.id_kel', '=', 'kelurahans.id')
                    ->join('kecamatans' ,'kelurahans.id_kec', '=', 'kecamatans.id')
                    ->where('kecamatans.id', $id)
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

    public function kelurahan()
    {
        $join1 = DB::table('trackings')
                    ->select(DB::raw('kelurahans.id'),DB::raw('kelurahans.nama_kel'),DB::raw('SUM(trackings.positif) as positif'),DB::raw('SUM(trackings.sembuh) as sembuh'),DB::raw('SUM(trackings.meninggal) as meninggal'))
                    ->join('rws' ,'trackings.id_rw', '=', 'rws.id')
                    ->join('kelurahans' ,'rws.id_kel', '=', 'kelurahans.id')
                    ->groupby('kelurahans.id')
                    ->get();

        $join2 = DB::table('trackings')
                    ->select(DB::raw('kelurahans.id'),DB::raw('kelurahans.nama_kel'),DB::raw('SUM(trackings.positif) as positif'),DB::raw('SUM(trackings.sembuh) as sembuh'),DB::raw('SUM(trackings.meninggal) as meninggal'))
                    ->join('rws' ,'trackings.id_rw', '=', 'rws.id')
                    ->join('kelurahans' ,'rws.id_kel', '=', 'kelurahans.id')
                    ->whereDate('trackings.tanggal', date('Y-m-d'))
                    ->groupby('kelurahans.id')
                    ->get();
        $arr = [
            'status' => 200,
            'data' => [ 
            'Hari Ini' =>[$join2],
            'Total' =>[$join1]
            ],
            'message' => 'Berhasil'
        ];
        return response()->json($arr, 200);
    }

    public function kelurahan_show($id)
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

    public function rw()
    {
        $join1 = DB::table('trackings')
                    ->select(DB::raw('rws.id'),DB::raw('rws.nama_rw'),DB::raw('SUM(trackings.positif) as positif'),DB::raw('SUM(trackings.sembuh) as sembuh'),DB::raw('SUM(trackings.meninggal) as meninggal'))
                    ->join('rws' ,'trackings.id_rw', '=', 'rws.id')
                    ->groupby('rws.id')
                    ->get();

        $join2 = DB::table('trackings')
                    ->select(DB::raw('rws.id'),DB::raw('rws.nama_rw'),DB::raw('SUM(trackings.positif) as positif'),DB::raw('SUM(trackings.sembuh) as sembuh'),DB::raw('SUM(trackings.meninggal) as meninggal'))
                    ->join('rws' ,'trackings.id_rw', '=', 'rws.id')
                    ->whereDate('trackings.tanggal', date('Y-m-d'))
                    ->groupby('rws.id')
                    ->get();
        $arr = [
            'status' => 200,
            'data' => [ 
            'Hari Ini' =>[$join2],
            'Total' =>[$join1]
            ],
            'message' => 'Berhasil'
        ];
        return response()->json($arr, 200);
    }

    public function rw_show($id)
    {
        
        $join = DB::table('trackings')
                    ->select('positif', 'sembuh', 'meninggal')
                    ->join('rws' ,'trackings.id_rw', '=', 'rws.id')
                    ->where('rws.id', $id)
                    ->get();
        
        $join1 = DB::table('trackings')
                    ->select('positif', 'sembuh', 'meninggal')
                    ->join('rws' ,'trackings.id_rw', '=', 'rws.id')
                    ->where('rws.id', $id)
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
}

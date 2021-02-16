<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\provinsi;
use App\kota;
use App\kecamatan;
use App\kelurahan;
use App\rw;
use App\tracking;

class APIKasusController extends Controller
{

    public function indonesia()
    {
        $positif = tracking::get('positif')->sum('positif');
        $sembuh = tracking::get('sembuh')->sum('sembuh');
        $meninggal = tracking::get()->sum('meninggal');
        $positifh = tracking::where('tanggal', date('Y-m-d'))->get('positif')->sum('positif');
        $sembuhh = tracking::where('tanggal', date('Y-m-d'))->get('sembuh')->sum('sembuh');
        $meninggalh = tracking::where('tanggal', date('Y-m-d'))->get('meninggal')->sum('meninggal');
        $arr = [
            'status' => 200,
            'nama_negara' => 'indonesia',
            'data' => [ 
            'Hari Ini' =>[
                    'positif' => $positifh,
                    'sembuh' => $sembuhh,
                    'meninggal' => $meninggalh,
            ],
            'Total' =>[
                    'positif' => $positif,
                    'sembuh' => $sembuh,
                    'meninggal' => $meninggal,
                ]
            ],
            'message' => 'Berhasil'
        ];
        return response()->json($arr, 200);
    }

    public function positif()
    {
        $positif = tracking::get('positif')->sum('positif');
        $positifh = tracking::where('tanggal', date('Y-m-d'))->get('positif')->sum('positif');
        $arr = [
            'status' => 200,
            'data' => [ 
            'Hari Ini' =>[$positifh],
            'Total' =>[$positif]
            ],
            'message' => 'Berhasil'
        ];
        return response()->json($arr, 200);
    }
    public function sembuh()
    {
        $sembuh = tracking::get('sembuh')->sum('sembuh');
        $sembuhh = tracking::where('tanggal', date('Y-m-d'))->get('sembuh')->sum('sembuh');
        $arr = [
            'status' => 200,
            'data' => [ 
            'Hari Ini' =>[$sembuhh],
            'Total' =>[$sembuh]
            ],
            'message' => 'Berhasil'
        ];
        return response()->json($arr, 200);
    }
    public function meninggal()
    {
        $meninggal = tracking::get('meninggal')->sum('meninggal');
        $meninggalh = tracking::where('tanggal', date('Y-m-d'))->get('meninggal')->sum('meninggal');
        $arr = [
            'status' => 200,
            'data' => [ 
            'Hari Ini' =>[$meninggalh],
            'Total' =>[$meninggal]
            ],
            'message' => 'Berhasil'
        ];
        return response()->json($arr, 200);
    }
    public function dunia()
    {
        $f = [];
        $response = Http::get('https://api.kawalcorona.com/')->json();
        foreach ($response as $key) {
            $f[] = ['nama_negara' => $key['attributes']['Country_Region'], 
                    'kasus' =>$key['attributes']['Confirmed'],
                    'aktif' =>$key['attributes']['Active'],
                    'sembuh' =>$key['attributes']['Recovered'],
                    'Meninggal' =>$key['attributes']['Deaths']
                ];
        }
        $arr = [
            'status' => 200,
            'data' => [ 
            $f,
            ],
            'message' => 'Berhasil'
        ];
        return response()->json($arr, 200);
        
    }
}

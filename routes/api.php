<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\APIProvinsiController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/provinsi', 'API\APIController@provinsi');
Route::get('/provinsi/{id}', 'API\APIController@provinsi_show');

Route::get('/kota', 'API\APIController@kota');
Route::get('/kota/{id}', 'API\APIController@kota_show');

Route::get('/kecamatan', 'API\APIController@kecamatan');
Route::get('/kecamatan/{id}', 'API\APIController@kecamatan_show');

Route::get('/kelurahan', 'API\APIController@kelurahan');
Route::get('/kelurahan/{id}', 'API\APIController@kelurahan_show');

Route::get('/rw', 'API\APIController@rw');
Route::get('/rw/{id}', 'API\APIController@rw_show');



//Kasus
Route::get('/positif', 'API\APIKasusController@positif');
Route::get('/sembuh', 'API\APIKasusController@sembuh');
Route::get('/meninggal', 'API\APIKasusController@meninggal');


//Negara
Route::get('/indonesia', 'API\APIKasusController@indonesia');
Route::get('/dunia', 'API\APIKasusController@dunia');




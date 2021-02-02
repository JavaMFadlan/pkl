<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\APIProvinsiController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/provinsi', 'API\APIProvinsiController@index');
Route::get('/provinsi/{id}', 'API\APIProvinsiController@show');

Route::get('/rw', 'API\APIRwController@index');
Route::get('/rw/{id}', 'API\APIRwController@show');

Route::get('/kelurahan', 'API\APIKelurahanController@index');
Route::get('/kelurahan/{id}', 'API\APIKelurahanController@show');

Route::get('/kecamatan', 'API\APIKecamatanController@index');
Route::get('/kecamatan/{id}', 'API\APIKecamatanController@show');
// Route::post('/provinsi/store', 'API\APIProvinsiController@store');
// Route::get('/provinsi/{id}', 'API\APIProvinsiController@show');
// Route::put('/provinsi/update/{id?}','API\APIProvinsiController@update');
// Route::delete('/provinsi/{id?}', 'API\APIprovinsiController@destroy');



<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvinsiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','HomeController@index1');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/charts', 'HomeController@charts')->name('charts');
Route::get('/tables', 'HomeController@tables')->name('tables');

Route::resource('provinsi', 'ProvinsiController')->middleware('auth');
Route::resource('kota', 'KotaController')->middleware('auth');
Route::resource('kecamatan', 'KecamatanController')->middleware('auth');
Route::resource('kelurahan', 'KelurahanController')->middleware('auth');
Route::resource('rw', 'RwController')->middleware('auth');
Route::resource('tracking', 'TrackingController')->middleware('auth');
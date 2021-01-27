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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/charts', 'HomeController@charts')->name('charts');
Route::get('/tables', 'HomeController@tables')->name('tables');

Route::resource('provinsi', 'ProvinsiController');
Route::resource('kota', 'KotaController');
Route::resource('kecamatan', 'KecamatanController');
Route::resource('kelurahan', 'KelurahanController');
Route::resource('rw', 'RwController');
Route::resource('tracking', 'TrackingController');


// Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function (){
//     Route::get('/home', function()
//     {
//         return view('index');
//     });
//     Route::get('/charts', function()
//     {
//         return view('charts');
//     });
// });


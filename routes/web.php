<?php

use Illuminate\Support\Facades\Route;

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
Route::namespace('App\Http\Controllers')->middleware('cek.apikey')->group(function(){
    Route::get('login', 'LoginController@login');
    Route::delete('login', 'LoginController@logout');
    

    Route::group(['prefix' => 'loginn','middleware'=>['cek.user']], function(){
        Route::get('/', 'LoginController@index');
        // Route::patch('/', 'LoginController@update');
        Route::post('/create', 'LoginController@store');
        Route::patch('/{l}', 'LoginController@update');
        Route::delete('/{l}', 'LoginController@delete');
        Route::get('/{l}', 'LoginController@show');
    });

    Route::prefix('user')->middleware(['cek.user'])->group(function(){
        Route::get('/', 'UserController@index');
        Route::post('/create', 'UserController@store');
        Route::patch('/{w}', 'UserController@update');
        Route::delete('/{w}', 'UserController@delete');
        Route::get('/{w}', 'UserController@show');
    });
    Route::prefix('riwayat')->middleware(['cek.user'])->group(function(){
        Route::get('/', 'RiwayatController@index');
        Route::post('/create', 'RiwayatController@store');
        Route::patch('/{rw}', 'RiwayatController@update');
        Route::delete('/{rw}', 'RiwayatController@delete');
        Route::get('/{rw}', 'RiwayatController@show');
    });
    Route::prefix('presensi')->middleware(['cek.user'])->group(function(){
        Route::get('/', 'PresensiController@index');
        Route::post('/create', 'PresensiController@store');
        Route::patch('/{pr}', 'PresensiController@update');
        Route::delete('/{pr}', 'PresensiController@delete');
        Route::get('/{pr}', 'PresensiController@show');
    });
    Route::prefix('izin')->middleware(['cek.user'])->group(function(){
        Route::get('/', 'IzinController@index');
        Route::post('/create', 'IzinController@store');
        Route::patch('/{i}', 'IzinController@update');
        Route::delete('/{i}', 'IzinController@delete');
        Route::get('/{i}', 'IzinController@show');
        Route::post('/photo', 'IzinController@simpan_photo');
        Route::get('/photo', 'IzinController@photo');
    });
    Route::prefix('lupa')->middleware(['cek.user'])->group(function(){
        Route::get('/', 'LupaPasswordController@index');
        Route::post('/create', 'LupaPasswordController@store');
        Route::patch('/{l}', 'LupaPasswordController@update');
        Route::delete('/{l}', 'LupaPasswordController@delete');
        Route::get('/{l}', 'LupaPasswordController@show');
    });
    
});

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
    Route::get('login', 'LoginController@logout');
    

    Route::group(['prefix' => 'loginn','middleware'=>['cek.user']], function(){
        Route::patch('/', 'LoginController@update');
    });

    Route::prefix('user')->middleware(['cek.user'])->group(function(){
        Route::post('/', 'UserController@store');
        Route::patch('/{w}', 'UserController@update');
        Route::delete('/{w}', 'UserController@delete');
        Route::get('/{w}', 'UserController@show');
    });
});

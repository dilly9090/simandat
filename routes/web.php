<?php

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
    return redirect('login');
});

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();
//Program
Route::get('program-persebaran','HomeController@program_persebaran');
Route::get('program-tabel','HomeController@program_tabel');
Route::get('program-grafik','HomeController@program_grafik');

Route::post('login-home','HomeController@login');

Route::get('logout',function(){
    return redirect('login');
});
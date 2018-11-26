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
Route::get('sebaran-peta','HomeController@sebaran_peta');
Route::get('anggaran','HomeController@anggaran');
Route::get('master','HomeController@master');
Route::get('iku','HomeController@iku');

Route::post('login-home','HomeController@login');

Route::get('logout',function(){
    Auth::logout();
    return redirect('login');
});

Route::resource('regulasi','RegulasiController')->middleware('auth');
Route::resource('sarpras','SaranaPrasaranaController')->middleware('auth');
Route::resource('sdm','SdmController')->middleware('auth');
Route::resource('surat-masuk','SuratMasukController')->middleware('auth');
Route::resource('surat-keluar','SuratKeluarController')->middleware('auth');
Route::resource('master-unit','UnitController')->middleware('auth');
Route::resource('master-user','UserController')->middleware('auth');
Route::resource('data-iku','IKUController')->middleware('auth');
Route::resource('data-anggaran','RealisasiAnggaranController')->middleware('auth');

Route::get('unduh-file/{dir}/{file}','HomeController@unduh');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
     
});
 
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
Route::get('program-persebaran','HomeController@program_persebaran')->middleware('auth');
Route::get('program-tabel','HomeController@program_tabel')->middleware('auth');
Route::get('program-grafik','HomeController@program_grafik')->middleware('auth');
Route::get('sebaran-peta/{tahun?}','HomeController@sebaran_peta')->middleware('auth');
Route::get('sebaran-table/{tahun?}','HomeController@sebaran_tabel')->middleware('auth');
Route::get('anggaran','HomeController@anggaran')->middleware('auth');
Route::get('master','HomeController@master')->middleware('auth');
Route::get('iku','HomeController@iku')->middleware('auth');
Route::get('kegiatan-fisik','HomeController@kegiatan_fisik')->middleware('auth');

Route::post('login-home','HomeController@login');

Route::get('logout',function(){
    Auth::logout();
    return redirect('login');
});

Route::resource('regulasi','RegulasiController')->middleware('auth');
Route::post('editurutan/{id}','RegulasiController@editurutan');
Route::resource('sarpras','SaranaPrasaranaController')->middleware('auth');
Route::resource('sdm','SdmController')->middleware('auth');
Route::resource('surat-masuk','SuratMasukController')->middleware('auth');
Route::resource('surat-keluar','SuratKeluarController')->middleware('auth');
Route::resource('master-unit','UnitController')->middleware('auth');
Route::resource('master-user','UserController')->middleware('auth');
Route::get('user-data-detail/{iduser}','UserController@user_data_detail')->middleware('auth');
Route::post('user-data-detail-simpan/{iduser}','UserController@user_data_detail_simpan')->middleware('auth');

Route::resource('data-iku','IKUController')->middleware('auth');
Route::get('data-iku-delete/{id}','IKUController@destroy')->middleware('auth');
Route::resource('data-anggaran','RealisasiAnggaranController')->middleware('auth');
Route::resource('data-kegiatan-fisik','KegiatanFisikController')->middleware('auth');

Route::post('disposisi-surat-masuk','DisposisiController@diposisi_surat_masuk')->middleware('auth');
Route::post('disposisi-surat-keluar','DisposisiController@diposisi_surat_keluar')->middleware('auth');

Route::get('unduh-file/{dir}/{file}','HomeController@unduh');
Route::get('iku-by-unit/{idunit}','IKUController@iku_by_unit');

Route::get('konversi/{dec}/{kode}','HomeController@konversi');
Route::get('getpeta/{tahun}','HomeController@getpeta');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
     
});
 
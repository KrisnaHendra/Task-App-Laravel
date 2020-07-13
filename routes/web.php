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
    return view('login');
});
// Route::get('/home', function () {
//     return dd(Auth::user());
// })->name('home');
// Route::get('/home',function(){
//   return view('home');
// })->middleware('auth')->name('home');

Route::get('/register','AuthController@getRegister')->middleware('guest')->name('register');
Route::post('/register','AuthController@postRegister')->middleware('guest');
Route::get('/login','AuthController@getLogin')->middleware('guest')->name('login');
Route::post('/login','AuthController@postLogin')->middleware('guest');
Route::get('/logout','AuthController@logout')->middleware('auth')->name('logout');
Route::get('/home','HomeController@index')->middleware('auth')->name('home');
Route::get('/karyawan','KaryawanController@index')->middleware('auth');
Route::get('/karyawan/hapus/{id}','KaryawanController@hapus');
Route::post('/karyawan','KaryawanController@tambah')->middleware('auth')->name('karyawan');
Route::post('/karyawan/update','KaryawanController@update');
Route::get('/task','TaskController@index')->middleware('auth');
Route::get('/task/pending','TaskController@taskPending')->middleware('auth');
Route::get('/task/complete','TaskController@taskComplete')->middleware('auth');
Route::post('/task','TaskController@tambah')->middleware('auth')->name('project');
Route::post('/task/updatePending','TaskController@updatePending');
Route::post('/task/updateComplete','TaskController@updateComplete');
Route::post('/task/updateUncomplete','TaskController@updateUncomplete');
Route::get('/task/hapus/{id}','TaskController@hapus');
Route::get('/project','ProjectController@index')->middleware('auth');
Route::post('/project','ProjectController@tambah')->middleware('auth')->name('project');
Route::post('/project/update','ProjectController@update');
Route::get('/project/hapus/{id}','ProjectController@hapus');
Route::get('/laporan','LaporanController@index');
Route::get('/laporan/cari','LaporanController@cari');
Route::get('/profile','HomeController@profile')->middleware('auth');
Route::post('/profile/update','HomeController@updateProfile');

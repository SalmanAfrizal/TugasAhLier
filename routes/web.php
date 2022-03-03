<?php

use Illuminate\Support\Facades\Route;
use App\Controllers\SiswaController;
use App\Models\Siswa;
use App\Http\Controllers\Auth\LoginController;

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
//crud
Route::get('siswa', '\App\Http\Controllers\SiswaController@index');
Route::post('/siswa/store', '\App\Http\Controllers\SiswaController@store');
Route::get('/siswa/tambah', '\App\Http\Controllers\SiswaController@tambah');
Route::get('/siswa/edit/{id}', '\App\Http\Controllers\SiswaController@edit');
Route::put('/siswa/update/{id}', '\App\Http\Controllers\SiswaController@update');
Route::get('/siswa/hapus/{id}', '\App\Http\Controllers\SiswaController@delete');

//login
Route::namespace('Auth')->group(function () {
    Route::get('/login','LoginController@show_login_form')->name('login');
    Route::post('/login','LoginController@process_login')->name('login');
    Route::get('/register','LoginController@show_signup_form')->name('register');
    Route::post('/register','LoginController@process_signup');
    Route::post('/logout','LoginController@logout')->name('logout');
  });

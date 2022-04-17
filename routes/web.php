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

Route::get('/tugas', function () {
    return view('tugas');
});

Route::get('/soal', function () {
    return view('soal');
});

Route::get('/nilai', function () {
    return view('nilai');
});

Route::get('/', function () {
    return view('landingpage');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});
Route::get('/paket', function () {
    return view('paket');
});
Route::get('/pilihpaket', function () {
    return view('pilihpaket');
});
Route::get('/paketadmin', function () {
    return view('paketadmin');
});
Route::get('/dashadmin', function () {
    return view('dashadmin');
});
Route::get('/tambahPaket', function () {
    return view('tambahPaket');
});
Route::get('/editPaket', function () {
    return view('editPaket');
});



Auth::routes();

Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin.home')->middleware('is_admin');
Route::get('siswa/home', [App\Http\Controllers\HomeController::class, 'siswa'])->name('siswa.home')->middleware('is_siswa');

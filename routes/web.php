<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;

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
Route::get('/buy_course', function () {
    return view('buy_course');
});
Route::get('/course', function () {
    return view('course');
});
Route::get('ADMINpaymentVerif', function () {
    return view('ADMINpaymentVerif');
});
Route::get('paymentVerif', function () {
    return view('paymentVerif');
});
Route::get('payment', function () {
    return view('payment');
});
Route::get('riwayatBeli', function () {
    return view('riwayatBeli');
});

Auth::routes();

Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin.home')->middleware('is_admin');
Route::get('siswa/home', [App\Http\Controllers\HomeController::class, 'siswa'])->name('siswa.home')->middleware('is_siswa');

Route::get('/adminDash', function(){
    return view('adminDash');
});

/* NYOBA */
Route::get('/ojanmain', function(){
    return view('ojanmain');
});

Route::get('/tambahCourse', function(){
    return view('tambahcourse');
});

/*Route::get('/editCourse', function(){
    return view('editcourse');
});*/

Route::resource('course', CourseController::class);

Route::get('editCourse', [CourseController::class, 'index']);
/*Route::get('editCourse/{id}', [CourseController::class, ]) */

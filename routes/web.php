<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CourseController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AssessmentController;


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


Route::get('/tugas', [AssessmentController::class, 'indextugas']);


Route::get('/soal/{id}', [AssessmentController::class, 'indexsoal']);
Route::post('/soal', [AssessmentController::class, 'storejawaban']);

Route::get('/submit', function () {
    return view('submit');
});

Route::get('/listsoal', [AssessmentController::class, 'index']);
Route::post('/editsoal/{id}', [AssessmentController::class, 'index2']);
Route::post('/editsoal2/{id}', [AssessmentController::class, 'update']);
Route::get('/buatsoal', [AssessmentController::class, 'create']);
Route::post('/buatsoal', [AssessmentController::class, 'store']);
Route::get('/listsoal2/{id}', [AssessmentController::class, 'delete']);






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
Route::get('/kelas', function () {
    return view('kelas');
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

Route::get('/buy_course', [CourseController::class, 'showCourse']);

<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CourseController;

use App\Http\Controllers\PaketController;
use App\Http\Controllers\TransaksiController;

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





Route::get('/submit', function () {
    return view('submit');
});








Route::get('/', function () {
    return view('landingpage');
})->name('/');
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


Route::get('/pilihpaket', function () {
    return view('pilihpaket');
});
Route::get('/paketadmin', function () {
    return view('paketadmin');
});
Route::get('/dashadmin', function () {
    return view('dashadmin');
});

//paket

Auth::routes();



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

/*Route::get('editCourse/{id}', [CourseController::class, ]) */

//USER ROUTE
Route::get('siswa/home', [App\Http\Controllers\HomeController::class, 'siswa'])->name('siswa.home')->middleware('is_siswa');
Route::get('siswa/buy_course', [TransaksiController::class, 'showCourse'])->name('siswa.buy.course')->middleware('is_siswa');
Route::post('siswa/store_course', [TransaksiController::class, 'storeTransactionCourse'])->name('siswa.store.transaction.course')->middleware('is_siswa');
Route::get('siswa/riwayatBeli', [App\Http\Controllers\TransaksiController::class, 'riwayatBeli'])->name('siswa.riwayat.transaction.course')->middleware('is_siswa');
Route::get('siswa/tugas', [AssessmentController::class, 'indextugas'])->middleware('is_siswa');
Route::get('siswa/soal/{id}', [AssessmentController::class, 'indexsoal'])->middleware('is_siswa');
Route::post('siswa/soal/store', [AssessmentController::class, 'storejawaban'])->middleware('is_siswa');
Route::get('siswa/tugas/jawaban', [AssessmentController::class, 'showjawaban'])->middleware('is_siswa');

//ADMIN ROUTE
Route::get('admin/listsoal', [AssessmentController::class, 'index'])->name('admin.liatsoal')->middleware('is_admin');
Route::post('/editsoal/{id}', [AssessmentController::class, 'index2']);
Route::post('/editsoal2/{id}', [AssessmentController::class, 'update']);
Route::get('/buatsoal', [AssessmentController::class, 'create']);
Route::post('/buatsoal', [AssessmentController::class, 'store']);
Route::get('/listsoal2/{id}', [AssessmentController::class, 'delete']);
Route::get('admin/editPaket',[App\Http\Controllers\PaketController::class, 'index'])->name('admin.editPaket')->middleware('is_admin');
Route::get('admin/tambahPaket',[App\Http\Controllers\PaketController::class, 'create'])->name('admin.tambahPaket')->middleware('is_admin');
Route::post('/postPaket',[App\Http\Controllers\PaketController::class, 'store'])->middleware('is_admin');
Route::get('/editPaket/{id_paket}',[App\Http\Controllers\PaketController::class, 'edit'])->middleware('is_admin');
Route::post('/updatePaket/{id_paket}',[App\Http\Controllers\PaketController::class, 'update'])->middleware('is_admin');
Route::get('/deletePaket/{id_paket}',[App\Http\Controllers\PaketController::class, 'destroy'])->middleware('is_admin');
Route::get('/paket',[App\Http\Controllers\PaketController::class, 'show']);
Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.home')->middleware('is_admin');
Route::get('admin/assessments', [App\Http\Controllers\AssessmentController::class, 'nilaiAssessment'])->name('admin.assessment')->middleware('is_admin');;
Route::post('admin/assessments/store/{id_jawaban}', [App\Http\Controllers\AssessmentController::class, 'storeNilaiAssessment']);
Route::resource('course', CourseController::class);
Route::get('admin/editCourse', [CourseController::class, 'index'])->name('admin.editCourse')->middleware('is_admin');
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\KeluhanController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\GuestController;


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




Route::get('/keluhan', function(){
    return view('keluhan');
});
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
Route::get('siswa/tugas', [AssessmentController::class, 'indextugas'])->middleware('is_siswa');
Route::get('siswa/soal/{id}', [AssessmentController::class, 'indexsoal'])->middleware('is_siswa');
Route::post('siswa/soal/store', [AssessmentController::class, 'storejawaban'])->middleware('is_siswa');
Route::get('siswa/tugas/jawaban', [AssessmentController::class, 'showjawaban'])->middleware('is_siswa');
Route::get('siswa/dashboard', [SiswaController::class, 'index'])->name('siswa.dashboard')->middleware('is_siswa');
Route::get('siswa/buy_course', [TransaksiController::class, 'showCourse'])->name('siswa.buy.course')->middleware('is_siswa');
Route::post('siswa/store_course', [TransaksiController::class, 'storeTransactionCourse'])->name('siswa.store.transaction.course')->middleware('is_siswa');
Route::post('siswa/confirm_transaction_course/{id}', [TransaksiController::class, 'confirmTransactionCourse'])->name('siswa.confirm.transaction.course')->middleware('is_siswa');
Route::get('siswa/riwayatBeli', [App\Http\Controllers\TransaksiController::class, 'riwayatBeli'])->name('siswa.riwayat.transaction.course')->middleware('is_siswa');
Route::get('siswa/riwayatBeliPaket', [App\Http\Controllers\TransaksiController::class, 'riwayatBeliPaket'])->name('siswa.riwayat.transaction.paket')->middleware('is_siswa');
Route::get('siswa/buy_paket', [TransaksiController::class, 'showPaket'])->middleware('is_siswa');
Route::post('siswa/store_paket', [TransaksiController::class, 'storeTransactionPaket'])->middleware('is_siswa');
Route::post('siswa/confirm_transaction_paket/{id}', [TransaksiController::class, 'confirmTransactionpaket'])->middleware('is_siswa');
Route::get('siswa/mycourse', [App\Http\Controllers\CourseController::class, 'showMyCourse'])->middleware('is_siswa');
Route::get('siswa/mycourse/{nama_course}/{id_course}/{id_user}/{id_akses_course}', [App\Http\Controllers\CourseController::class, 'showDetailCourse'])->middleware('is_siswa');
Route::post('siswa/tambahReview', [App\Http\Controllers\CourseController::class, 'tambahReview'])->middleware('is_siswa');
Route::post('siswa/editReview/{id}', [App\Http\Controllers\CourseController::class, 'editReview'])->middleware('is_siswa');
Route::get('siswa/hapusReview/{id}', [App\Http\Controllers\CourseController::class, 'hapusReview'])->middleware('is_siswa');
Route::get('forum', [ForumController::class, 'index'])->name('forum.show');
Route::get('forum/add', [ForumController::class, 'create'])->name('forum.add');
Route::post('forum/store', [ForumController::class, 'store'])->name('forum.store');
Route::get('forum/show-reply/{id}', [ForumController::class, 'showReply'])->name('reply.forum.show');
Route::post('forum/store-reply', [ForumController::class, 'storeReply'])->name('reply.forum.store');
Route::get('forum/search', [ForumController::class, 'searchForum'])->name('forum.search');
Route::get('siswa/verifikasi-selesai-course/{id_akses_course}', [App\Http\Controllers\CourseController::class, 'verifSelesaiCourse'])->middleware('is_siswa');
Route::post('forum/edit-forum/{id}', [ForumController::class, 'editForum'])->name('forum.edit');
Route::get('forum/hapus-forum/{id}', [ForumController::class, 'hapusForum'])->name('forum.hapus');
Route::post('forum/edit-reply/{id}', [ForumController::class, 'editReply'])->name('reply.forum.edit');
Route::get('forum/hapus-reply/{id}', [ForumController::class, 'hapusReply'])->name('reply.forum.hapus');
Route::get('blog', [GuestController::class, 'index']);
Route::get('blog/cari', [GuestController::class, 'cariBlog']);
Route::get('blog/cari-kategori', [GuestController::class, 'carikategoriBlog']);
Route::get('blog/{slug}', [GuestController::class, 'detailBlog']);
Route::post('forum/show-reply/tambah-like', [ForumController::class, 'tambahLikeForum'])->name('forum.tambah.like');
Route::get('forum/show-reply/tambah-dislike/{id_user}/{id_forum}', [ForumController::class, 'tambahDislikeForum'])->name('forum.tambah.dislike');
Route::get('siswa/keluhan', [App\Http\Controllers\KeluhanController::class,'index'])->middleware('is_siswa');
Route::get('siswa/keluhan/create', [App\Http\Controllers\KeluhanController::class, 'createKeluhan'])->middleware('is_siswa');
Route::post('siswa/keluhan/store', [App\Http\Controllers\KeluhanController::class, 'storeKeluhan'])->middleware('is_siswa');
Route::get('siswa/profile', [App\Http\Controllers\AccountController::class, 'showProfile'])->middleware('is_siswa');
Route::post('siswa/profile/update/{id}', [App\Http\Controllers\AccountController::class, 'updateProfile'])->middleware('is_siswa');
Route::get('siswa/profile/edit-password/{id}', [App\Http\Controllers\AccountController::class, 'editProfile'])->middleware('is_siswa');
Route::post('siswa/profile/update-password/{id}', [App\Http\Controllers\AccountController::class, 'updatePassword'])->middleware('is_siswa');

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
Route::get('admin/konfirmasi-transaksi/course', [App\Http\Controllers\TransaksiController::class, 'showKonfirmasiCourse'])->middleware('is_admin');
Route::post('admin/konfirmasi-transaksi/course/terima/{id}', [App\Http\Controllers\TransaksiController::class, 'konfirmasiTerimaTransCourse'])->middleware('is_admin');
Route::post('admin/konfirmasi-transaksi/course/tolak/{id}', [App\Http\Controllers\TransaksiController::class, 'konfirmasiTolakTransCourse'])->middleware('is_admin');
Route::get('admin/konfirmasi-transaksi/course/hapus/{id}', [App\Http\Controllers\TransaksiController::class, 'hapusTransCourse'])->middleware('is_admin');
Route::get('admin/konfirmasi-transaksi/paket', [App\Http\Controllers\TransaksiController::class, 'showKonfirmasiPaket'])->middleware('is_admin');
Route::post('admin/konfirmasi-transaksi/paket/terima/{id}', [App\Http\Controllers\TransaksiController::class, 'konfirmasiTerimaTransPaket'])->middleware('is_admin');
Route::post('admin/konfirmasi-transaksi/paket/tolak/{id}', [App\Http\Controllers\TransaksiController::class, 'konfirmasiTolakTransPaket'])->middleware('is_admin');
Route::get('admin/konfirmasi-transaksi/paket/hapus/{id}', [App\Http\Controllers\TransaksiController::class, 'hapusTransPaket'])->middleware('is_admin');
Route::get('admin/akses-course', [App\Http\Controllers\CourseController::class, 'showDataAkses'])->middleware('is_admin');
Route::post('admin/akses-course/tambah', [App\Http\Controllers\CourseController::class, 'tambahDataAkses'])->middleware('is_admin');
Route::get('admin/akses-course/hapus/{id}', [App\Http\Controllers\CourseController::class, 'hapusDataAkses'])->middleware('is_admin');
Route::get('admin/user-account', [App\Http\Controllers\AccountController::class, 'showAllAccount'])->middleware('is_admin');
Route::get('admin/user-account/delete/{id}', [App\Http\Controllers\AccountController::class, 'deleteAccount'])->middleware('is_admin');
Route::get('admin/blog', [App\Http\Controllers\BlogController::class, 'showDataBlog'])->middleware('is_admin');
Route::get('admin/blog/tambah', [App\Http\Controllers\BlogController::class, 'tambahDataBlog'])->middleware('is_admin');
Route::post('admin/blog/post', [App\Http\Controllers\BlogController::class, 'postDataBlog'])->middleware('is_admin');
Route::get('admin/blog/edit/{id}', [App\Http\Controllers\BlogController::class, 'editDataBlog'])->middleware('is_admin');
Route::post('admin/blog/update/{id}', [App\Http\Controllers\BlogController::class, 'updateDataBlog'])->middleware('is_admin');
Route::get('admin/blog/delete/{id}', [App\Http\Controllers\BlogController::class, 'deleteDataBlog'])->middleware('is_admin');
Route::get('admin/data-keluhan', [App\Http\Controllers\KeluhanController::class, 'showAllKeluhan'])->middleware('is_admin');
Route::post('admin/data-keluhan/balas-mail/{id}', [App\Http\Controllers\KeluhanController::class, 'balasMailKeluhan'])->middleware('is_admin');
Route::get('admin/data-keluhan/hapus/{id_keluhan}', [App\Http\Controllers\KeluhanController::class, 'hapusKeluhan'])->middleware('is_admin');

// Route::get('/create-keluhan', [KeluhanController::class,'create']);
// Route::post('/store', [KeluhanController::class,'store']);

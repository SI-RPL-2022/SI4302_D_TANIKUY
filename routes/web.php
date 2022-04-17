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

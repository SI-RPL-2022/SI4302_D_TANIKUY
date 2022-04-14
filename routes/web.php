<?php
use App\Http\Controllers\AssessmentController;
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

Route::get('/listsoal', function () {
    return view('listsoal');
});

Route::get('/buatsoal', [AssessmentController::class, 'create']);
Route::post('/buatsoal', [AssessmentController::class, 'store']);


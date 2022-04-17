<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/submit', function () {
    return view('submit');
});


Route::get('/listsoal', [AssessmentController::class, 'index']);
Route::post('/editsoal/{id}', [AssessmentController::class, 'index2']);
Route::post('/editsoal2/{id}', [AssessmentController::class, 'update']);
Route::get('/buatsoal', [AssessmentController::class, 'create']);
Route::post('/buatsoal', [AssessmentController::class, 'store']);
Route::get('/listsoal2/{id}', [AssessmentController::class, 'delete']);

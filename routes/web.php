<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotaKapalController;
use App\Http\Controllers\NotaPPKBController;
use App\Http\Controllers\NotaSampahController;
use App\Http\Controllers\HasilController;
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
    return view('landingpage');
});

Route::get('formnotakapal', [NotaKapalController::class, 'index']);
Route::get('formnotasampah', [NotaSampahController::class, 'index']);
Route::get('formnotappkb', [NotaPPKBController::class, 'index']);
Route::get('hasil', [HasilController::class, 'index']);

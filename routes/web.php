<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistController;

// User
use App\Http\Controllers\NotaKapalController;
use App\Http\Controllers\NotaSampahController;
use App\Http\Controllers\NotaPPKBController;
use App\Http\Controllers\HasilController;

// Admin
use App\Http\Controllers\DashboardController;

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


Route::get('login', [LoginController::class, 'index']);
Route::get('regist', [RegistController::class, 'index']);

//User
Route::get('formnotakapal', [NotaKapalController::class, 'create']);
Route::post('formnotakapal/store', [NotaKapalController::class, 'store'])->name("storeNotaKapal");

Route::get('formnotasampah', [NotaSampahController::class, 'create']);
Route::post('formnotasampah/store', [NotaSampahController::class, 'store'])->name("storeNotaSampah");

Route::get('formnotappkb', [NotaPPKBController::class, 'create']);
Route::post('formnotappkb/store', [NotaPPKBController::class, 'store'])->name("storeNotaPPKB");

Route::get('hasil', [HasilController::class, 'index']);

//Admin
Route::get('dashboard', [DashboardController::class, 'index']);

//Keluhan Nota Kapal
Route::get('keluhannotakapal', [NotaKapalController::class, 'index']);

//Download Nota Kapal
Route::get('downloadnotakapal/{id}', [NotaKapalController::class, 'download'])->name('downloadnotakapal');
Route::get('suratnotakapal', [NotaKapalController::class, 'index2']);
//Buat Nota Kapal
Route::get('buatsuratnotakapal', [NotaKapalController::class, 'create2']);
Route::post('buatsuratnotakapal/store', [NotaKapalController::class, 'store2'])->name("storeBeritaAcaraNotaKapal");
//Show Nota Kapal
Route::get('suratnotakapal/{id}', [NotaKapalController::class, 'show'])->name("showSuratNotaKapal");
Route::get('edit/suratberitaacaranotakapal/{id}', [NotaKapalController::class, 'show2'])->name("editSuratBeritaAcaraNotaKapal");

//Keluhan Nota Sampah
Route::get('keluhannotasampahkapal', [NotaSampahController::class, 'index']);
Route::get('suratnotasampahkapal', [NotaSampahController::class, 'index2']);
//Buat Nota Sampah 
Route::get('buatsuratnotasampahkapal', [NotaSampahController::class, 'create2']);
Route::post('buatsuratnotasampahkapal/store', [NotaSampahController::class, 'store2'])->name("storeBeritaAcaraNotaSampah");

//Keluhan Penghapusan PPKB
Route::get('keluhanpenghapusanppkb', [NotaPPKBController::class, 'index']);
Route::get('suratpenghapusanppkb', [NotaPPKBController::class, 'index2']);
//Buat Penghapusan PPKB
Route::get('buatsuratpenghapusanppkb', [NotaPPKBController::class, 'create2']);
Route::post('buatsuratpenghapusanppkb/store', [NotaPPKBController::class, 'store2'])->name("storeBeritaAcaraPPKB");

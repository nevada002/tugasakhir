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
use App\Http\Controllers\DashController;


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
Route::post('formnotakapal/store', [NotaKapalController::class, 'store']);

Route::get('formnotasampah', [NotaSampahController::class, 'create']);
Route::post('formnotasampah/store', [NotaSampahController::class, 'store']);

Route::get('formnotappkb', [NotaPPKBController::class, 'create']);
Route::post('formnotappkb/store', [NotaPPKBController::class, 'store']);

Route::get('hasil', [HasilController::class, 'index']);

//Admin
Route::get('dashboard', [DashboardController::class, 'index']);

//Keluhan Nota Kapal
Route::get('keluhannotakapal', [NotaKapalController::class, 'index2']);
Route::get('suratnotakapal', [NotaKapalController::class, 'index3']);
//Buat Nota Kapal
Route::get('buatsuratnotakapal', [NotaKapalController::class, 'create2']);

//Keluhan Nota Sampah
Route::get('keluhannotasampahkapal', [NotaSampahController::class, 'index2']);
Route::get('suratnotasampahkapal', [NotaSampahController::class, 'index3']);
//Buat Nota Sampah 
Route::get('buatsuratnotasampahkapal', [NotaKapalController::class, 'create2']);

//Keluhan Penghapusan PPKB
Route::get('keluhanpenghapusanppkb', [NotaPPKBController::class, 'index2']);
Route::get('suratpenghapusanppkb', [NotaPPKBController::class, 'index3']);
//Buat Penghapusan PPKB
Route::get('buatsuratpenghapusanppkb', [NotaKapalController::class, 'create2']);


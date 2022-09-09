<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::view('/', 'home');
Auth::routes(['reset' => false, 'verify' => false]);


Route::middleware('auth')->group(function() {
    //User
    Route::prefix('keluhan')->name('keluhan.')->group(function() {
        Route::get('nota-kapal', [\App\Http\Controllers\KeluhanNotaKapalController::class, 'create'])->name("nota-kapal.index");
        Route::post('nota-kapal/store', [\App\Http\Controllers\KeluhanNotaKapalController::class, 'store'])->name("nota-kapal.store");
        
        Route::get('nota-sampah-kapal', [\App\Http\Controllers\KeluhanNotaSampahKapalController::class, 'create'])->name("nota-sampah-kapal.index");
        Route::post('nota-sampah-kapal/store', [\App\Http\Controllers\KeluhanNotaSampahKapalController::class, 'store'])->name("nota-sampah-kapal.store");
        
        Route::get('pengahapusan-ppkb', [\App\Http\Controllers\KeluhanPenghapusanPPKBController::class, 'create'])->name("penghapusan-ppkb.index");
        Route::post('pengahapusan-ppkb/store', [\App\Http\Controllers\KeluhanPenghapusanPPKBController::class, 'store'])->name("penghapusan-ppkb.store");
    });
    
    Route::get('hasil', [\App\Http\Controllers\HasilController::class, 'index']);
    Route::get('hasil/{id}/pdf', [\App\Http\Controllers\HasilController::class, 'pdf'])->name('hasil.pdf');

    //Admin
    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function() {
        Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
        
        //Nota Kapal
        Route::prefix('nota-kapal')->name('nota-kapal.')->group(function() {
            Route::get('keluhan', [\App\Http\Controllers\Admin\KeluhanNotaKapalController::class, 'index'])->name('keluhan.index');
            Route::post('keluhan/{id}', [\App\Http\Controllers\Admin\KeluhanNotaKapalController::class, 'process'])->name('keluhan.process');
            // Route::get('downloadnotakapal/{id}', [\App\Http\Controllers\Admin\KeluhanNotaKapalController::class, 'download'])->name('downloadnotakapal');

            Route::get('berita-acara', [\App\Http\Controllers\Admin\BeritaAcaraNotaKapalController::class, 'index'])->name('berita-acara.index');
            Route::get('berita-acara/create', [\App\Http\Controllers\Admin\BeritaAcaraNotaKapalController::class, 'create'])->name('berita-acara.create');
            Route::post('berita-acara', [\App\Http\Controllers\Admin\BeritaAcaraNotaKapalController::class, 'store'])->name('berita-acara.store');
            Route::post('berita-acara/approval/{id}', [\App\Http\Controllers\Admin\BeritaAcaraNotaKapalController::class, 'approval'])->name('berita-acara.approval');

            Route::get('berita-acara/edit/{id}', [\App\Http\Controllers\Admin\BeritaAcaraNotaKapalController::class, 'edit'])->name('berita-acara.edit');
            Route::get('berita-acara/{id}', [\App\Http\Controllers\Admin\BeritaAcaraNotaKapalController::class, 'show'])->name("berita-acara.show");
        });

        //Nota Sampah Kapal
        Route::prefix('nota-sampah-kapal')->name('nota-sampah-kapal.')->group(function() {
            Route::get('keluhan', [\App\Http\Controllers\Admin\KeluhanNotaSampahKapalController::class, 'index'])->name('keluhan.index');
            Route::post('keluhan/{id}', [\App\Http\Controllers\Admin\KeluhanNotaSampahKapalController::class, 'process'])->name('keluhan.process');
            // Route::get('downloadnotakapal/{id}', [\App\Http\Controllers\Admin\KeluhanNotaSampahKapalController::class, 'download'])->name('downloadnotakapal');

            Route::get('berita-acara', [\App\Http\Controllers\Admin\BeritaAcaraNotaSampahKapalController::class, 'index'])->name('berita-acara.index');
            Route::get('berita-acara/create', [\App\Http\Controllers\Admin\BeritaAcaraNotaSampahKapalController::class, 'create'])->name('berita-acara.create');
            Route::post('berita-acara', [\App\Http\Controllers\Admin\BeritaAcaraNotaSampahKapalController::class, 'store'])->name('berita-acara.store');

            Route::get('berita-acara/{id}', [\App\Http\Controllers\Admin\BeritaAcaraNotaSampahKapalController::class, 'show'])->name("berita-acara.show");
            Route::get('berita-acara/edit/{id}', [\App\Http\Controllers\Admin\BeritaAcaraNotaSampahKapalController::class, 'edit'])->name('berita-acara.edit');
        });

        //Keluhan Penghapusan PPKB
        Route::prefix('penghapusan-ppkb')->name('penghapusan-ppkb.')->group(function() {
            Route::get('keluhan', [\App\Http\Controllers\Admin\KeluhanPenghapusanPPKBController::class, 'index'])->name('keluhan.index');
            Route::post('keluhan/{id}', [\App\Http\Controllers\Admin\KeluhanPenghapusanPPKBController::class, 'process'])->name('keluhan.process');
            // Route::get('downloadnotakapal/{id}', [\App\Http\Controllers\Admin\KeluhanPenghapusanPPKBController::class, 'download'])->name('downloadnotakapal');

            Route::get('berita-acara', [\App\Http\Controllers\Admin\BeritaAcaraPenghapusanPPKBController::class, 'index'])->name('berita-acara.index');
            Route::get('berita-acara/create', [\App\Http\Controllers\Admin\BeritaAcaraPenghapusanPPKBController::class, 'create'])->name('berita-acara.create');
            Route::post('berita-acara', [\App\Http\Controllers\Admin\BeritaAcaraPenghapusanPPKBController::class, 'store'])->name('berita-acara.store');

            Route::get('berita-acara/{id}', [\App\Http\Controllers\Admin\BeritaAcaraPenghapusanPPKBController::class, 'show'])->name("berita-acara.show");
            Route::get('berita-acara/edit/{id}', [\App\Http\Controllers\Admin\BeritaAcaraPenghapusanPPKBController::class, 'edit'])->name('berita-acara.edit');
        });
    });
    
});


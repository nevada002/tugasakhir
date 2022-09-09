<?php

use App\Http\Controllers\NotaKapalController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// Route::fallback(function () {
//     return response()->json([
//         'success' => false,
//         'code' => 404,
//         'message' => 'Route Not Found', 
//     ]);
// });
// //API route for register new user
// Route::post('/registerUser', [App\Http\Controllers\API\AuthController::class, 'registerUser']);
// Route::post('/registerCustomerService', [App\Http\Controllers\API\AuthController::class, 'registerCustomerService']);
// Route::post('/registerPihakVerifikasi', [App\Http\Controllers\API\AuthController::class, 'registerPihakVerifikasi']);
// Route::post('/registerPenandaTangan', [App\Http\Controllers\API\AuthController::class, 'registerPenandaTangan']);

// // API route for logout user
// Route::post('/logout', [App\Http\Controllers\API\AuthController::class, 'logout']);

// //API route for login user
// Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'login']);
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::post('keluhannotakapal/store/{id}/{statusId}', [NotaKapalController::class, 'store3'])->name("statusNotaKapal");

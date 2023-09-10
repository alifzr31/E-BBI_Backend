<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\LiconController;
use App\Http\Controllers\API\MateriController;
use App\Http\Controllers\API\TugasController;
use App\Http\Controllers\API\UserController;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:api')->get('/profile', [UserController::class, 'profile']);
Route::middleware('auth:api')->get('/listmatpel', [UserController::class, 'listMatpel']);
Route::middleware('auth:api')->post('/changepassword', [UserController::class, 'changePassword']);
Route::middleware('auth:api')->post('/editprofile', [UserController::class, 'editprofile']);

Route::middleware('auth:api')->get('/indexmateriperpelajaran/{id}', [MateriController::class, 'indexmateriperpelajaran']);
Route::middleware('auth:api')->post('/storemateri', [MateriController::class, 'store']);
Route::middleware('auth:api')->get('/detailmateri/{id}', [MateriController::class, 'show']);
Route::middleware('auth:api')->post('/updatemateri/{id}', [MateriController::class, 'update']);

Route::middleware('auth:api')->get('/indextugasperpelajaran/{guru_matpel_id}', [TugasController::class, 'indextugas']);
Route::middleware('auth:api')->get('/detailtugas/{tugas_id}', [TugasController::class, 'detailtugas']);
Route::middleware('auth:api')->post('/storetugasguru', [TugasController::class, 'storeGuru']);
Route::middleware('auth:api')->post('/storetugassiswa/{id}', [TugasController::class, 'storeSiswa']);
Route::middleware('auth:api')->post('/inputnilai/{tugas_siswa_id}', [TugasController::class, 'inputnilai']);

Route::middleware('auth:api')->get('/licon', [LiconController::class, 'index']);
Route::middleware('auth:api')->post('/storelicon/{guru_matpel_id}', [LiconController::class, 'storeLicon']);
Route::middleware('auth:api')->get('/getonelicon/{guru_matpel_id}', [LiconController::class, 'getOneLicon']);
Route::middleware('auth:api')->get('/selesailicon/{licon_id}', [LiconController::class, 'selesaiLicon']);

Route::middleware('auth:api')->get('/homedashboard', [UserController::class, 'homeDashboardSiswa']);
Route::middleware('auth:api')->get('/homedashboardguru', [UserController::class, 'homeDashboardGuru']);

Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);
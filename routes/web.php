<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\GuruMatpelController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MatpelController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SiswaMatpelController;
use App\Http\Controllers\UserController;
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

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginStore'])->name('loginStore');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function() {
    return view('index');
})->name('dashboard');

// ADMIN
Route::get('/admin/dashboard', [UserController::class, 'index'])->name('admin-dashboard');
Route::get('/admin/edituser/{id}', [UserController::class, 'edit'])->name('admin-edituser');
Route::post('/admin/edituser/{id}', [UserController::class, 'update'])->name('admin-updateuser');
Route::get('/admin/resetpassworduser/{id}', [UserController::class, 'resetpassword'])->name('admin-resetpassworduser');

// DATA SISWA
Route::get('/admin/datasiswa', [SiswaController::class, 'index'])->name('admin-datasiswa');
Route::get('/admin/tambahsiswa', [SiswaController::class, 'addSiswa'])->name('admin-tambahsiswa');
Route::post('/admin/tambahsiswa', [SiswaController::class, 'store'])->name('admin-storesiswa');
Route::get('/admin/showsiswa/{id}', [SiswaController::class, 'show'])->name('admin-showsiswa');
Route::get('/admin/editsiswa/{id}', [SiswaController::class, 'edit'])->name('admin-editsiswa');
Route::post('/admin/editsiswa/{id}', [SiswaController::class, 'update'])->name('admin-updatesiswa');
Route::get('/admin/showdestroysiswa/{id}', [SiswaController::class, 'showDestroy'])->name('admin-showdestroysiswa');
Route::get('/admin/hapussiswa/{id}', [SiswaController::class, 'destroy'])->name('admin-destroysiswa');

// DATA GURU
Route::get('/admin/dataguru', [GuruController::class, 'index'])->name('admin-dataguru');
Route::get('/admin/tambahguru', [GuruController::class, 'addGuru'])->name('admin-tambahguru');
Route::post('/admin/tambahguru', [GuruController::class, 'store'])->name('admin-storeguru');
Route::get('/admin/showguru/{id}', [GuruController::class, 'show'])->name('admin-showguru');
Route::get('/admin/editguru/{id}', [GuruController::class, 'edit'])->name('admin-editguru');
Route::post('/admin/editguru/{id}', [GuruController::class, 'update'])->name('admin-updateguru');
Route::get('/admin/showdestroyguru/{id}', [GuruController::class, 'showDestroy'])->name('admin-showdestroyguru');
Route::get('/admin/hapusguru/{id}', [GuruController::class, 'destroy'])->name('admin-destroyguru');

// DATA MATPEL
Route::get('/admin/datamatpel', [MatpelController::class, 'index'])->name('admin-datamatpel');
Route::get('/admin/tambahmatpel', [MatpelController::class, 'addPelajaran'])->name('admin-tambahmatpel');
Route::post('/admin/tambahmatpel', [MatpelController::class, 'store'])->name('admin-storematpel');
Route::get('/admin/showmatpel/{id}', [MatpelController::class, 'show'])->name('admin-showmatpel');
Route::get('/admin/editmatpel/{id}', [MatpelController::class, 'edit'])->name('admin-editmatpel');
Route::post('/admin/editmatpel/{id}', [MatpelController::class, 'update'])->name('admin-updatematpel');
Route::get('/admin/showdestroymatpel/{id}', [MatpelController::class, 'showDestroy'])->name('admin-showdestroymatpel');
Route::get('/admin/hapusmatpel/{id}', [MatpelController::class, 'destroy'])->name('admin-destroymatpel');

// DATA KELAS
Route::get('/admin/datakelas', [KelasController::class, 'index'])->name('admin-datakelas');
Route::get('/admin/tambahkelas', [KelasController::class, 'addKelas'])->name('admin-tambahkelas');
Route::post('/admin/tambahkelas', [KelasController::class, 'store'])->name('admin-storekelas');
Route::get('/admin/showkelas/{id}', [KelasController::class, 'show'])->name('admin-showkelas');
Route::get('/admin/editkelas/{id}', [KelasController::class, 'edit'])->name('admin-editkelas');
Route::post('/admin/editkelas/{id}', [KelasController::class, 'update'])->name('admin-updatekelas');
Route::get('/admin/showdestroykelas/{id}', [KelasController::class, 'showDestroy'])->name('admin-showdestroykelas');
Route::get('/admin/hapuskelas/{id}', [KelasController::class, 'destroy'])->name('admin-destroykelas');

// DATA GURU MATPEL
Route::get('/admin/gurumatpel', [GuruMatpelController::class, 'index'])->name('admin-gurumatpel');
Route::get('/admin/tambahgurumatpel', [GuruMatpelController::class, 'addGuruMatpel'])->name('admin-tambahgurumatpel');
Route::post('/admin/tambahgurumatpel', [GuruMatpelController::class, 'store'])->name('admin-storegurumatpel');
Route::get('/admin/editgurumatpel/{id}', [GuruMatpelController::class, 'edit'])->name('admin-editgurumatpel');
Route::post('/admin/editgurumatpel/{id}', [GuruMatpelController::class, 'update'])->name('admin-updategurumatpel');
Route::get('/admin/showdestroygurumatpel/{id}', [GuruMatpelController::class, 'showDestroy'])->name('admin-showdestroygurumatpel');
Route::get('/admin/hapusgurumatpel/{id}', [GuruMatpelController::class, 'destroy'])->name('admin-destroygurumatpel');
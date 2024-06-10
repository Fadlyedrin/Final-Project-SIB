<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [UserController::class, 'index'])->name('index');
Route::get('/sekolah', [UserController::class, 'pencarianSekolah'])->name('sekolah');
Route::get('/infosekolah', [UserController::class, 'pencarianInfo'])->name('infosekolah');

Route::get('/login', [AuthController::class, 'loginAdmin'])->name('loginAdmin');
Route::get('/register', [AuthController::class, 'registerAdmin'])->name('registerAdmin');


Route::get('/dashboard', [UserController::class, 'dashboardSekolah'])->name('dashboardSekolah');
Route::get('/guru', [UserController::class, 'guru'])->name('guru');
Route::get('/prestasi', [UserController::class, 'prestasi'])->name('prestasi');
Route::get('/detailprestasi', [UserController::class, 'detailPrestasi'])->name('detailPrestasi');
Route::get('/info', [UserController::class, 'info'])->name('info');
Route::get('/detailinfo', [UserController::class, 'detailInfo'])->name('detailInfo');


Route::get('/admin', [AdminController::class, 'index'])->name('index');

Route::get('/datasekolah', [AdminController::class, 'dataSekolah'])->name('dataSekolah');
Route::get('/tambahdatasekolah', [AdminController::class, 'tambahDataSekolah'])->name('tambahDataSekolah');
Route::get('/editdatasekolah', [AdminController::class, 'editDataSekolah'])->name('editDataSekolah');

Route::get('/dataguru', [AdminController::class, 'dataGuru'])->name('dataGuru');
Route::get('/tambahdataguru', [AdminController::class, 'tambahDataGuru'])->name('tambahDataGuru');
Route::get('/editdataguru', [AdminController::class, 'editDataGuru'])->name('editDataGuru');

Route::get('/datainfo', [AdminController::class, 'dataInfo'])->name('dataInfo');
Route::get('/tambahdatainfo', [AdminController::class, 'tambahDataInfo'])->name('tambahDataInfo');
Route::get('/editdatainfo', [AdminController::class, 'editDataInfo'])->name('editDataInfo');

Route::get('/datapengguna', [AdminController::class, 'dataPengguna'])->name('dataPengguna');
Route::get('/editdatapengguna', [AdminController::class, 'editDataPengguna'])->name('editDataPengguna');
Route::get('/tambahdatapengguna', [AdminController::class, 'tambahDataPengguna'])->name('tambahDataPengguna');
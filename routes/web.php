<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [UserController::class, 'index'])->name('index');
Route::get('/sekolah', [UserController::class, 'pencarianSekolah'])->name('sekolah');
Route::get('/infosekolah', [UserController::class, 'pencarianInfo'])->name('infosekolah');

Route::get('/dashboard', [UserController::class, 'dashboardSekolah'])->name('dashboardSekolah');
Route::get('/dataguru', [UserController::class, 'dataGuru'])->name('dataGuru');
Route::get('/prestasi', [UserController::class, 'prestasi'])->name('prestasi');
Route::get('/detailprestasi', [UserController::class, 'detailPrestasi'])->name('detailPrestasi');
Route::get('/info', [UserController::class, 'info'])->name('info');
Route::get('/detailinfo', [UserController::class, 'detailInfo'])->name('detailInfo');
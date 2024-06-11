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

// Route::get('/', function () {
//     return view('welcome');
// });

// Halaman user
Route::get('/', [UserController::class, 'index'])->name('index');
Route::get('/sekolah', [UserController::class, 'pencarianSekolah'])->name('sekolah');
Route::get('/infosekolah', [UserController::class, 'pencarianInfo'])->name('infosekolah');
Route::get('/dashboard', [UserController::class, 'dashboardSekolah'])->name('dashboardSekolah');
Route::get('/guru', [UserController::class, 'guru'])->name('guru');
Route::get('/prestasi', [UserController::class, 'prestasi'])->name('prestasi');
Route::get('/detailprestasi', [UserController::class, 'detailPrestasi'])->name('detailPrestasi');
Route::get('/info', [UserController::class, 'info'])->name('info');
Route::get('/detailinfo', [UserController::class, 'detailInfo'])->name('detailInfo');

// login, register, logout
Route::get('/login', [AuthController::class, 'loginAdmin'])->name('loginAdmin');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'registerAdmin'])->name('registerAdmin');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Halaman admin & superadmin
Route::prefix('')->middleware('authenticate')->group(function () {
    Route::prefix('')->middleware('auth')->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin');
        
        Route::get('/datasekolah', [AdminController::class, 'dataSekolah'])->name('dataSekolah');
        Route::get('/tambahdatasekolah', [AdminController::class, 'tambahDataSekolah'])->name('tambahDataSekolah');
        Route::get('/editdatasekolah', [AdminController::class, 'editDataSekolah'])->name('editDataSekolah');
        
        Route::get('/dataguru', [AdminController::class, 'dataGuru'])->name('dataGuru');
        Route::get('/tambahdataguru', [AdminController::class, 'tambahDataGuru'])->name('tambahDataGuru');
        Route::get('/editdataguru', [AdminController::class, 'editDataGuru'])->name('editDataGuru');
        
        Route::get('/datainfo', [AdminController::class, 'dataInfo'])->name('dataInfo');
        Route::get('/tambahdatainfo', [AdminController::class, 'tambahDataInfo'])->name('tambahDataInfo');
        Route::get('/editdatainfo', [AdminController::class, 'editDataInfo'])->name('editDataInfo');
        
        Route::prefix('')->middleware('role:superadmin')->group(function () {
            Route::get('/pengguna', [AdminController::class, 'dataPengguna'])->name('dataPengguna');
            Route::get('/datapengguna', [AdminController::class , 'getDatatable'])->name('getDatatablePengguna');
            Route::get('/tambahdatapengguna', [AdminController::class, 'tambahDataPengguna'])->name('tambahDataPengguna');
            Route::post('/storedatapengguna', [AdminController::class , 'storeDataPengguna'])->name('storeDataPengguna');
            Route::get('/editdatapengguna/{user}', [AdminController::class, 'editDataPengguna'])->name('editDataPengguna');
            Route::put('/updatedatapengguna/{user}', [AdminController::class , 'updateDataPengguna'])->name('updateDataPengguna');
            Route::delete('/deletedatapengguna/{user}', [AdminController::class , 'deleteDataPengguna'])->name('deleteDataPengguna'); 
            
            Route::get('/datasekolah-s', [AdminController::class, 'dataSekolahSuperadmin'])->name('dataSekolahSuperadmin');
        });
    }); 
}); 
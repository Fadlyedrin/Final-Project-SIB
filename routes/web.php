<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperadminController;

// Halaman user
Route::get('/', [UserController::class, 'index'])->name('index');
Route::get('/sekolah', [UserController::class, 'pencarianSekolah'])->name('sekolah');
Route::get('/infosekolah', [UserController::class, 'pencarianInfo'])->name('infoSekolah');
Route::get('/carisekolah', [UserController::class, 'cariSekolah'])->name('cariSekolah');
Route::get('/cariinfo', [UserController::class, 'cariInfo'])->name('cariInfo');
Route::get('/dashboard/{sekolah}', [UserController::class, 'dashboardSekolah'])->name('dashboardSekolah');
Route::get('/guru/{sekolah}', [UserController::class, 'guru'])->name('guru');
Route::get('/prestasi/{sekolah}', [UserController::class, 'prestasi'])->name('prestasi');
Route::get('/detailprestasi/{info}', [UserController::class, 'detailPrestasi'])->name('detailPrestasi');
Route::get('/info/{sekolah}', [UserController::class, 'info'])->name('info');
Route::get('/detailinfo/{info}', [UserController::class, 'detailInfo'])->name('detailInfo');

// login, register, logout
Route::get('/login', [AuthController::class, 'loginAdmin'])->name('loginAdmin');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'registerAdmin'])->name('registerAdmin');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Halaman admin & superadmin
Route::prefix('')->middleware('authenticate')->group(function () {
    Route::prefix('logged')->middleware('auth')->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin');
        
        Route::get('/datasekolah', [AdminController::class, 'dataSekolah'])->name('dataSekolah');
        Route::get('/tambahdatasekolah', [AdminController::class, 'tambahDataSekolah'])->name('tambahDataSekolah');
        Route::post('/storedatasekolah', [AdminController::class , 'storeDataSekolah'])->name('storeDataSekolah');
        Route::get('/editdatasekolah/{sekolah}', [AdminController::class, 'editDataSekolah'])->name('editDataSekolah');
        Route::put('/updatedatasekolah/{sekolah}', [AdminController::class , 'updateDataSekolah'])->name('updateDataSekolah');
        Route::delete('/deletedatasekolah/{sekolah}', [AdminController::class , 'deleteDataSekolah'])->name('deleteDataSekolah');
        
        Route::get('/guru', [AdminController::class, 'dataGuru'])->name('dataGuru');
        Route::get('/dataguru', [AdminController::class , 'getDatatableGuru'])->name('getDatatableGuru');
        Route::get('/tambahdataguru', [AdminController::class, 'tambahDataGuru'])->name('tambahDataGuru');
        Route::post('/storedataguru', [AdminController::class , 'storeDataGuru'])->name('storeDataGuru');
        Route::get('/editdataguru/{guru}', [AdminController::class, 'editDataGuru'])->name('editDataGuru');
        Route::put('/updatedataguru/{guru}', [AdminController::class , 'updateDataGuru'])->name('updateDataGuru');
        Route::delete('/deletedataguru/{guru}', [AdminController::class , 'deleteDataGuru'])->name('deleteDataGuru'); 
        
        Route::get('/info', [AdminController::class, 'dataInfo'])->name('dataInfo');
        Route::get('/datainfo', [AdminController::class, 'getDatatableInfo'])->name('getDatatableInfo');
        Route::get('/tambahdatainfo', [AdminController::class, 'tambahDataInfo'])->name('tambahDataInfo');
        Route::post('/storedatainfo', [AdminController::class , 'storeDataInfo'])->name('storeDataInfo');
        Route::get('/editdatainfo/{info}', [AdminController::class, 'editDataInfo'])->name('editDataInfo');
        Route::put('/updatedatainfo/{info}', [AdminController::class , 'updateDataInfo'])->name('updateDataInfo');
        Route::delete('/deletedatainfo/{info}', [AdminController::class , 'deleteDataInfo'])->name('deleteDataInfo');

        Route::get('/editdataadmin/{user}', [AdminController::class, 'editDataAdmin'])->name('editDataAdmin');
        Route::put('/updatedataadmin/{user}', [AdminController::class , 'updateDataAdmin'])->name('updateDataAdmin');
        
        Route::prefix('')->middleware('role:superadmin')->group(function () {
            Route::get('/pengguna', [SuperadminController::class, 'dataPengguna'])->name('dataPengguna');
            Route::get('/datapengguna', [SuperadminController::class , 'getDatatablePengguna'])->name('getDatatablePengguna');
            Route::get('/tambahdatapengguna', [SuperadminController::class, 'tambahDataPengguna'])->name('tambahDataPengguna');
            Route::post('/storedatapengguna', [SuperadminController::class , 'storeDataPengguna'])->name('storeDataPengguna');
            Route::get('/editdatapengguna/{user}', [SuperadminController::class, 'editDataPengguna'])->name('editDataPengguna');
            Route::put('/updatedatapengguna/{user}', [SuperadminController::class , 'updateDataPengguna'])->name('updateDataPengguna');
            Route::delete('/deletedatapengguna/{user}', [SuperadminController::class , 'deleteDataPengguna'])->name('deleteDataPengguna'); 
            
            Route::get('/sekolah-s', [SuperadminController::class, 'dataSekolah'])->name('dataSekolahSuperadmin');
            Route::get('/datasekolah-s', [SuperadminController::class , 'getDatatableSekolah'])->name('getDatatableSekolah');
            Route::get('/tambahdatasekolah-s', [SuperadminController::class, 'tambahDataSekolah'])->name('tambahDataSekolahSuperadmin');
            Route::post('/storedatasekolah-s', [SuperadminController::class , 'storeDataSekolah'])->name('storeDataSekolahSuperadmin');
            Route::get('/editdatasekolah-s/{sekolah}', [SuperadminController::class, 'editDataSekolah'])->name('editDataSekolahSuperadmin');
            Route::put('/updatedatasekolah-s/{sekolah}', [SuperadminController::class , 'updateDataSekolah'])->name('updateDataSekolahSuperadmin');
            Route::delete('/deletedatasekolah-s/{sekolah}', [SuperadminController::class , 'deleteDataSekolah'])->name('deleteDataSekolahSuperadmin');

            Route::get('/guru-s', [SuperadminController::class, 'dataGuru'])->name('dataGuruSuperadmin');
            Route::get('/dataguru-s', [SuperadminController::class , 'getDatatableGuru'])->name('getDatatableGuruSuperadmin');
            Route::get('/tambahdataguru-s', [SuperadminController::class, 'tambahDataGuru'])->name('tambahDataGuruSuperadmin');
            Route::post('/storedataguru-s', [SuperadminController::class , 'storeDataGuru'])->name('storeDataGuruSuperadmin');
            Route::get('/editdataguru-s/{guru}', [SuperadminController::class, 'editDataGuru'])->name('editDataGuruSuperadmin');
            Route::put('/updatedataguru-s/{guru}', [SuperadminController::class , 'updateDataGuru'])->name('updateDataGuruSuperadmin');
            Route::delete('/deletedataguru-s/{guru}', [SuperadminController::class , 'deleteDataGuru'])->name('deleteDataGuruSuperadmin'); 

            Route::get('/info-s', [SuperadminController::class, 'dataInfo'])->name('dataInfoSuperadmin');
            Route::get('/datainfo-s', [SuperadminController::class, 'getDatatableInfo'])->name('getDatatableInfoSuperadmin');
            Route::get('/tambahdatainfo-s', [SuperadminController::class, 'tambahDataInfo'])->name('tambahDataInfoSuperadmin');
            Route::post('/storedatainfo-s', [SuperadminController::class , 'storeDataInfo'])->name('storeDataInfoSuperadmin');
            Route::get('/editdatainfo-s/{info}', [SuperadminController::class, 'editDataInfo'])->name('editDataInfoSuperadmin');
            Route::put('/updatedatainfo-s/{info}', [SuperadminController::class , 'updateDataInfo'])->name('updateDataInfoSuperadmin');
            Route::delete('/deletedatainfo-s/{info}', [SuperadminController::class , 'deleteDataInfo'])->name('deleteDataInfoSuperadmin');
        });
    }); 
}); 
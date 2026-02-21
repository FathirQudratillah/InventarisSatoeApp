<?php

use App\Http\Controllers\Admin\Dashboardontroller;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DataAkunController;
use App\Http\Controllers\Admin\DataGuruController;
use App\Http\Controllers\Admin\DataAdminController;
use App\Http\Controllers\Admin\DataKelasController;
use App\Http\Controllers\Admin\DataRuangController;
use App\Http\Controllers\Admin\DataSiswaController;
use App\Http\Controllers\Admin\DataBarangController;
use App\Http\Controllers\Admin\DataJurusanController;
use App\Http\Controllers\Admin\DataAngkatanController;
use App\Http\Controllers\Admin\DataJenisBarangController;
use App\Http\Controllers\Admin\PengajuanBarangController;
use App\Http\Controllers\Admin\DetailPeminjamanController;
use App\Http\Controllers\Admin\PeminjamanBarangController;
use App\Http\Controllers\Admin\DataKategoriBarangController;
use App\Http\Controllers\Admin\PemeliharaanBarangController;
use App\Http\Controllers\Admin\DataPenanggungJawabController;
use App\Http\Controllers\Auth\RegisterController;


Route::get('/login',[AuthController::class, 'loginForm'])->name('login');

Route::post('/login',[AuthController::class, 'login']);


Route::resource('register', RegisterController::class);



Route::middleware(['auth'])
    ->group(function(){
        Route::get('/', [Dashboardontroller::class, 'index'])->name('dashboard');

        Route::get('/detail', [AuthController::class, 'show'])->name('detail');

        Route::post('/logout', [AuthController::class, 'logout']);

        Route::resource('data-akun', DataAkunController::class);

        Route::get('/ubah', [DataAkunController::class, 'ubah'])->name('ubah');

        Route::put('/ubah-password', [DataAkunController::class, 'ubahPassword'])->name('ubah-password');

    });

Route::middleware(['auth', 'role:admin'])
    ->group(function() {

        Route::resource('data-kelas', DataKelasController::class);

        Route::resource('data-siswa', DataSiswaController::class);

        Route::resource('data-guru', DataGuruController::class);

        Route::resource('data-jurusan', DataJurusanController::class);

        Route::resource('data-angkatan', DataAngkatanController::class);

        Route::resource('data-admin', DataAdminController::class);

        Route::resource('data-ruang', DataRuangController::class);

        Route::resource('data-barang', DataBarangController::class);

        Route::resource('data-kategori-barang', DataKategoriBarangController::class);

        Route::resource('data-jenis-barang', DataJenisBarangController::class);

        Route::resource('peminjaman-barang', PeminjamanBarangController::class);

        Route::resource('pemeliharaan-barang', PemeliharaanBarangController::class);

        Route::resource('detail-peminjaman', DetailPeminjamanController::class);

        Route::resource('pengajuan-barang', PengajuanBarangController::class);

        Route::resource('data-penanggung-jawab', DataPenanggungJawabController::class);
    });







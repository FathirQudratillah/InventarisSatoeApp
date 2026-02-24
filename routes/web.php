<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DataAdminController;
use App\Http\Controllers\Admin\DataAkunController;
use App\Http\Controllers\Admin\DataAngkatanController;
use App\Http\Controllers\Admin\DataBarangController;
use App\Http\Controllers\Admin\DataGuruController;
use App\Http\Controllers\Admin\DataJenisBarangController;
use App\Http\Controllers\Admin\DataJurusanController;
use App\Http\Controllers\Admin\DataKategoriBarangController;
use App\Http\Controllers\Admin\DataKelasController;
use App\Http\Controllers\Admin\DataPenanggungJawabController;
use App\Http\Controllers\Admin\DataRuangController;
use App\Http\Controllers\Admin\DataSiswaController;
use App\Http\Controllers\Admin\DetailPeminjamanController;
use App\Http\Controllers\Admin\laporanController;
use App\Http\Controllers\Admin\PemeliharaanBarangController;
use App\Http\Controllers\Admin\PeminjamanBarangController;
use App\Http\Controllers\Admin\PengajuanBarangController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;





Route::get('/login', [AuthController::class, 'loginForm'])->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::resource('register', RegisterController::class);



Route::middleware(['auth'])
    ->group(function () {

        Route::get('/detail', [AuthController::class, 'show'])->name('detail');

        Route::post('/logout', [AuthController::class, 'logout']);

        Route::resource('data-akun', DataAkunController::class);

        Route::get('/ubah', [DataAkunController::class, 'ubah'])->name('ubah');

        Route::put('/ubah-password', [DataAkunController::class, 'ubahPassword'])->name('ubah-password');
    });





Route::middleware(['auth', 'role:admin'])
    ->group(function () {
        Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard.admin'); // admin

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

        route::get('/peminjaman/{id}/accept', [PeminjamanBarangController::class, 'accept'])
            ->name('peminjaman-barang.accept');

        Route::get('/laporan', [laporanController::class, 'index'])
            ->name('laporan.index');

        Route::get('/laporan/peminjaman', [laporanController::class, 'peminjaman'])
            ->name('laporan.laporan-peminjaman');

        Route::get('/laporan/pemeliharaan', [laporanController::class, 'pemeliharaan'])
            ->name('laporan.laporan-pemeliharaan');

        Route::get('/laporan/pengembalian', [laporanController::class, 'pengembalian'])
            ->name('laporan.laporan-pengembalian');

        Route::get('/laporan/pengajuan', [laporanController::class, 'pengajuan'])
            ->name('laporan.laporan-pengajuan');

        Route::get('/laporan/peminjaman/cetak', [laporanController::class, 'cetakPeminjaman'])
            ->name('laporan.peminjaman.cetak');

        Route::get('/laporan/pemeliharaan/cetak', [laporanController::class, 'cetakPemeliharaan'])
            ->name('laporan.pemeliharaan.cetak');

        Route::get('/laporan/pengajuan/cetak', [laporanController::class, 'cetakPengajuan'])
            ->name('laporan.pengajuan.cetak');
    });

Route::middleware(['auth', 'role:siswa'])
    ->group(function () {
        Route::get('/siswa', [DashboardController::class, 'siswa'])->name('dashboard.siswa'); // siswa

        Route::get('/siswa/peminjaman-barang.create', [PeminjamanBarangController::class, 'create'])->name('siswa.peminjaman-barang.create');
        Route::post('/siswa/peminjaman-barang.store', [PeminjamanBarangController::class, 'store'])->name('siswa.peminjaman-barang.store');
    });

Route::middleware(['auth', 'role:guru'])
    ->group(function () {
        Route::get('/guru', [DashboardController::class, 'guru'])->name('dashboard.guru'); //guru

    Route::get('/guru/peminjaman-barang.create', [PeminjamanBarangController::class, 'create'])->name('guru.peminjaman-barang.create');

        Route::resource('pengajuan-barang', PengajuanBarangController::class)
            ->only('create', 'store');
    });

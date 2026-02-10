<?php

use App\Models\DataAkun;
use App\Models\DataKelas;
use App\Models\DataSiswa;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataAkunController;
use App\Http\Controllers\DataGuruController;
use App\Http\Controllers\DataAdminController;
use App\Http\Controllers\DataKelasController;
use App\Http\Controllers\DataRuangController;
use App\Http\Controllers\DataSiswaController;
use App\Http\Controllers\DataBarangController;
use App\Http\Controllers\DataJurusanController;
use App\Http\Controllers\DataAngkatanController;
use App\Http\Controllers\DataJenisBarangController;
use App\Http\Controllers\PengajuanBarangController;
use App\Http\Controllers\DetailPeminjamanController;
use App\Http\Controllers\PeminjamanBarangController;
use App\Http\Controllers\DataKategoriBarangController;
use App\Http\Controllers\PemeliharaanBarangController;
use App\Http\Controllers\DataPenanggungJawabController;

Route::get('/', function () {
    return view('dashboard');
});

Route::resource('data-akun', DataAkunController::class);

Route::resource('data-kelas', DataKelasController::class);

Route::resource('data-siswa', DataSiswaController::class);

Route::resource('data-guru', DataGuruController::class);

Route::resource('data-jurusan', DataJurusanController::class);

Route::resource('angkatan', DataAngkatanController::class);

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

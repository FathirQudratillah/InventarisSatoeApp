<?php

use App\Models\DataAkun;
use App\Models\DataKelas;
use App\Models\DataSiswa;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataAkunController;
use App\Http\Controllers\DataKelasController;
use App\Http\Controllers\DataSiswaController;

Route::get('/', function () {
    return view('dashboard');
});

Route::resource('data-akun', DataAkunController::class);

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

Route::resource('data-peminjaman-barang', DataPeminjamanBarangController::class);

Route::resource('data-pemeliharaan-barang', DataPemeliharaanBarangController::class);

Route::resource('data-detail-peminjaman', DataDetailPeminjamanController::class);

Route::resource('data-pengajuan', DataPengajuanController::class);

Route::resource('data-penanggung-jawab', DataPenanggungJawabController::class);

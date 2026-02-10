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
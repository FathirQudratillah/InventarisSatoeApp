<?php

use App\Models\DataAkun;
use App\Models\DataKelas;
use App\Models\DataSiswa;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataAkunController;
use App\Http\Controllers\DataKelasController;
use App\Http\Controllers\DataSiswaController;

Route::get('/', function () {
    return view('home', [
        'posts' => DataAkun::All(), 
        'akuns' => DataSiswa::All(),
        'kelass' => DataKelas::All()
        ]);
});

Route::resource('DataAkun', DataAkunController::class);

Route::resource('DataKelas', DataKelasController::class);

Route::resource('DataSiswa', DataSiswaController::class);
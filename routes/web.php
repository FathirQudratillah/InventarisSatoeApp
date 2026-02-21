<?php

use App\Http\Controllers\AuthController;
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

use App\Models\DataBarang;
use App\Models\DataAkun;
use App\Models\DataRuang;
use App\Models\DataJurusan;
use App\Models\PeminjamanBarang;
use App\Models\PengajuanBarang;
use App\Models\PemeliharaanBarang;
use App\Models\DataKelas;
use App\Models\DataJenisBarang;
use App\Models\DataKategoriBarang;
use App\Models\DataPenanggungJawab;
use App\Models\DataAngkatan;
use Illuminate\Support\Facades\DB;
Route::get('/', function () {

    $totalBarang = DataBarang::count();

    $peminjamanAktif  = PeminjamanBarang::where('status_peminjaman', 'dipinjam')->count();
    $pengajuanPending = PengajuanBarang::where('status_pengajuan', 'pending')->count();
    $pemeliharaan     = PemeliharaanBarang::count();

    $peminjamanTerbaru  = PeminjamanBarang::latest()->take(5)->get();
    $pengajuanTerbaru   = PengajuanBarang::latest()->take(4)->get();
    $pemeliharaanTerbaru = PemeliharaanBarang::latest()->take(4)->get();

    $totalRuang           = DataRuang::count();
    $peminjaman           = PeminjamanBarang::count();
    $pengajuan            = PengajuanBarang::count();
    $totalJurusan         = DataJurusan::count();
    $totalAkun            = DataAkun::count();
    $totalKelas           = DataKelas::count();
    $totalJenisBarang     = DataJenisBarang::count();
    $totalKategoriBarang  = DataKategoriBarang::count();
    $totalPenanggungJawab = DataPenanggungJawab::count();
    $totalAngkatan        = DataAngkatan::count();

    // Kode barang yang sedang dipinjam (join detail_peminjaman & peminjaman_barang)
    $kodeBarangDipinjam = DB::table('detail_peminjaman')
        ->join('peminjaman_barang', 'peminjaman_barang.id_peminjaman', '=', 'detail_peminjaman.id_peminjaman')
        ->where('peminjaman_barang.status_peminjaman', 'dipinjam')
        ->pluck('detail_peminjaman.kode_barang')
        ->unique()
        ->values();

    // Top 10 barang paling sering muncul di detail_peminjaman
    $topBarangRaw = DB::table('detail_peminjaman')
        ->select('kode_barang', DB::raw('COUNT(*) as total_dipinjam'))
        ->groupBy('kode_barang')
        ->orderByDesc('total_dipinjam')
        ->get();

    $topBarang            = $topBarangRaw->take(3);   // untuk kartu top 3
    $barangSeringDipinjam = $topBarangRaw->take(10);  // untuk grid top 10

    $allBarang = DataBarang::join('data_jenis_barang', 'data_barang.jenis_barang', '=', 'data_jenis_barang.jenis_barang')
    ->select('data_barang.*', 'data_jenis_barang.nama_barang')
    ->get()
    ->keyBy('kode_barang');

    // Barang tersedia  = tidak ada di daftar kode yang sedang dipinjam
    $barangTersedia = $allBarang
        ->filter(fn($b) => !$kodeBarangDipinjam->contains($b->kode_barang))
        ->values();

    // Barang tidak tersedia = sedang dipinjam
    $barangTidakTersedia = $allBarang
        ->filter(fn($b) => $kodeBarangDipinjam->contains($b->kode_barang))
        ->values();

    return view('dashboard', compact(
        'totalBarang',
        'peminjamanAktif',
        'pengajuanPending',
        'peminjaman',
        'pemeliharaan',
        'pengajuan',
        'peminjamanTerbaru',
        'pengajuanTerbaru',
        'pemeliharaanTerbaru',
        'totalRuang',
        'totalJurusan',
        'totalAkun',
        'totalKelas',
        'totalBarang',
        'totalJenisBarang',
        'totalKategoriBarang',
        'totalPenanggungJawab',
        'totalAngkatan',
        'topBarang',
        'barangSeringDipinjam',
        'barangTersedia',
        'barangTidakTersedia',
        'allBarang',
    ));

})->middleware('auth');

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

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
Route::resource('peminjaman-barang', PeminjamanBarangController::class);
Route::resource('pemeliharaan-barang', PemeliharaanBarangController::class);
Route::resource('detail-peminjaman', DetailPeminjamanController::class);
Route::resource('pengajuan-barang', PengajuanBarangController::class);
Route::resource('data-penanggung-jawab', DataPenanggungJawabController::class);
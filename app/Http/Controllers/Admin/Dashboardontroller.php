<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

class Dashboardontroller extends Controller
{
    public function index()
    {
        $stats        = $this->getStats();
        $latest       = $this->getLatestData();
        $barangData   = $this->getBarangData();

        return view('dashboard.admin', array_merge($stats, $latest, $barangData));
    }

    private function getStats()
    {
        return [
            'totalBarang'           => DataBarang::count(),
            'peminjamanAktif'       => PeminjamanBarang::where('status_peminjaman', 'dipinjam')->count(),
            'pengajuanPending'      => PengajuanBarang::where('status_pengajuan', 'pending')->count(),
            'pemeliharaan'          => PemeliharaanBarang::count(),

            'totalRuang'            => DataRuang::count(),
            'peminjaman'            => PeminjamanBarang::count(),
            'pengajuan'             => PengajuanBarang::count(),
            'totalJurusan'          => DataJurusan::count(),
            'totalAkun'             => DataAkun::count(),
            'totalKelas'            => DataKelas::count(),
            'totalJenisBarang'      => DataJenisBarang::count(),
            'totalKategoriBarang'   => DataKategoriBarang::count(),
            'totalPenanggungJawab'  => DataPenanggungJawab::count(),
            'totalAngkatan'         => DataAngkatan::count(),
        ];
    }

    private function getLatestData()
    {
        return [
            'peminjamanTerbaru'   => PeminjamanBarang::latest()->take(5)->get(),
            'pengajuanTerbaru'    => PengajuanBarang::latest()->take(4)->get(),
            'pemeliharaanTerbaru' => PemeliharaanBarang::latest()->take(4)->get(),
        ];
    }

    private function getBarangData()
    {
        $kodeBarangDipinjam = DB::table('detail_peminjaman')
            ->join('peminjaman_barang', 'peminjaman_barang.id_peminjaman', '=', 'detail_peminjaman.id_peminjaman')
            ->where('peminjaman_barang.status_peminjaman', 'dipinjam')
            ->pluck('detail_peminjaman.kode_barang')
            ->unique()
            ->values();

        $topBarangRaw = DB::table('detail_peminjaman')
            ->select('kode_barang', DB::raw('COUNT(*) as total_dipinjam'))
            ->groupBy('kode_barang')
            ->orderByDesc('total_dipinjam')
            ->get();

        $allBarang = DataBarang::join(
            'data_jenis_barang',
            'data_barang.jenis_barang',
            '=',
            'data_jenis_barang.jenis_barang'
        )
            ->select('data_barang.*', 'data_jenis_barang.nama_barang')
            ->get()
            ->keyBy('kode_barang');

        $barangTersedia = $allBarang
            ->filter(fn($b) => !$kodeBarangDipinjam->contains($b->kode_barang))
            ->values();

        $barangTidakTersedia = $allBarang
            ->filter(fn($b) => $kodeBarangDipinjam->contains($b->kode_barang))
            ->values();

        return [
            'topBarang'            => $topBarangRaw->take(3),
            'barangSeringDipinjam' => $topBarangRaw->take(10),
            'barangTersedia'       => $barangTersedia,
            'barangTidakTersedia'  => $barangTidakTersedia,
            'allBarang'            => $allBarang,
        ];
    }
}

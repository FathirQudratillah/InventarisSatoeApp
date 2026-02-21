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

class DashboardController extends Controller
{
    // ─────────────────────────────────────────────────────────────
    // PUBLIC ROUTES
    // ─────────────────────────────────────────────────────────────

    public function index()
    {
        $stats      = $this->getStats();
        $latest     = $this->getLatestData();
        $barangData = $this->getBarangData();

        return view('dashboard.admin', array_merge($stats, $latest, $barangData));
    }

    public function siswa()
    {
        $barangData = $this->getBarangData();
        $dataSiswa  = $this->getDataSiswa();

        return view('dashboard.siswa', array_merge($barangData, $dataSiswa));
    }

    public function guru()
    {
        $barangData = $this->getBarangData();
        $dataGuru   = $this->getDataGuru();

        // getDataGuru me-override key yang relevan dari getBarangData
        return view('dashboard.guru', array_merge($barangData, $dataGuru));
    }

    // ─────────────────────────────────────────────────────────────
    // SHARED HELPERS
    // ─────────────────────────────────────────────────────────────

    private function getStats()
    {
        return [
            'totalBarang'          => DataBarang::count(),
            'peminjamanAktif'      => PeminjamanBarang::where('status_peminjaman', 'dipinjam')->count(),
            'pengajuanPending'     => PengajuanBarang::where('status_pengajuan', 'pending')->count(),
            'pemeliharaan'         => PemeliharaanBarang::count(),
            'totalRuang'           => DataRuang::count(),
            'peminjaman'           => PeminjamanBarang::count(),
            'pengajuan'            => PengajuanBarang::count(),
            'totalJurusan'         => DataJurusan::count(),
            'totalAkun'            => DataAkun::count(),
            'totalKelas'           => DataKelas::count(),
            'totalJenisBarang'     => DataJenisBarang::count(),
            'totalKategoriBarang'  => DataKategoriBarang::count(),
            'totalPenanggungJawab' => DataPenanggungJawab::count(),
            'totalAngkatan'        => DataAngkatan::count(),
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

        // Stok-based availability
        $barangTersedia      = $allBarang->filter(fn($b) => $b->stok > 0)->values();
        $barangTidakTersedia = $allBarang->filter(fn($b) => $b->stok <= 0)->values();

        return [
            'topBarang'            => $topBarangRaw->take(3),
            'barangSeringDipinjam' => $topBarangRaw->take(10),
            'barangTersedia'       => $barangTersedia,
            'barangTidakTersedia'  => $barangTidakTersedia,
            'allBarang'            => $allBarang,
            'topBarangRaw'         => $topBarangRaw,
        ];
    }

    // ─────────────────────────────────────────────────────────────
    // SISWA
    // ─────────────────────────────────────────────────────────────

    private function getDataSiswa()
    {
        $userId = auth()->user()->user_id;

        $peminjamanAktifDetailSiswa = PeminjamanBarang::where('user_id', $userId)
            ->where('status_peminjaman', 'dipinjam')
            ->latest()->get()
            ->map(function ($peminjaman) {
                $peminjaman->detail_barang = DB::table('detail_peminjaman')
                    ->join('data_barang', 'detail_peminjaman.kode_barang', '=', 'data_barang.kode_barang')
                    ->join('data_jenis_barang', 'data_barang.jenis_barang', '=', 'data_jenis_barang.jenis_barang')
                    ->where('detail_peminjaman.id_peminjaman', $peminjaman->id_peminjaman)
                    ->select('detail_peminjaman.kode_barang', 'data_jenis_barang.nama_barang', 'data_barang.kondisi_barang')
                    ->get();
                return $peminjaman;
            });

        $topBarangSiswaRaw = DB::table('detail_peminjaman')
            ->join('peminjaman_barang', 'peminjaman_barang.id_peminjaman', '=', 'detail_peminjaman.id_peminjaman')
            ->where('peminjaman_barang.user_id', $userId)
            ->select('detail_peminjaman.kode_barang', DB::raw('COUNT(*) as total_dipinjam'))
            ->groupBy('detail_peminjaman.kode_barang')
            ->orderByDesc('total_dipinjam')
            ->get();

        $allBarang = DataBarang::join('data_jenis_barang', 'data_barang.jenis_barang', '=', 'data_jenis_barang.jenis_barang')
            ->select('data_barang.*', 'data_jenis_barang.nama_barang')
            ->get()->keyBy('kode_barang');

        $barangTersedia      = $allBarang->filter(fn($b) => $b->stok > 0)->values();
        $barangTidakTersedia = $allBarang->filter(fn($b) => $b->stok <= 0)->values();

        return [
            'peminjamanAktifDetailSiswa' => $peminjamanAktifDetailSiswa,
            'peminjamanAktifSiswa'       => $peminjamanAktifDetailSiswa->count(),
            'pengembalianSiswa'          => PeminjamanBarang::where('user_id', $userId)->where('status_peminjaman', 'dikembalikan')->count(),
            'pengajuanSiswa'             => PengajuanBarang::where('user_id', $userId)->where('status_pengajuan', 'pending')->count(),
            'totalRiwayatSiswa'          => PeminjamanBarang::where('user_id', $userId)->count(),
            'peminjamanTerbaru'          => PeminjamanBarang::where('user_id', $userId)->latest()->take(10)->get(),
            'logAktivitasSiswa'          => PeminjamanBarang::where('user_id', $userId)->latest()->take(20)->get(),
            'topBarang'                  => $topBarangSiswaRaw->take(3),
            'barangSeringDipinjam'       => $topBarangSiswaRaw->take(10),
            'topBarangRaw'               => $topBarangSiswaRaw,
            'barangTersedia'             => $barangTersedia,
            'barangTidakTersedia'        => $barangTidakTersedia,
            'allBarang'                  => $allBarang,
        ];
    }

    // ─────────────────────────────────────────────────────────────
    // GURU
    // ─────────────────────────────────────────────────────────────

    private function getDataGuru()
    {
        $userId = auth()->user()->user_id;

        // ── 1.a Stat milik guru sendiri (untuk banner profile) ────
        $peminjamanAktifGuru = PeminjamanBarang::where('user_id', $userId)
            ->where('status_peminjaman', 'dipinjam')->count();

        $pengembalianGuru = PeminjamanBarang::where('user_id', $userId)
            ->where('status_peminjaman', 'dikembalikan')->count();

        $pengajuanGuru = PengajuanBarang::where('user_id', $userId)
            ->where('status_pengajuan', 'pending')->count();

        $totalRiwayatGuru = PeminjamanBarang::where('user_id', $userId)->count();

        // ── 1.b Top 3 barang sering dipinjam khusus guru ini ─────
        $topBarangGuruRaw = DB::table('detail_peminjaman')
            ->join('peminjaman_barang', 'peminjaman_barang.id_peminjaman', '=', 'detail_peminjaman.id_peminjaman')
            ->where('peminjaman_barang.user_id', $userId)
            ->select('detail_peminjaman.kode_barang', DB::raw('COUNT(*) as total_dipinjam'))
            ->groupBy('detail_peminjaman.kode_barang')
            ->orderByDesc('total_dipinjam')
            ->get();

        // ── 1.c Barang sedang dipinjam pengguna (semua user) ──────
        // Diambil dari allBarang stok <= 0 (sudah di-override di bawah)

        // ── 1.d Log aktivitas semua pengguna (bisa dipantau guru) ─
        $logAktivitasGuru = PeminjamanBarang::latest()->take(20)->get();

        // ── 1.e Pengembalian terbaru semua pengguna ───────────────
        $pengembalianTerbaru = PeminjamanBarang::where('status_peminjaman', 'dikembalikan')
            ->latest()->take(10)->get();

        // ── 5.a allBarang untuk lookup nama + stok-based filter ───
        $allBarang = DataBarang::join(
            'data_jenis_barang',
            'data_barang.jenis_barang',
            '=',
            'data_jenis_barang.jenis_barang'
        )
            ->select('data_barang.*', 'data_jenis_barang.nama_barang')
            ->get()->keyBy('kode_barang');

        // Stok-based: tersedia = stok > 0, tidak tersedia = stok <= 0
        $barangTersedia      = $allBarang->filter(fn($b) => $b->stok > 0)->values();
        $barangTidakTersedia = $allBarang->filter(fn($b) => $b->stok <= 0)->values();

        return [
            // 1.a — stat guru sendiri
            'peminjamanAktifGuru'  => $peminjamanAktifGuru,
            'pengembalianGuru'     => $pengembalianGuru,
            'pengajuanGuru'        => $pengajuanGuru,
            'totalRiwayatGuru'     => $totalRiwayatGuru,

            // 1.b — top barang per guru (override getBarangData)
            'topBarang'            => $topBarangGuruRaw->take(3),
            'barangSeringDipinjam' => $topBarangGuruRaw->take(10),
            'topBarangRaw'         => $topBarangGuruRaw,

            // 1.d — log aktivitas semua user
            'logAktivitasGuru'     => $logAktivitasGuru,

            // 1.e — pengembalian semua user
            'pengembalianTerbaru'  => $pengembalianTerbaru,

            // 5.a — stok-based (override getBarangData)
            'barangTersedia'       => $barangTersedia,
            'barangTidakTersedia'  => $barangTidakTersedia,
            'allBarang'            => $allBarang,
        ];
    }
}

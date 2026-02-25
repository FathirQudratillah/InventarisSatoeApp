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
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
  

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

        return view('dashboard.guru', array_merge($barangData, $dataGuru));
    }

    // ─────────────────────────────────────────────────────────────
    // SHARED HELPERS
    // ─────────────────────────────────────────────────────────────

    

    private function getStats()
    {
        return Cache::remember('admin_dashboard_stats', 60, function () {

            $peminjamanStats = PeminjamanBarang::selectRaw("
            COUNT(*) as total,
            SUM(CASE WHEN status_peminjaman = 'dipinjam' THEN 1 ELSE 0 END) as aktif
        ")->first();

            $pengajuanStats = PengajuanBarang::selectRaw("
            COUNT(*) as total,
            SUM(CASE WHEN status_pengajuan = 'pending' THEN 1 ELSE 0 END) as pending
        ")->first();

            return [
                'totalBarang'          => DataBarang::count(),
                'peminjaman'           => $peminjamanStats->total,
                'peminjamanAktif'      => $peminjamanStats->aktif,
                'pengajuan'            => $pengajuanStats->total,
                'pengajuanPending'     => $pengajuanStats->pending,
                'pemeliharaan'         => PemeliharaanBarang::count(),
                'totalRuang'           => DataRuang::count(),
                'totalJurusan'         => DataJurusan::count(),
                'totalAkun'            => DataAkun::count(),
                'totalKelas'           => DataKelas::count(),
                'totalJenisBarang'     => DataJenisBarang::count(),
                'totalKategoriBarang'  => DataKategoriBarang::count(),
                'totalPenanggungJawab' => DataPenanggungJawab::count(),
                'totalAngkatan'        => DataAngkatan::count(),
            ];
        });
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
        $barang = DataBarang::withCount([
            'detail as dipinjam_count' => function ($q) {
                $q->whereHas('peminjaman', function ($sub) {
                    $sub->where('status_peminjaman', 'dipinjam');
                });
            }
        ])->with('jenis')->get();

        $barangTersedia = $barang->where('dipinjam_count', 0);
        $barangTidakTersedia = $barang->where('dipinjam_count', '>', 0);



        $topBarangRaw = DataBarang::withCount(['detail as detail_count' => function ($query) {
            $query->whereHas('peminjaman', function ($q) {
                $q->where('status_peminjaman', '!=', 'Pending');
            });
        }])
            ->whereHas('detail.peminjaman', function ($query) {
                $query->where('status_peminjaman', '!=', 'Pending');
            })
            ->with('jenis.kategori')
            ->orderByDesc('detail_count')
            ->limit(3)
            ->get();

        $requestPeminjaman = PeminjamanBarang::with([
            'user',
            'detail.barang.jenis'
        ])
            ->where('status_peminjaman', 'Pending')
            ->latest()
            ->get();

        $requestPengembalian = PeminjamanBarang::with([
            'user',
            'detail.barang.jenis'
        ])
            ->where('status_peminjaman', 'dikembalikan?')
            ->latest()
            ->get();

        return [
            'topBarang'            => $topBarangRaw,
            'barangTersedia'       => $barangTersedia,
            'barangTidakTersedia'  => $barangTidakTersedia,
            
            'requestPeminjaman'    => $requestPeminjaman,
            'requestPengembalian'    => $requestPengembalian,
        ];
    }

    // ─────────────────────────────────────────────────────────────
    // SISWA
    // ─────────────────────────────────────────────────────────────

    private function getDataSiswa()
    {
        $userId = auth()->id();

        return [
            'peminjamanAktifSiswa' => PeminjamanBarang::where('user_id', $userId)
                ->where('status_peminjaman', 'dipinjam')
                ->count(),

            'pengembalianSiswa' => PeminjamanBarang::where('user_id', $userId)
                ->where('status_peminjaman', 'dikembalikan')
                ->count(),


            'totalRiwayatSiswa' => PeminjamanBarang::where('user_id', $userId)->count(),

            'peminjamanTerbaru' => PeminjamanBarang::with('detail.barang.jenis')
                ->where('user_id', $userId)
                ->latest()
                ->limit(10)
                ->get(),
        ];
    }

    // ─────────────────────────────────────────────────────────────
    // GURU
    // ─────────────────────────────────────────────────────────────

    private function getDataGuru()
    {

        $userId = auth()->id();

        return [
            'peminjamanAktifGuru' => PeminjamanBarang::where('user_id', $userId)
                ->where('status_peminjaman', 'dipinjam')
                ->count(),

            'pengembalianGuru' => PeminjamanBarang::where('user_id', $userId)
                ->where('status_peminjaman', 'dikembalikan')
                ->count(),


            'totalRiwayatGuru' => PeminjamanBarang::where('user_id', $userId)->count(),

            'peminjamanTerbaru' => PeminjamanBarang::with('detail.barang.jenis')
                ->where('user_id', $userId)
                ->latest()
                ->limit(10)
                ->get(),
        ];
    }
}

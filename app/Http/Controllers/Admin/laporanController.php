<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PeminjamanBarang;
use App\Models\PengajuanBarang;
use App\Models\PemeliharaanBarang;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use App\Models\DetailPeminjaman;

class laporanController extends Controller
{
    public function index(Request $request)
    {
        $bulan = now()->format('m');
        $tahun = now()->format('Y');

        $namaBulan = [
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember'
        ][$bulan];

        $data = DetailPeminjaman::whereMonth('created_at', $bulan)
            ->whereYear('created_at', $tahun)
            ->get();

        return view('laporan.laporan', compact('data', 'namaBulan', 'tahun', 'bulan'));
    }

    // Peminjaman
    public function peminjaman(Request $request)
    {

        $bulan = (int) request('bulan', now()->month);
        $tahun = (int) request('tahun', now()->year);

        $data = PeminjamanBarang::whereMonth('tanggal_peminjaman', $bulan)
            ->whereYear('tanggal_peminjaman', $tahun)
            ->latest('tanggal_peminjaman')
            ->get();

        $namaBulan = Carbon::create()->month($bulan)->locale('id')->translatedFormat('F');

        return view('laporan.laporan-peminjaman', compact('data', 'bulan', 'tahun', 'namaBulan'));
    }

    // Pengajuan
    public function pengajuan(Request $request)
    {
        $bulan = (int) request('bulan', now()->month);
        $tahun = (int) request('tahun', now()->year);

        $data = PengajuanBarang::whereMonth('tanggal_pengajuan', $bulan)
            ->whereYear('tanggal_pengajuan', $tahun)
            ->latest('tanggal_pengajuan')
            ->get();

        $namaBulan = Carbon::create()->month($bulan)->locale('id')->translatedFormat('F');

        return view('laporan.laporan-pengajuan', compact('data', 'bulan', 'tahun', 'namaBulan'));
    }
    // Pemeliharaan
    public function pemeliharaan(Request $request)
    {
        $bulan = (int) $request->input('bulan', now()->month);
        $tahun = (int) $request->input('tahun', now()->year);

        $data = PemeliharaanBarang::with(['barang.dataBarang', 'penanggungjawab'])
            ->whereMonth('tanggal_pemeliharaan', $bulan)
            ->whereYear('tanggal_pemeliharaan', $tahun)
            ->latest('tanggal_pemeliharaan')
            ->get();

        $namaBulan = Carbon::create()->month($bulan)->translatedFormat('F');

        return view('laporan.laporan-pemeliharaan', [
            'data' => $data,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'namaBulan' => $namaBulan,
            'jenis' => 'pemeliharaan'
        ]);
    }

    // Cetak Peminjaman Barang
    public function cetakPeminjaman(Request $request)
    {
        $bulan = str_pad($request->bulan, 2, '0', STR_PAD_LEFT);
        $tahun = $request->tahun;

        $namaBulanList = [
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember'
        ];

        $namaBulan = $namaBulanList[$bulan] ?? '-';
        $data = PeminjamanBarang::with(['detail.barang.dataBarang'])
            ->whereMonth('tanggal_peminjaman', $bulan)
            ->whereYear('tanggal_peminjaman', $tahun)
            ->latest('tanggal_peminjaman')
            ->get();

        $pdf = Pdf::loadView('pdf.pdf-peminjaman', [
            'data'      => $data,
            'namaBulan' => $namaBulan,
            'tahun'     => $tahun
        ]);

        $namaFile = 'laporan-peminjaman-' . strtolower($namaBulan) . '-' . $tahun . '-Inventaris-Smk Negeri 1 Kota Bekasi.pdf';

        return $pdf->setPaper('a4', 'potrait')->stream($namaFile);
    }
    // Cetak Pemeliharaan Barang
    public function cetakPemeliharaan(Request $request)
    {
        $bulan = str_pad($request->bulan, 2, '0', STR_PAD_LEFT);
        $tahun = $request->tahun;

        $namaBulanList = [
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember'
        ];

        $namaBulan = $namaBulanList[$bulan] ?? '-';
        $data = PemeliharaanBarang::with(['barang.dataBarang', 'penanggungjawab'])
            ->whereMonth('tanggal_pemeliharaan', $bulan)
            ->whereYear('tanggal_pemeliharaan', $tahun)
            ->latest('tanggal_pemeliharaan')
            ->get();

        $pdf = Pdf::loadView('pdf.pdf-pemeliharaan', [
            'data'      => $data,
            'namaBulan' => $namaBulan,
            'tahun'     => $tahun
        ]);

        $namaFile = 'laporan-pemeliharaan-' . strtolower($namaBulan) . '-' . $tahun . '-inventaris-satoe.pdf';
        return $pdf->setPaper('a4', 'portrait')->stream($namaFile);
    }
    // Cetak Pengajuan Barang
    public function cetakPengajuan($bulan, $tahun)
    {
        $bulan = str_pad($bulan, 2, '0', STR_PAD_LEFT);

        $namaBulanList = [
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember'
        ];

        $namaBulan = $namaBulanList[$bulan] ?? '-';

        $data = PengajuanBarang::whereMonth('tanggal_pengajuan', $bulan)
            ->whereYear('tanggal_pengajuan', $tahun)
            ->latest('tanggal_pengajuan')
            ->get();

        $pdf = Pdf::loadView('pdf.pdf-pengajuan', [
            'data'      => $data,
            'namaBulan' => $namaBulan,
            'tahun'     => $tahun
        ]);

        $namaFile = 'laporan-pengajuan-' . strtolower($namaBulan) . '-' . $tahun . '.pdf';

        return $pdf->setPaper('a4', 'portrait')->stream($namaFile);
    }
}

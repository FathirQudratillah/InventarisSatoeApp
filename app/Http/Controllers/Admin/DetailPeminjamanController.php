<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\DetailPeminjaman;


class DetailPeminjamanController extends Controller
{
    public function index()
    {
        $detailPeminjamans = DetailPeminjaman::with(['barang:kode_barang,jenis_barang','barang.jenis:jenis_barang,nama_barang'])->get();
        return view('detail-peminjaman.index', compact('detailPeminjamans'));
    }

    
}

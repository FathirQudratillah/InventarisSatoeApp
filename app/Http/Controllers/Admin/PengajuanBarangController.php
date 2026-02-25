<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\DataJenisBarang;
use App\Models\DataRuang;
use App\Models\PengajuanBarang;
use Illuminate\Http\Request;

class PengajuanBarangController extends Controller
{
    public function index()
    {
        $pengajuanBarangs = PengajuanBarang::All();
        return view('pengajuan-barang.index', compact('pengajuanBarangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenis_barang = DataJenisBarang::all();
        $id_ruang = DataRuang::all();

        return view('pengajuan-barang.create', compact('jenis_barang', 'id_ruang'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $akun = new PengajuanBarang;
            $akun->id_pengajuan = $request->id_pengajuan;
            $akun->user_id = $request->user_id;
            $akun->nama_barang = $request->nama_barang;
            $akun->status_pengajuan = $request->status_pengajuan;
            $akun->tanggal_pengajuan = $request->tanggal_pengajuan;
            $akun->jumlah_pengajuan = $request->jumlah_pengajuan;
            $akun->save();

            return redirect()->route('data-pengajuan-barang.index')->with('success', 'Pengajuan barang berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan pengajuan barang!')->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pengajuan = PengajuanBarang::findOrFail($id);
        $jenis_barang = DataJenisBarang::all();
        $id_ruang = DataRuang::all();
        return view('pengajuan-barang.edit', compact('pengajuan', 'jenis_barang', 'id_ruang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $akun = PengajuanBarang::findOrFail($id);

            $akun->id_pengajuan = $request->id_pengajuan;
            $akun->user_id = $request->user_id;
            $akun->nama_barang = $request->nama_barang;
            $akun->status_pengajuan = $request->status_pengajuan;
            $akun->tanggal_pengajuan = $request->tanggal_pengajuan;
            $akun->jumlah_pengajuan = $request->jumlah_pengajuan;
            $akun->save();

            return redirect()->route('data-pengajuan-barang.index')->with('success', 'Pengajuan barang berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui pengajuan barang!')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $akun = PengajuanBarang::findOrFail($id);
            $akun->delete();
            return redirect()->route('data-pengajuan-barang.index')->with('success', 'Pengajuan barang berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus pengajuan barang!');
        }
    }
}

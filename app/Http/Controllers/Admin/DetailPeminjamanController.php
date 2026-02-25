<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\DetailPeminjaman;
use Illuminate\Http\Request;

class DetailPeminjamanController extends Controller
{
    public function index()
    {
        $detailPeminjamans = DetailPeminjaman::All();
        return view('detail-peminjaman.index', compact('detailPeminjamans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('detail-peminjaman.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $akun = new DetailPeminjaman;
            $akun->id_detail = $request->id_detail;
            $akun->kode_barang = $request->kode_barang;
            $akun->id_peminjaman = $request->id_peminjaman;
            $akun->save();

            return redirect()->route('data-detail-peminjaman.index')->with('success', 'Detail peminjaman berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan detail peminjaman!')->withInput();
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
        $detail = DetailPeminjaman::findOrFail($id);
        return view('detail-peminjaman.edit', compact('detail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $akun = DetailPeminjaman::findOrFail($id);

            $akun->id_detail = $request->id_detail;
            $akun->kode_barang = $request->kode_barang;
            $akun->id_peminjaman = $request->id_peminjaman;
            $akun->save();

            return redirect()->route('data-detail-peminjaman.index')->with('success', 'Detail peminjaman berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui detail peminjaman!')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $akun = DetailPeminjaman::findOrFail($id);
            $akun->delete();
            return redirect()->route('data-detail-peminjaman.index')->with('success', 'Detail peminjaman berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus detail peminjaman!');
        }
    }
}

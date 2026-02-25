<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataBarang;
use App\Models\DataPenanggungJawab;
use App\Models\PemeliharaanBarang;
use Illuminate\Http\Request;

class PemeliharaanBarangController extends Controller
{
    public function index()
    {
        $pemeliharaanBarangs = PemeliharaanBarang::All();
        return view('pemeliharaan-barang.index', compact('pemeliharaanBarangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $id_pj = DataPenanggungJawab::all();
        $kode_barang = DataBarang::All();
        return view('pemeliharaan-barang.create', compact('kode_barang', 'id_pj'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $lastPemeliharaan = PemeliharaanBarang::where('kode_barang', $request->kode_barang)
                ->orderBy('id_pemeliharaan', 'desc')
                ->first();

            if ($lastPemeliharaan) {
                // Ambil angka terakhir
                $lastNumber = (int) substr($lastPemeliharaan->id_pemeliharaan, -2);
                $newNumber = str_pad($lastNumber + 1, 2, '0', STR_PAD_LEFT);
            } else {
                $newNumber = '01';
            }


            $pemeliharaan = new PemeliharaanBarang;
            $pemeliharaan->id_pemeliharaan = 'PMH-' . $request->kode_barang . '-' . $newNumber;
            $pemeliharaan->kode_barang = $request->kode_barang;
            $pemeliharaan->id_pj = $request->id_pj;
            $pemeliharaan->kegiatan_pemeliharaan = $request->kegiatan_pemeliharaan;
            $pemeliharaan->tanggal_pemeliharaan = $request->tanggal_pemeliharaan;
            $pemeliharaan->keterangan = $request->keterangan;
            $pemeliharaan->save();

            return redirect()->route('dashboard.admin')->with('success', 'Data pemeliharaan barang berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan data pemeliharaan barang!')->withInput();
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
        $pemeliharaan = PemeliharaanBarang::findOrFail($id);
        $id_pj = DataPenanggungJawab::all();
        $kode_barang = DataBarang::All();
        return view('pemeliharaan-barang.edit', compact('pemeliharaan', 'kode_barang', 'id_pj'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $pemeliharaan = PemeliharaanBarang::findOrFail($id);

            $pemeliharaan->kode_barang = $request->kode_barang;
            $pemeliharaan->id_pj = $request->id_pj;
            $pemeliharaan->kegiatan_pemeliharaan = $request->kegiatan_pemeliharaan;
            $pemeliharaan->tanggal_pemeliharaan = $request->tanggal_pemeliharaan;
            $pemeliharaan->keterangan = $request->keterangan;
            $pemeliharaan->save();

            return redirect()->route('dashboard.admin')->with('success', 'Data pemeliharaan barang berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui data pemeliharaan barang!')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $pemeliharaan = PemeliharaanBarang::findOrFail($id);
            $pemeliharaan->delete();
            return redirect()->route('dashboard.admin')->with('success', 'Data pemeliharaan barang berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus data pemeliharaan barang!');
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\DataJenisBarang;
use Illuminate\Http\Request;
use App\Models\DataKategoriBarang;

class DataJenisBarangController extends Controller
{
    public function index()
    {
        $jenisBarangs = DataJenisBarang::All();
        return view('data-jenis-barang.index', compact('jenisBarangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenis_barang = DataJenisBarang::All();
        $id_kategori = DataKategoriBarang::All();
        return view('data-jenis-barang.create', compact('jenis_barang', 'id_kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $jenis_barang = new DataJenisBarang;
            $jenis_barang->jenis_barang = $request->jenis_barang;
            $jenis_barang->id_kategori = $request->id_kategori;
            $jenis_barang->nama_barang = $request->nama_barang;
            $jenis_barang->sumber = $request->sumber;
            $jenis_barang->spesifikasi = $request->spesifikasi;
            $jenis_barang->keterangan = $request->keterangan;
            $jenis_barang->save();

            return redirect()->route('data-jenis-barang.index')->with('success', 'Data jenis barang berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan data jenis barang!')->withInput();
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
    public function edit(string $jenis_barang)
    {
        $jenis_barang = DataJenisBarang::findOrFail($jenis_barang);
        $id_kategori = DataKategoriBarang::All();
        return view('data-jenis-barang.edit', compact('jenis_barang', 'id_kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $jenis_barang = DataJenisBarang::findOrFail($id);

            $request->validate([
                'nama_barang' => 'required',
                'sumber' => 'required',
                'spesifikasi' => 'required',
                'keterangan' => 'required',
            ]);

            $jenis_barang->nama_barang = $request->nama_barang;
            $jenis_barang->sumber = $request->sumber;
            $jenis_barang->spesifikasi = $request->spesifikasi;
            $jenis_barang->keterangan = $request->keterangan;
            $jenis_barang->save();

            return redirect()->route('data-jenis-barang.index')->with('success', 'Data jenis barang berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui data jenis barang!')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $jenis_barang)
    {
        try {
            $jenis_barang = DataJenisBarang::findOrFail($jenis_barang);
            $jenis_barang->delete();
            return redirect()->route('data-jenis-barang.index')->with('success', 'Data jenis barang berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus data jenis barang!');
        }
    }
}

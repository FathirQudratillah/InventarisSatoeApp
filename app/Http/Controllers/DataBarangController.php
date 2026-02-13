<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use Illuminate\Http\Request;

class DataBarangController extends Controller
{
    public function index()
    {
        $barangs = DataBarang::All();
        return view('data-barang.index', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('data-barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $akun = new DataBarang;
        $akun->kode_barang = $request->kode_barang;
        $akun->id_ruang = $request->id_ruang;
        $akun->jenis_barang = $request->jenis_barang;
        $akun->kondisi_barang = $request->kondisi_barang;
        $akun->tahun_perolehan = $request->tahun_perolehan;
        $akun->keterangan = $request->keterangan;
        $akun->save();
        return redirect()->route('data-barang.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

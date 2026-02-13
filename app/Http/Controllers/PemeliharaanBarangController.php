<?php

namespace App\Http\Controllers;

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
        return view('pemeliharaan-barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $akun = new PemeliharaanBarang;
        $akun->id_pemeliiharaan = $request->id_pemeliharaan;
        $akun->kode_barang = $request->kode_barang;
        $akun->id_pj = $request->id_pj;
        $akun->save();
        return redirect()->route('data-pemeliharaanbarang.index');
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

<?php

namespace App\Http\Controllers;

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
        $akun = new DetailPeminjaman;
        $akun->id_detail = $request->id_detail;
        $akun->kode_barang = $request->kode_barang;
        $akun->id_peminjaman = $request->id_peminjaman;
        $akun->save();
        return redirect()->route('data-detail-peminjaman.index');
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

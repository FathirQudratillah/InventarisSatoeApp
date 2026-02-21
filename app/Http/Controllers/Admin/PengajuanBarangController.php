<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

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
        return view('pengajuan-barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $akun = new PengajuanBarang;
        $akun->id_pengajuan = $request->id_pengajuan;
        $akun->user_id = $request->user_id;
        $akun->nama_barang = $request->nama_barang;
        $akun->status_pengajuan = $request->status_pengajuan;
        $akun->tanggal_pengajuan = $request->tanggal_pengajuan;
        $akun->jumlah_pengajuan = $request->jumlah_pengajuan;
        $akun->save();
        return redirect()->route('data-pengajuan-barang.index');
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

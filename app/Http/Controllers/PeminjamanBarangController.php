<?php

namespace App\Http\Controllers;

use App\Models\PeminjamanBarang;
use Illuminate\Http\Request;

class PeminjamanBarangController extends Controller
{
   public function index()
    {
        $peminjamanBarangs = PeminjamanBarang::All();
        return view('peminjaman-barang.index', compact('peminjamanBarangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('peminjaman-barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $akun = new PeminjamanBarang;
        $akun->id_peminjaman = $request->id_peminjaman;
        $akun->user_id = $request->user_id;
        $akun->data_admin = $request->data_admin;
        $akun->save();
        return redirect()->route('data-peminjaman-barang.index');
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

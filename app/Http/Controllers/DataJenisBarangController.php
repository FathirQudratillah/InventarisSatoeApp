<?php

namespace App\Http\Controllers;

use App\Models\DataJenisBarang;
use Illuminate\Http\Request;

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
        return view('data-jenis-barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $akun = new DataJenisBarang;
        $akun->jenis_barang = $request->jenis_barang;
        $akun->id_kategori = $request->id_kategori;
        $akun->nama_barang = $request->nama_barang;
        $akun->save();
        return redirect()->route('data-jenisbarang.index');
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

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
        $datas = DataBarang::All();
        return view('data-barang.create', compact('datas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        

        $jenis = strtoupper($request->jenis_barang);

        // Ambil kode terakhir berdasarkan jenis
        $lastBarang = DataBarang::where('kode_barang', 'like', $jenis . '-%')
            ->orderBy('kode_barang', 'desc')
            ->first();

        if ($lastBarang) {
            // Ambil angka terakhir
            $lastNumber = (int) substr($lastBarang->kode_barang, -2);
            $newNumber = str_pad($lastNumber + 1, 2, '0', STR_PAD_LEFT);
        } else {
            $newNumber = '01';
        }

        $kodeBarang = $jenis . '-' . $newNumber;

        
        $akun = new DataBarang;
        $akun->kode_barang = $kodeBarang;
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

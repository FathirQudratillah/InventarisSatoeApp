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
        return redirect()->route('dashboard');
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

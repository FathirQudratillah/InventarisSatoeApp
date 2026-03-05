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
        $request->validate([
            'kode_barang' => ['required', 'exists:data_barang,kode_barang'],
            'id_pj' => ['required', 'exists:data_penanggung_jawab,id_pj'],
            'kegiatan_pemeliharaan' => ['required', 'string', 'max:255'],
            'tanggal_pemeliharaan' => ['required', 'date', 'before_or_equal:today'],
            'keterangan' => ['nullable', 'string'],
        ], [
            'kode_barang.required' => 'Barang wajib dipilih.',
            'kode_barang.exists' => 'Kode barang tidak ditemukan.',
            'id_pj.required' => 'Penanggung jawab wajib dipilih.',
            'id_pj.exists' => 'Penanggung jawab tidak valid.',
            'kegiatan_pemeliharaan.required' => 'Kegiatan pemeliharaan wajib diisi.',
            'tanggal_pemeliharaan.required' => 'Tanggal pemeliharaan wajib diisi.',
            'tanggal_pemeliharaan.date' => 'Format tanggal tidak valid.',
            'tanggal_pemeliharaan.before_or_equal' => 'Tanggal Harus Hari Ini Atau Sebelum Hari Ini.',
            
        ]);

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

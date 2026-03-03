<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataBarang;
use App\Models\DataPenanggungJawab;
use App\Models\PemeliharaanBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PemeliharaanBarangController extends Controller
{
    public function index()
    {
        $pemeliharaanBarangs = PemeliharaanBarang::with(['barang', 'penanggungjawab'])
            ->orderBy('tanggal_pemeliharaan', 'desc')
            ->get();

        return view('pemeliharaan-barang.index', compact('pemeliharaanBarangs'));
    }

    public function create()
    {
        $barang = DataBarang::orderBy('kode_barang')->get();
        $penanggungJawab = DataPenanggungJawab::orderBy('nama')->get();

        return view('pemeliharaan-barang.create', compact('barang', 'penanggungJawab'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|exists:data_barang,kode_barang',
            'id_pj' => 'required|exists:data_penanggung_jawab,id_pj',
            'kegiatan_pemeliharaan' => 'required|string',
            'tanggal_pemeliharaan' => 'required|date',
            'keterangan' => 'nullable|string'
        ]);

        DB::beginTransaction();

        try {

            // Ambil pemeliharaan terakhir berdasarkan kode barang
            $last = PemeliharaanBarang::where('kode_barang', $request->kode_barang)
                ->orderBy('id_pemeliharaan', 'desc')
                ->first();

            if ($last) {
                $parts = explode('-', $last->id_pemeliharaan);
                $lastNumber = (int) end($parts);
                $newNumber = $lastNumber + 1;
            } else {
                $newNumber = 1;
            }

            $formattedNumber = str_pad($newNumber, 3, '0', STR_PAD_LEFT);

            PemeliharaanBarang::create([
                'id_pemeliharaan' => 'PMH-' . $request->kode_barang . '-' . $formattedNumber,
                'kode_barang' => $request->kode_barang,
                'id_pj' => $request->id_pj,
                'kegiatan_pemeliharaan' => $request->kegiatan_pemeliharaan,
                'tanggal_pemeliharaan' => $request->tanggal_pemeliharaan,
                'keterangan' => $request->keterangan,
            ]);

            DB::commit();

            return redirect()->route('dashboard.admin')
                ->with('success', 'Data pemeliharaan berhasil ditambahkan.');
        } catch (\Exception $e) {

            DB::rollBack();

            return back()
                ->with('error', 'Terjadi kesalahan saat menyimpan data.')
                ->withInput();
        }
    }

    public function edit($id)
    {
        $pemeliharaan = PemeliharaanBarang::findOrFail($id);
        $barang = DataBarang::orderBy('kode_barang')->get();
        $penanggungJawab = DataPenanggungJawab::orderBy('nama')->get();

        return view('pemeliharaan-barang.edit', compact('pemeliharaan', 'barang', 'penanggungJawab'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_barang' => 'required|exists:data_barang,kode_barang',
            'id_pj' => 'required|exists:data_penanggung_jawab,id_pj',
            'kegiatan_pemeliharaan' => 'required|string',
            'tanggal_pemeliharaan' => 'required|date',
            'keterangan' => 'nullable|string'
        ]);

        try {

            $pemeliharaan = PemeliharaanBarang::findOrFail($id);

            $pemeliharaan->update([
                'kode_barang' => $request->kode_barang,
                'id_pj' => $request->id_pj,
                'kegiatan_pemeliharaan' => $request->kegiatan_pemeliharaan,
                'tanggal_pemeliharaan' => $request->tanggal_pemeliharaan,
                'keterangan' => $request->keterangan,
            ]);

            return redirect()->route('dashboard.admin')
                ->with('success', 'Data pemeliharaan berhasil diperbarui.');
        } catch (\Exception $e) {

            return back()
                ->with('error', 'Terjadi kesalahan saat memperbarui data.')
                ->withInput();
        }
    }

    public function destroy($id)
    {
        try {

            $pemeliharaan = PemeliharaanBarang::findOrFail($id);
            $pemeliharaan->delete();

            return redirect()->route('dashboard.admin')
                ->with('success', 'Data pemeliharaan berhasil dihapus.');
        } catch (\Exception $e) {

            return back()
                ->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}

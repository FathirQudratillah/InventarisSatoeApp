<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataBarang;
use App\Models\DetailPeminjaman;

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
        $kode_barangs = DataBarang::all();
        return view('peminjaman-barang.create', compact('kode_barangs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $date = str_replace('-', '', $request->tanggal_peminjaman);
        $prefix = 'PMJ' . $date;
        $kode_barangs = $request->kode_barang;

        // cek barang sedang dipinjam
        foreach ($kode_barangs as $kode_barang) {

            $cek = DetailPeminjaman::where('kode_barang', $kode_barang)
                ->exists();

            if ($cek) {
                return back()->withErrors([
                    'kode_barang' => "Barang $kode_barang masih dipinjam"
                ]);
            }
        }

        // generate id peminjaman
        $lastPeminjaman = PeminjamanBarang::where('id_peminjaman', 'like', $prefix . '%')
            ->orderBy('id_peminjaman', 'desc')
            ->first();

        $newNumberPMJ = $lastPeminjaman
            ? str_pad(((int) substr($lastPeminjaman->id_peminjaman, -2)) + 1, 2, '0', STR_PAD_LEFT)
            : '01';

        $id_peminjaman = $prefix . $newNumberPMJ;

        // simpan peminjaman
        $peminjaman = PeminjamanBarang::create([
            'id_peminjaman' => $id_peminjaman,
            'user_id' => auth()->user()->user_id,
            'status_peminjaman' => 'Pending',
            'tanggal_peminjaman' => $request->tanggal_peminjaman,
            'tanggal_pengembalian' => $request->tanggal_pengembalian,
        ]);

        $no = 1;

        foreach ($kode_barangs as $kode_barang) {

            $barang = DataBarang::findOrFail($kode_barang);

            $id_detail = 'DTL' . $id_peminjaman . str_pad($no, 2, '0', STR_PAD_LEFT);

            $peminjaman->detail()->create([
                'id_detail' => $id_detail,
                'kode_barang' => $kode_barang,
                'kondisi_sebelum' => $barang->kondisi_barang,
            ]);

            $no++;
        }

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function accept(string $id)
    {
        $peminjaman = PeminjamanBarang::findOrFail($id);
        $peminjaman->data_admin = auth()->user()->user_id;
        $peminjaman->status_peminjaman = 'Dipinjam';
        $peminjaman->save();

        return back();
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
    public function update(string $id)
    {
        $peminjaman = PeminjamanBarang::findOrFail($id);
        $peminjaman->status_peminjaman = 'Dipinjam';
        $peminjaman->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function add($kode)
    {
        $barang = DataBarang::findOrFail($kode);

        $cart = session()->get('cart', []);

        if (isset($cart[$kode])) {
            $cart[$kode]['qty']++;
        } else {
            $cart[$kode] = [
                'nama' => $barang->dataBarang->nama_barang,
                'qty' => 1
            ];
        }

        session()->put('cart', $cart);

        return back();
    }

    public function remove($kode)
    {
        $barang = DataBarang::findOrFail($kode);

        $cart = session()->get('cart', []);

        if (isset($cart[$kode])) {
            $cart[$kode]['qty']--;
            if ($cart[$kode]['qty'] <= 0) {
                unset($cart[$kode]);
            }
            session()->put('cart', $cart);
        }


        return back();
    }
}

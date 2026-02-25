<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\DataAngkatan;
use Illuminate\Http\Request;

class DataAngkatanController extends Controller
{
    public function index()
    {
        $angkatans = DataAngkatan::All();
        return view('data-angkatan.index', compact('angkatans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('data-angkatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $angkatan = new DataAngkatan;
            $angkatan->angkatan = $request->angkatan;
            $angkatan->tahun_masuk = $request->tahun_masuk;
            $angkatan->tahun_lulus = $request->tahun_lulus;
            $angkatan->save();

            return redirect()->route('data-angkatan.index')->with('success', 'Data angkatan berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan data!')->withInput();
        }
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
    public function edit(string $angkatan)
    {
        $angkatan = DataAngkatan::findOrFail($angkatan);
        return view('data-angkatan.edit', compact('angkatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $angkatan = DataAngkatan::findOrFail($id);

            $request->validate([
                'angkatan' => 'required',
                'tahun_masuk' => 'required',
                'tahun_lulus' => 'required',
            ]);

            $angkatan->angkatan = $request->angkatan;
            $angkatan->tahun_masuk = $request->tahun_masuk;
            $angkatan->tahun_lulus = $request->tahun_lulus;
            $angkatan->save();

            return redirect()->route('data-angkatan.index')->with('success', 'Data angkatan berhasil diperbarui!');
        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'Gagal memperbarui data!')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $angkatan)
    {
        try {
            $angkatan = DataAngkatan::findOrFail($angkatan);
            $angkatan->delete();

            return redirect()->route('data-angkatan.index')->with('success', 'Data angkatan berhasil dihapus!');
        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'Gagal menghapus data!');
        }
    }
}

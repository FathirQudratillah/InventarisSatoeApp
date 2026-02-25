<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\DataJurusan;
use Illuminate\Http\Request;

class DataJurusanController extends Controller
{
    public function index()
    {
        $jurusans = DataJurusan::All();
        return view('data-jurusan.index', compact('jurusans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('data-jurusan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $jurusan = new DataJurusan;
            $jurusan->id_jurusan = $request->id_jurusan;
            $jurusan->jurusan = $request->jurusan;
            $jurusan->save();

            return redirect()->route('data-jurusan.index')->with('success', 'Data jurusan berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan data jurusan!')->withInput();
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
    public function edit(string $id_jurusan)
    {
        $jurusan = DataJurusan::findOrFail($id_jurusan);
        return view('data-jurusan.edit', compact('jurusan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $jurusan = DataJurusan::findOrFail($id);

            $request->validate([
                'id_jurusan' => 'required',
                'jurusan' => 'required',
            ]);

            $jurusan->id_jurusan = $request->id_jurusan;
            $jurusan->jurusan = $request->jurusan;
            $jurusan->save();

            return redirect()->route('data-jurusan.index')->with('success', 'Data jurusan berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui data jurusan!')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_jurusan)
    {
        try {
            $jurusan = DataJurusan::findOrFail($id_jurusan);
            $jurusan->delete();
            return redirect()->route('data-jurusan.index')->with('success', 'Data jurusan berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus data jurusan!');
        }
    }
}

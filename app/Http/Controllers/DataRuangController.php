<?php

namespace App\Http\Controllers;

use App\Models\DataRuang;
use Illuminate\Http\Request;


class DataRuangController extends Controller
{
    public function index()
    {
        $ruangs = DataRuang::All();
        return view('data-ruang.index', compact('ruangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('data-ruang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ruang = new DataRuang;
        $ruang->id_ruang = $request->id_ruang;
        $ruang->nama_ruang = $request->nama_ruang;
        $ruang->jenis_ruang = $request->jenis_ruang;
        $ruang->kapasitas = $request->kapasitas;
        $ruang->lokasi = $request->lokasi;
        $ruang->save();
        return redirect()->route('data-ruang.index');
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
    public function edit(string $id_ruang)
    {
        $ruang = DataRuang::findOrFail($id_ruang);
        return view('data-ruang.edit', compact('ruang'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ruang = DataRuang::findOrFail($id);

        $request->validate([
            'id_ruang' => 'required',
            'nama_ruang' => 'required',
            'jenis_ruang' => 'required',
            'kapasitas' => 'required',
            'lokasi' => 'required',
        ]);
        $ruang->id_ruang = $request->id_ruang;
        $ruang->nama_ruang = $request->nama_ruang;
        $ruang->jenis_ruang = $request->jenis_ruang;
        $ruang->kapasitas = $request->kapasitas;
        $ruang->lokasi = $request->lokasi;
        $ruang->save();
        return redirect()->route('data-ruang.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_ruang)
    {
        $ruang = DataRuang::findOrFail($id_ruang);
        $ruang->delete();
        return Redirect()->route('data-ruang.index');
    }
}

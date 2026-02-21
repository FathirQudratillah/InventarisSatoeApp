<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\DataPenanggungJawab;
use Illuminate\Http\Request;

class DataPenanggungJawabController extends Controller
{
    public function index()
    {
        $penanggungJawabs = DataPenanggungJawab::All();
        return view('data-penanggung-jawab.index', compact('penanggungJawabs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('data-penanggung-jawab.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $penanggung_jawab= new DataPenanggungJawab;
        $penanggung_jawab->id_pj = $request->id_pj;
        $penanggung_jawab->nama = $request->nama;
        $penanggung_jawab->nama_perusahaan = $request->nama_perusahaan;
        $penanggung_jawab->alamat_perusahaan = $request->alamat_perusahaan;
        $penanggung_jawab->no_kontak = $request->no_kontak;
        $penanggung_jawab->save();
        return redirect()->route('data-penanggung-jawab.index');

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
    public function edit(string $id_pj)
    {
        $penanggung_jawab = DataPenanggungJawab::findOrFail($id_pj);
        return view('data-penanggung-jawab.edit', compact('penanggung_jawab'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $penanggung_jawab = DataPenanggungJawab::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'nama_perusahaan' => 'required',
            'alamat_perusahaan' => 'required',
            'no_kontak' => 'required',
            
            
        ]);
        $penanggung_jawab->nama = $request->nama;
        $penanggung_jawab->nama_perusahaan = $request->nama_perusahaan;
        $penanggung_jawab->alamat_perusahaan = $request->alamat_perusahaan;
        $penanggung_jawab->no_kontak = $request->no_kontak;
        $penanggung_jawab->save();
        return redirect()->route('data-penanggung-jawab.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_pj)
    {
        $penanggung_jawab = DataPenanggungJawab::findOrFail($id_pj);
        $penanggung_jawab->delete();
        return Redirect()->route('data-penanggung-jawab.index');
    }
}

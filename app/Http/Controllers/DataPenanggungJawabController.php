<?php

namespace App\Http\Controllers;

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
        $akun= new DataPenanggungJawab;
        $akun->id_pj = $request->id_pj;
        $akun->nama = $request->nama;
        $akun->nama_perusahaan = $request->nama_perusahaan;
        $akun->alamat_perusahaan = $request->alamat_perusahaan;
        $akun->no_kontak = $request->no_kontak;
        $akun->save();
        return redirect()->route('data-penanggungjawab-index');

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

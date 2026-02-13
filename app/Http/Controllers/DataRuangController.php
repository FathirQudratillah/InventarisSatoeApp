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
        $akun = new DataRuang;
        $akun->id_ruang = $request->id_ruang;
        $akun->nama_ruang = $request->nama_ruang;
        $akun->jenis_ruang = $request->jenis_ruang;
        $akun->kapasitas = $request->kapasitas;
        $akun->lokasi = $request->lokasi;
        $akun->save();
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

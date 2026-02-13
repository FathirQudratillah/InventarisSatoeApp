<?php

namespace App\Http\Controllers;

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
        $akun = new DataAngkatan;
        $akun->angkatan = $request->angkatan;
        $akun->tahun_masuk = $request->tahun_masuk;
        $akun->tahun_lulus = $request->tahun_lulus;
        $akun->save();
        return redirect('data-angkatan.index');
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

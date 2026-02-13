<?php

namespace App\Http\Controllers;

use App\Models\DataGuru;
use Illuminate\Http\Request;

class DataGuruController extends Controller
{
   public function index()
    {
        $gurus = DataGuru::All();
        return view('data-guru.index', compact('gurus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('data-guru.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $akun = new DataGuru;
        $akun->nip = $request->nip;
        $akun->user_id = $request->user_id;
        $akun->nama = $request->nama;
        $akun->email = $request->email;
        $akun->jenis_kelamin = $request->jenis_kelamin;
        $akun->no_kontak = $request->no_kontak;
        $akun->alamat = $request->alamat;
        $akun->save();
        return redirect()->route('data-guru.index');

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

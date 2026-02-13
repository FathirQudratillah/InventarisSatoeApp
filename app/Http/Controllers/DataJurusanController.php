<?php

namespace App\Http\Controllers;

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
        $akun = new DataJurusan;
        $akun->data_jurusan = $request->data_jurusan;
        $akun->id_jurusan = $request->id_jurusan;
        $akun->jurusan = $request->jurusan;
        $akun->save();
        return redirect()->route('data-jurusan.index');
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

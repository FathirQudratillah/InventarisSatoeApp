<?php

namespace App\Http\Controllers;

use App\Models\DataAngkatan;
use App\Models\DataJurusan;
use App\Models\DataKelas;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class DataKelasController extends Controller
{ 
    public function index()
    {
        $akun = DataKelas::all();
        return view('data-kelas.index', compact('akun'));
    }

    public function create()
    {
        $angkatan = DataAngkatan::all();
        $id_jurusan = DataJurusan::all();
        return view('data-kelas.create', compact('angkatan', 'id_jurusan'));
    }

    public function store(Request $request): RedirectResponse
    {
        $kelas = new DataKelas;

        if ($request->kelas != 'Alumni') {
            $kelas->id_kelas = $request->angkatan . $request->id_jurusan . $request->subkelas;
        } else {
            $kelas->id_kelas = $request->angkatan . $request->id_jurusan;
        }

        $kelas->id_jurusan = $request->id_jurusan;
        $kelas->angkatan = $request->angkatan;
        $kelas->kelas = $request->kelas;
        $kelas->subkelas = $request->subkelas;
        $kelas->save();

        return redirect()->route('data-kelas.index');
    }

    public function edit(string $id_kelas)
    {
        $kelas = DataKelas::findOrFail($id_kelas);
        $angkatan = DataAngkatan::all();
        $id_jurusan = DataJurusan::all();
        return view('data-kelas.edit', compact('kelas', 'angkatan', 'id_jurusan'));
    }

    public function update(Request $request, string $id_kelas): RedirectResponse
    {
        $kelas = DataKelas::findOrFail($id_kelas);

        if ($request->kelas != 'Alumni') {
            $kelas->id_kelas = $request->angkatan . $request->id_jurusan . $request->subkelas;
        } else {
            $kelas->id_kelas = $request->angkatan . $request->id_jurusan;
        }

        $kelas->id_jurusan = $request->id_jurusan;
        $kelas->angkatan = $request->angkatan;
        $kelas->kelas = $request->kelas;
        $kelas->subkelas = $request->subkelas;
        $kelas->save();

        return redirect()->route('data-kelas.index');
    }

    public function destroy(string $id_kelas): RedirectResponse
    {
        $kelas = DataKelas::findOrFail($id_kelas);
        $kelas->delete();

        return redirect()->route('data-kelas.index');
    }
}
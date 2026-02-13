<?php

namespace App\Http\Controllers;

use App\Models\DataKelas;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class DataKelasController extends Controller
{ 
    public function store(Request $request): RedirectResponse{
        $kelas = new DataKelas;
        $kelas->id_kelas = $request->id_kelas;
        $kelas->id_jurusan = $request->id_jurusan;
        $kelas->angkatan = $request->angkatan;
        $kelas->kelas = $request->kelas;
        $kelas->subkelas = $request->subkelas;

        $kelas->save();
        return redirect('/');
    }

    public function index(){
        $akun = DataKelas::All();
        return view('data-kelas.index', compact('akun'));
    }

    public function create()
    {
        return view('data-kelas.create');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\DataAngkatan;
use App\Models\DataJurusan;
use App\Models\DataKelas;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class DataKelasController extends Controller
{ 
    public function store(Request $request): RedirectResponse{
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

    public function index(){
        $akun = DataKelas::All();
        return view('data-kelas.index', compact('akun'));
    }

    public function create()
    {
        $angkatan = DataAngkatan::All();
        $id_jurusan = DataJurusan::All();
        return view('data-kelas.create', compact('id_jurusan', 'angkatan'));
    }
}

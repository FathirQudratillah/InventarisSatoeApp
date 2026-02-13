<?php

namespace App\Http\Controllers;

use App\Models\DataSiswa;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class DataSiswaController extends Controller
{
    public function index(){
        $siswas = DataSiswa::All();
        return view('data-siswa.index', compact('siswas'));
    }

     public function create()
    {
        return view('data-siswa.create');
    }

    public function store(Request $request): RedirectResponse{
        $siswa = new DataSiswa;
        $siswa->nis = $request->nis;
        $siswa->id_kelas = $request->id_kelas;
        $siswa->user_id = $request->user_id;
        $siswa->nama = $request->nama;
        $siswa->email = $request->email;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->no_kontak = $request->no_kontak;
        $siswa->alamat = $request->alamat;
        $siswa->save();
       return redirect()->route('data-siswa.index');
    }

    public function destroy($id){
        $siswa = DataSiswa::find($id);
        $siswa->delete();
        return redirect('/');
    }
}

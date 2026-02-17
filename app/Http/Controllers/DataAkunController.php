<?php

namespace App\Http\Controllers;

use App\Models\DataAkun;
use App\Models\DataKelas;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class DataAkunController extends Controller
{
    public function index()
    {
        $akuns = DataAkun::All();
        return view('data-akun.index', compact('akuns'));
    }

    public function create()
    {
        $id_kelas = DataKelas::All();
        return view('data-akun.create', compact('id_kelas'));
    }


    public function show($id)
    {
        $prefix = substr($id, 0, 2);

        $roles = [
            'SI' => 'siswa',
            'GU' => 'guru',
            'AD' => 'admin',
        ];

        $role = $roles[$prefix] ?? 'admin';

        $akun = DataAkun::with($role)->findOrFail($id);

        return view('data-akun.show', compact('akun', 'role'));
    }


    public function store(Request $request): RedirectResponse
    {
        $role = $request->role;

        // Hitung nomor urut berdasarkan role
        $last = DataAkun::where('role', $role)->count() + 1;

        $kode = str_pad($last, 8, '0', STR_PAD_LEFT);

        // Generate user_id
        if ($role === 'siswa') {
            $user_id = 'SI' . $request->id_kelas . $request->no_absen;
        } else {
            $user_id = 'GU' . $kode;
        }

        $akun = DataAkun::create([
            'user_id' => $user_id,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role' => $role,
        ]);

        // Simpan detail berdasarkan role
        if ($role === 'siswa') {

            $akun->siswa()->create([
                'user_id' => $akun->user_id,
                'nis' => $request->nis,
                'id_kelas' => $request->id_kelas,
                'no_absen' => $request->no_absen,
                'nama' => $request->nama,
                'email' => $request->email,
                'jenis_kelamin' => $request->jenis_kelamin,
                'no_kontak' => $request->no_kontak,
                'alamat' => $request->alamat,
            ]);
        } elseif ($role === 'guru') {

            $akun->guru()->create([
                'user_id' => $akun->user_id,
                'nip' => $request->nip,
                'nama' => $request->nama,
                'email' => $request->email,
                'jenis_kelamin' => $request->jenis_kelamin,
                'no_kontak' => $request->no_kontak,
                'alamat' => $request->alamat,
            ]);
        }

        return redirect()->route('data-akun.index');
    }



    public function destroy($user_id)
    {
        $akun = DataAkun::findOrFail($user_id);
        $akun->delete();
        return redirect()->route('data-akun.index');
    }

    public function edit(string $user_id)
    {
        $akun = DataAkun::findOrFail($user_id);
        return view('data-akun.edit', compact('akun'));
    }
}

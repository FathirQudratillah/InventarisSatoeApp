<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\DataAkun;
use App\Models\DataAngkatan;
use App\Models\DataJurusan;
use App\Models\DataKelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $angkatan = DataAngkatan::all();
        $jurusan = DataJurusan::all();
        return view('signup.index', compact('angkatan', 'jurusan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $role = $request->role;

        // Hitung nomor urut berdasarkan role
        $lastUser = DataAkun::where('role', $role)
            ->orderBy('user_id', 'desc')
            ->first();

        $lastNumber = $lastUser ? (int) substr($lastUser->user_id, -8) : 0;

        $kode = str_pad($lastNumber + 1, 8, '0', STR_PAD_LEFT);




        DB::transaction(function () use ($request, $role, $kode) {
            // Generate user_id
            if ($role === 'siswa') {
                $kelas = $request->angkatan . $request->id_jurusan . $request->subkelas;
                $checkKelas = DataKelas::findOrFail($kelas);
                $no_absen = str_pad($request->no_absen, 2, '0', STR_PAD_LEFT);
                $user_id = 'SI' . $checkKelas->id_kelas . $no_absen;
            } else {
                $user_id = 'GU' . $kode;
            }


            $akun = DataAkun::create([
                'user_id' => $user_id,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'role' => $role,
            ]);

            // Simpan detail berdasarkan role
            if ($role === 'siswa') {



                $akun->siswa()->create([
                    'user_id' => $akun->user_id,
                    'nis' => $request->nis,
                    'id_kelas' => $checkKelas->id_kelas,
                    'no_absen' => $no_absen,
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
        });

        return redirect()->route('login');
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

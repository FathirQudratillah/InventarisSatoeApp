<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataAkun;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\RedirectResponse;

class DataAkunController extends Controller
{
    public function index(){
        $akun = DataAkun::All();
        return view('data-akun.index', compact('akun'));
    }

    public function show($id)
    {
        //
    }

    public function store(Request $request): RedirectResponse {
        $akun = new DataAkun;
        $akun->user_id = $request->user_id;
        $akun->username = $request->username;
        $akun->password = $request->password;
        $akun->save();
        return redirect('/');
    }

    public function destroy($id){
        $siswa = DataAkun::find($id);
        $siswa->delete();
        return redirect('/');
    }
}

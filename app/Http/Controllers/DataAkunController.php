<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataAkun;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\RedirectResponse;

class DataAkunController extends Controller
{
    public function index(){
        $akuns = DataAkun::All();
        return view('data-akun.index', compact('akuns'));
    }

    public function create()
    {
        return view('data-akun.create');
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
        return redirect()->route('data-akun.index');
    }

    public function destroy($user_id){
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

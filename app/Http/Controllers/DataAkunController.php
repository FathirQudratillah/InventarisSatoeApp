<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataAkun;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\RedirectResponse;

class DataAkunController extends Controller
{
    public function store(Request $request): RedirectResponse {
        $akun = new DataAkun;
        $akun->user_id = $request->user_id;
        $akun->username = $request->username;
        $akun->password = $request->password;
        $akun->save();
        return redirect('/');
    }
}

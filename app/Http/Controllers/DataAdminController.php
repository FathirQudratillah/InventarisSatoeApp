<?php

namespace App\Http\Controllers;

use App\Models\DataAdmin;
use Illuminate\Http\Request;

class DataAdminController extends Controller
{
    public function index()
    {
        $admins = DataAdmin::All();
        return view('data-admin.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('data-admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $akun = new DataAdmin;
        $akun->nip = $request->nip;
        $akun->user_id = $request->user_id;
        $akun->nama = $request->nama;
        $akun->email = $request->email;
        $akun->no_kontak = $request->no_kontak;
        $akun->alamat = $request->alamat;
        $akun->save();
        return redirect('data-admin.index');
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

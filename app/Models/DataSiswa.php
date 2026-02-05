<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataSiswa extends Model
{
    protected $table = 'data_siswa';
    protected $primarykey = 'nis';
    public $incrementing = false;

    protected $fillable = ['nis', 'id_kelas', 'user_id', 'nama', 'email', 'jenis_kelamin', 'no_kontak', 'alamat'];
}

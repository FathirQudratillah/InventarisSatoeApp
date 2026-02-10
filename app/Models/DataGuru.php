<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataGuru extends Model
{
    protected $table = 'data_guru';
    protected $fillable = ['nip', 'user_id', 'nama', 'email','jenis_kelamin', 'no_kontak', 'alamat'];
    protected $primaryKey = 'nip';
    public $incrementing = false;
    protected $keyType = 'string';
}

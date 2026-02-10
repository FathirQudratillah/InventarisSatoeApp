<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataAdmin extends Model
{
    protected $table = 'data_admin';
    protected $fillable = ['nip', 'user_id', 'nama', 'email', 'no_kontak', 'alamat'];
    protected $primaryKey = 'nip';
    public $incrementing = false;
    protected $keyType = 'string';
}

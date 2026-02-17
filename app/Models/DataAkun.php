<?php

namespace App\Models;

use App\Models\DataSiswa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataAkun extends Model
{
    use HasFactory;
    protected $table = 'data_akun';
    protected $fillable = ['user_id', 'username', 'password', 'role'];
    protected $primaryKey = 'user_id';
    public $incrementing = false;
    protected $keyType = 'string';

    public function siswa()
    {
        return $this->hasOne(DataSiswa::class, 'user_id', 'user_id');
    }

    public function guru()
    {
        return $this->hasOne(DataGuru::class, 'user_id', 'user_id');
    }

    public function admin()
    {
        return $this->hasOne(DataAdmin::class, 'user_id', 'user_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataRuang extends Model
{
    use HasFactory;
    protected $table = 'data_ruang';
    protected $fillable = ['id_ruang', 
                            'nama_ruang', 
                            'jenis_ruang',
                            'kapasitas',
                            'lokasi',
                           
                            ];

    protected $primaryKey = 'id_ruang';
    public $incrementing = false;
    protected $keyType = 'string';

    public function barang()
    {
        return $this->hasMany(DataBarang::class, 'id_ruang', 'id_ruang');
    }
}

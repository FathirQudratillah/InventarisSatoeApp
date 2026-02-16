<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataJenisBarang extends Model
{
    use HasFactory;
    protected $table = 'data_jenis_barang';
    protected $fillable = ['jenis_barang', 
                           
                            'sumber',
                            'spesifikasi',
                            'keterangan',
                            ];

    protected $primaryKey = 'jenis_barang';
    public $incrementing = false;
    protected $keyType = 'string';
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataJenisBarang extends Model
{
    protected $table = 'data_jenis_barang';
    protected $fillable = ['jenis_barang', 
                            'nama_barang', 
                            'tahun',
                            'sumber',
                            'spesifikasi',
                            'keterangan',
                            ];

    protected $primaryKey = 'jenis_barang';
    public $incrementing = false;
    protected $keyType = 'string';
}

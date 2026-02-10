<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataBarang extends Model
{
    protected $table = 'data_barang';
    protected $fillable = ['kode_barang', 
                            'id_ruang', 
                            'id_kategori',
                            'jenis_barang',
                            'kondisi_barang',
                            'keterangan',
                            ];

    protected $primaryKey = 'kode_barang';
    public $incrementing = false;
    protected $keyType = 'string';
}

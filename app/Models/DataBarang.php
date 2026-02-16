<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataBarang extends Model
{
    use HasFactory;
    protected $table = 'data_barang';
    protected $fillable = ['kode_barang', 
                            'id_ruang', 
                            'id_kategori',
                            'jenis_barang',
                             'nama_barang', 
                            'kondisi_barang',
                            'tahun_perolehan',
                            'keterangan',
                            ];

    protected $primaryKey = 'kode_barang';
    public $incrementing = false;
    protected $keyType = 'string';
}

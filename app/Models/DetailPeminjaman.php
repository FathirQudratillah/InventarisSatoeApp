<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPeminjaman extends Model
{
    protected $table = 'detail_peminjaman';
    protected $fillable = ['id_detail', 
                            'kode_barang', 
                            'id_peminjaman',
                            'kondisi_sebelum',
                            'kondisi_sesudah',
                            
                            ];

    protected $primaryKey = 'id_detail';
    public $incrementing = false;
    protected $keyType = 'string';
}

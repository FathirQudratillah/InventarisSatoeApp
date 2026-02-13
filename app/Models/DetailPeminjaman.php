<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailPeminjaman extends Model
{
    use HasFactory;
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

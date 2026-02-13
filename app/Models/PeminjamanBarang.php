<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PeminjamanBarang extends Model
{
    use HasFactory;
    protected $table = 'peminjaman_barang';
    protected $fillable = ['id_peminjaman', 
                            'user_id', 
                            'data_admin',
                            'status_peminjaman',
                            'tanggal_peminjaman',
                            'tanggal_pengembalian',
                            ];

    protected $primaryKey = 'id_peminjaman';
    public $incrementing = false;
    protected $keyType = 'string';
}

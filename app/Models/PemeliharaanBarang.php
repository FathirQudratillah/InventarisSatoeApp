<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PemeliharaanBarang extends Model
{
    protected $table = 'pemeliharaan_barang';
    protected $fillable = ['id_pemeliharaan', 
                            'id_pj', 
                            'kode_barang',
                            'kegiatan_pemeliharaan',
                            'tanggal_pemeliharaan',
                            'keterangan',
                            ];

    protected $primaryKey = 'id_pemeliharaan';
    public $incrementing = false;
    protected $keyType = 'string';
}

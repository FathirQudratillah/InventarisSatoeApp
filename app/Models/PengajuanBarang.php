<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengajuanBarang extends Model
{
    protected $table = 'pengajuan_barang';
    protected $fillable = ['id_pengajuan', 
                            'user_id', 
                            'nama_barang',
                            'status_pengajuan',
                            'tanggal_pengajuan',
                           
                            ];

    protected $primaryKey = 'id_pengajuan';
    public $incrementing = false;
    protected $keyType = 'string';
}

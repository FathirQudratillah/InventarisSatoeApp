<?php

namespace App\Models;

use App\Models\DataBarang;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataJenisBarang extends Model
{
    use HasFactory;
    protected $table = 'data_jenis_barang';
    protected $fillable = ['jenis_barang', 
                            'nama_barang', 
                            'sumber',
                            'spesifikasi',
                            'keterangan',
                            ];

    protected $primaryKey = 'jenis_barang';
    public $incrementing = false;
    protected $keyType = 'string';

    public function jenisBarang()
    {
        return $this->hasMany(DataBarang::class, 'jenis_barang', 'jenis_barang');
    }
}

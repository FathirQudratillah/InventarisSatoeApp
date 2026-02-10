<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataKategoriBarang extends Model
{
    protected $table = 'data_kategori_barang';
    protected $fillable = ['id_kategori', 
                            'kategori', 
                           
                            ];

    protected $primaryKey = 'id_kategori';
    public $incrementing = false;
    protected $keyType = 'string';
}

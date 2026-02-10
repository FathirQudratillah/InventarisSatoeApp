<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataPenanggungJawab extends Model
{
    protected $table = 'data_penanggung_jawab';
    protected $fillable = ['id_pj', 
                            'nama', 
                            'nama_perusahaan',
                            'alamat',
                            'no_kontak',
                            
                            ];

    protected $primaryKey = 'id_pj';
    public $incrementing = false;
    protected $keyType = 'string';
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataAkun extends Model
{
   
    protected $fillable = ['user_id', 'username', 'password'];
    protected $primaryKey = 'user_id';
    public $incrementing = false;
    protected $keyType = 'string';
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role_akses extends Model
{
    protected $table = "role_akses";        
    protected $primaryKey = "id";
    protected $keyType = 'string';
   // public $timestamps = false;

    protected $fillable = [
        'id',
        'jenis_user'
    ];
}

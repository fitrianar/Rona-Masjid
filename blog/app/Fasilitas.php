<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    protected $table = "fasilitas";        
    protected $primaryKey = "id";
    protected $keyType = 'string';
   // public $timestamps = false;

    protected $fillable = [
        'id',
        'nama',
        'foto',
        'tgl_ditambah',
        'jenis_fasilitas',
        'user_id',
        'masjid_id'
    ];
}

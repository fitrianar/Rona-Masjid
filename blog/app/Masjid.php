<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Masjid extends Model
{
    protected $table = "masjid";        
    protected $primaryKey = "id";
    protected $keyType = 'string';
   // public $timestamps = false;

    protected $fillable = [
        'id',
        'nama_masjid',
        'alamat_masjid',
        'l_tanah',
        'p_tanah',
        'luas_bangunan',
        'lampiran_masjid',
        'status_masjid',
        'deskripsi'
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = "artikel";        
    protected $primaryKey = "id";
    protected $keyType = 'string';
   // public $timestamps = false;

    protected $fillable = [
        'id',
        'judul',
        'gambar',
        'isi',
        'tgl_dibuat',
        'user_id',
        'masjid_id'
    ];


}

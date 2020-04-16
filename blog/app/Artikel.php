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

    public static function artikelTerbaru()
    {
        return Artikel::orderBy('created_at', 'desc')->take(5) ->get(); 
    }


}

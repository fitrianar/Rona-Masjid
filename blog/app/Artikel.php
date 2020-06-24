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
        'slug',
        'gambar',
        'isi',
        'tgl_dibuat',
        'user_id',
        'masjid_id',
        'publikasi',
        'status',
        'trash'
    ];

    public static function artikelTerbaru()
    {
        return Artikel::orderBy('created_at', 'desc')->where('trash', 0)->take(5) ->get(); 
    }


}

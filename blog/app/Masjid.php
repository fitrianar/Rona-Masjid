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
        'gambar',
        'alamat_masjid',
        'l_tanah',
        'p_tanah',
        'luas_bangunan',
        'lampiran_masjid',
        'status_masjid',
        'deskripsi',
        'facebook',
        'instagram',
        'twitter'
    ];

    public function users()
    {
        return $this->hasMany('App\User', 'masjid_id', 'id');
    }

    public function fasilitas()
    {
        return $this->hasMany('App\Fasilitas', 'masjid_id', 'id');
    }

    public function kegiatan()
    {
        return $this->hasMany('App\Kegiatan', 'masjid_id', 'id');
    }
    

    public static function fetchMasjid()
    {

       return  Masjid::Limit(5)->get();
    }
}

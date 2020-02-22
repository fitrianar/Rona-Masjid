<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $table = "kegiatan";        
    protected $primaryKey = "id";
    protected $keyType = 'string';
   // public $timestamps = false;

    protected $fillable = [
        'id',
        'nama',
        'tgl_dilaksanakan',
        'jam_dimulai',
        'jam_akhir',
        'deskripsi_kegiatan',
        'jenis_kegiatan',
        'poster',
        'tgl_dibuat',
        'user_id',
        'masjid_id'
    ];
}

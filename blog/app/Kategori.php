<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = "kategori";        
    protected $primaryKey = "id";
    protected $keyType = 'string';
   // public $timestamps = false;

    protected $fillable = [
        'id',
        'nama'
    ];

    public static function kategoriSidebar()
    {
        return Kategori::orderBy('created_at', 'desc')->take(5)->get(); 
    }
}

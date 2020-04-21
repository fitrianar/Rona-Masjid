<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HubungiKami extends Model
{
    protected $table = "hubungi_kami";        
    protected $primaryKey = "id";
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'name',
        'email',
        'subjek',
        'pesan',
    ];


}

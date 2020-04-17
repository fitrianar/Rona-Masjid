<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berlangganan extends Model
{
    protected $table = "berlangganan";        
    protected $primaryKey = "id";


    protected $fillable = [
        'id',
        'email',     
    ];
}

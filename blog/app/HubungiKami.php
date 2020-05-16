<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use App\Notifications\BalasanHubungiKami;

class HubungiKami extends Model
{

    use Notifiable;
    
    protected $table = "hubungi_kami";        
    protected $primaryKey = "id";
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'name',
        'email',
        'subjek',
        'pesan',
        'status_pesan'
    ];


    public static function balasanHubungiKami($pesan)
    {        
        return $pesan->notify(new BalasanHubungiKami);
    }


}

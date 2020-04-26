<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use App\Notifications\EmailVerification;
use App\Role_akses;
class User extends Authenticatable
{
    use Notifiable;

    protected $table = "users";        
    protected $primaryKey = "id";
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'role_akses_id', 'nama', 'no_ktp', 'email', 'password', 'no_telpon', 'alamat', 'jenis_kelamin', 'email_verified', 'gambar', 'masjid_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function masjids()
    {
        return $this->belongsTo('App\Masjid', 'masjid_id');        
    }


    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }


    public function role()
    {
        return Role_akses::where('id', auth()->user()->role_akses_id)->first();
    }


    public function authorizeRoles($roles)
    {
        if (is_array($roles)) {
        return $this->hasAnyRole($roles) || 
            abort(401, 'This action is unauthorized.');
    }
        return $this->hasRole($roles) || 
            abort(401, 'This action is unauthorized.');
    }
    /**
    * Check multiple roles
    * @param array $roles
    */
    public function hasAnyRole($roles)
    {
        return null !== $this->roles()->whereIn('username', $roles)->first();   
    }
    /**
    * Check one role
    * @param string $role
    */
    public function hasRole($role)
    {
        return null !== $this->roles()->where('username', $role)->first();
    }

    public static function masjid()
    {
        if(auth()->user()->role()->id == 3){ //pengurus == true
           
            return DB::table('masjid')
            ->join('users', 'masjid.id', 'users.masjid_id')
            ->where('users.id', auth()->user()->id)
            ->select(['masjid.id as id',
            'masjid.nama_masjid'
                
            ])
            ->first();
        }

        return 'Admin';


    }



    public static function verifiedEmail($user)
    {        
        return $user->notify(new EmailVerification);
    }

}
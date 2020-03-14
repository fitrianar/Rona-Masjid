<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
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
        'id', 'role_akses_id', 'nama', 'no_ktp', 'email', 'password', 'no_telpon', 'alamat', 'jenis_kelamin', 'email_verified', 'gambar'];

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

    public function masjid()
    {
        if(auth()->user()->role()->id == 3){ //pengurus == true
           
            return DB::table('masjid')
            ->join('user_has_masjids', 'masjid.id', 'user_has_masjids.masjid_id')
            ->where('user_has_masjids.user_id', auth()->user()->id)
            ->first();
        }

        return 'Admin';


    }

}
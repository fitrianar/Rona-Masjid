<?php

use Illuminate\Database\Seeder;
use App\Role_akses;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = Array('admin', 'pengelola', 'member');

        foreach($roles as $role){
            Role_akses::create([
                'jenis_user'    =>  $role
            ] 
            );
        }

    }
}

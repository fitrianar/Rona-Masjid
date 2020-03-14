<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_superadmin = new Role();
        $role_superadmin->username = 'superadmin';
        $role_superadmin->save();
        $role_admin = new Role();
        $role_admin->username = 'admin';
        $role_admin->save();
        $role_member = new Role();
        $role_member->username = 'member';
        $role_member->save();
    }
}

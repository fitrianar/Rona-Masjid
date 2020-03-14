<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_superadmin = Role::where('username', 'superadmin')->first();
        $role_admin = Role::where('username', 'admin')->first();
        $role_member = Role::where('username', 'member')->first();

        $superadmin = new User();
        $superadmin->name = 'superadmin';
        $superadmin->email = 'superadmin@example.com';
        $superadmin->password = bcrypt('secret');
        $superadmin->save();
        $superadmin->roles()->attach($role_superadmin);

        $admin = new User();
        $admin->name = 'admin';
        $admin->email = 'admin@example.com';
        $admin->password = bcrypt('secret');
        $admin->save();
        $admin->roles()->attach($role_admin);

        $member = new User();
        $member->name = 'member';
        $member->email = 'member@example.com';
        $member->password = bcrypt('secret');
        $member->save();
        $member->roles()->attach($role_member);
    }
}

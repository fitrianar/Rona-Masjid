<?php

use Illuminate\Database\Seeder;
use App\User;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nama'          =>  'Fitri',
            'no_ktp'        =>  '3211065801990002',
            'email'         =>  'srifitrianaramadhini@gmail.com',
            'password'      =>  bcrypt('12345678'),
            'no_telpon'     =>  '085559391193',
            'alamat'        =>  'Dsn. Pakemitan Rt. 03 Rw. 05 Ds. Situraja Kec. Situraja Kab. Sumedang 45371',
            'jenis_kelamin' =>  'Perempuan',
            'email_verified'=>  now(),
            'role_akses_id' =>  '1'
        ]);
    }
}

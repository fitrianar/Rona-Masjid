<?php

use Illuminate\Database\Seeder;
use App\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrKategori =[
            'Ramadhan',
            'Sahur',
            'Tarawih',
            'tadarus',
            'Dakwah',
            'pengajian',
            'Syukuran'
        ];

        foreach($arrKategori as $kategori){

            $hasKategori = Kategori::where('nama', $kategori)->first();

            if(!$hasKategori){ //if tidak duplikat
                Kategori::Create([
                    'nama' => $kategori
                ]);
            }
            
        }
    }
}

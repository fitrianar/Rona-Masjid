<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasjidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masjid', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_masjid', 64);
            $table->text('alamat_masjid');
            $table->string('l_tanah', 10);    
            $table->string('p_tanah', 10);  
            $table->string('luas_bangunan', 10);
            $table->text('lampiran_masjid')->nullable();
            $table->enum('status_masjid', ['Waqaf','Pribadi']);         
            $table->string('deskripsi', 64); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('masjid');
    }
}

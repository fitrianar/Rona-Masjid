<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKegiatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama', 64);
            $table->date('tgl_dilaksanakan');
            $table->string('jam_dimulai', 10);
            $table->string('jam_akhir', 10);
            $table->text('deskripsi_kegiatan');
            $table->text('poster');
            $table->timestamp('tgl_dibuat');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('masjid_id');
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
        Schema::dropIfExists('kegiatan');
    }
}

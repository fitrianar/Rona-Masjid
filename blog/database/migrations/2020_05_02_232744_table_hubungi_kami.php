<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableHubungiKami extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hubungi_kami', function (Blueprint $table) {
            $table->enum('status_pesan', ['Belum Dibalas','Sudah Dibalas']); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hubungi_kami', function (Blueprint $table) {
            //
        });
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('role_akses_id');
            $table->string('nama', 64);
            $table->string('no_ktp', 64);    
            $table->string('email')->unique();
            $table->text('password');
            $table->string('no_telpon', 64);
            $table->text('alamat');
            $table->string('jenis_kelamin', 20);
            $table->timestamp('email_verified');  
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
        Schema::dropIfExists('users');
    }
}

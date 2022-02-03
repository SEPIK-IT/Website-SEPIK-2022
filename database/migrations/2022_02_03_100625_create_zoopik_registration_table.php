<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZoopikRegistrationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zoopik_registration', function (Blueprint $table) {
            $table->id('id_zoopik_registration');
            $table->string('nama_lengkap');
            $table->string('nrp');
            $table->string('asalUniv');
            $table->string('path_img_ktm');
            $table->string('path_img_foto');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });

        Schema::table('zoopik_registration', function (Blueprint $table){
            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zoopik_registration');
    }
}

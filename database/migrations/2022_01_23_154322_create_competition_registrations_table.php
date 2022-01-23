<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetitionRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competition_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreignId('competition_id')->references('id')->on('competitions')->cascadeOnDelete();
            $table->json('names');
            $table->integer('nominal');
            $table->enum('category', ['MAHASISWA', 'UMUM']);
            $table->string('google_drive_link', 500);
            $table->string('university')->nullable();
            $table->string('transfer_proof');
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
        Schema::dropIfExists('competition_registrations');
    }
}

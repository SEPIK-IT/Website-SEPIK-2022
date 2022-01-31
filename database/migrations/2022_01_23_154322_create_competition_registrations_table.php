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
        // form nya banyak ya adik adik ahahahahahha -rama
        Schema::create('competition_registrations', function (Blueprint $table) {
            $table->id();

            $table->boolean('is_verified')->default(false);

            $table->foreignId('competition_id')->references('id')->on('competitions')->cascadeOnDelete();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();


            // Informasi diri
            $table->json('names');
            $table->json('identifications');
            $table->json('origins');
            $table->json('regions');


            // Upload file pendukung
            $table->json('upload_ids');
            $table->json('upload_photos');

            // Twibbon
            $table->json('twibbon_links');

            // Berkas kelompok
            $table->string('google_drive_link', 500);
            $table->string('caption', 500);
            $table->string('originality_statement', 500);

            // Contact person
            $table->string('whatsapp_no', 100);
            $table->string('line_id', 100);

            // Pembayaran
            $table->string('payment_proof', 100);

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

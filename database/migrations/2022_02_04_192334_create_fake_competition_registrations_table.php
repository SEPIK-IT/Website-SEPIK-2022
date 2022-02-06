<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFakeCompetitionRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fake_competition_registrations', function (Blueprint $table) {
            $table->id();

            $table->boolean('is_verified')->default(false);

            $table->foreignId('competition_id')->references('id')->on('competitions')->cascadeOnDelete();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();


            // Informasi diri
            $table->text('names');
            $table->text('identifications');
            $table->text('origins');
            $table->text('regions');


            // Upload file pendukung
            $table->text('upload_ids');
            $table->text('upload_photos');

            // Twibbon
            $table->text('twibbon_links');

            // Berkas kelompok
            $table->string('google_drive_link', 500);
            $table->string('caption', 500);
            $table->string('originality_statement', 500);

            // Contact person
            $table->string('whatsapp_no', 100);
            $table->string('line_id', 100);

            // Pembayaran
            $table->string('payment_proof', 100);

            $table->unsignedBigInteger('vote_count')->default(0);

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
        Schema::dropIfExists('fake_competition_registrations');
    }
}
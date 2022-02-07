<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialMediaMovementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_media_movements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->enum('verification_status', ['VERIFIED', 'UNVERIFIED', 'REJECTED'])->default('UNVERIFIED');

            // Data peserta
            $table->json('names');
            $table->json('universities');
            $table->json('identifications');
            $table->json('line_ids');
            $table->json('whatsapp_numbers');
            $table->json('twibbon_links');
            $table->json('instagram_usernames');

            // Pengumpulan data
            $table->string('id_proof_link', 500);
            $table->string('photo_link', 500);

            $table->string('transfer_proof', 500);

            // Link gdrive bukti unggahan
            $table->string('story_proof_link');
            $table->string('file_proof_link');
            $table->string('twibbon_proof_link');

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
        Schema::dropIfExists('social_media_movements');
    }
}

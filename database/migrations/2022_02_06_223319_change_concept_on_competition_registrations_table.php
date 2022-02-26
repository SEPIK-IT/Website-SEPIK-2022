<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeConceptOnCompetitionRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('competition_registrations', function (Blueprint $table) {
            $table->string('google_drive_link', 500)->nullable()->change();
            $table->string('caption', 500)->nullable()->change();
            $table->string('originality_statement', 500)->nullable()->change();

            $table->enum('verification_status', [
                'VERIFIED',
                'WORKS_UNUPLOADED',
                'UNVERIFIED',
                'REJECTED'
            ])->default('UNVERIFIED');

            $table->dropColumn('is_verified');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

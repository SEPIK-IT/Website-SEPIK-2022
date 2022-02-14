<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToSocialMediaMovementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('social_media_movements', function (Blueprint $table) {
            $table->string('delegate_name')->nullable();
            $table->date('interview_time')->nullable();
            $table->string('google_drive_interview')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('social_media_movements', function (Blueprint $table) {
            //
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVoteCountColumnToCompetitionRegistrations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('competition_registrations', function (Blueprint $table) {
            $table->unsignedBigInteger('vote_count')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('competition_registrations', function (Blueprint $table) {
            $table->dropColumn('vote_count');
        });
    }
}
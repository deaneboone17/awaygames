<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('homeTeam');
            $table->string('visitingTeam');
            $table->string('gameDate');
            $table->string('season');
            $table->string('gameDescription');
            $table->string('gameTime');
            $table->string('venueName');
            $table->string('venueLocation');
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
        //
    }
}

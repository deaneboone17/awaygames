<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
Schema::create('flights', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numTravelers');
            $table->string('departDate');
            $table->string('returnDate');
            $table->string('originAirport');
            $table->string('destinationAirport');
            
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

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatabillboardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('databillboards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('Ukuran');
            $table->string('Lokasi');
            $table->string('Latitude');
            $table->string('Longitude');
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
        Schema::drop('databillboards');
    }
}

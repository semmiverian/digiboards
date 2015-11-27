<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillboardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billboards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('lokasi');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('ukuran');
            $table->string('permukaan');
            $table->string('status')->default('member');
            $table->string('view');
            $table->string('jenis');
            $table->string('fasilitas');
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
        Schema::drop('billboards');
    }
}

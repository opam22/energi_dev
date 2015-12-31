<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TransaksiEbt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('dataebt', function(Blueprint $table) {
                $table->increments('id_data');
                $table->integer('prov');
                $table->integer('kab');
                $table->bigInteger('kec');
                $table->string('kel');
                $table->string('dusun');
                $table->integer('energi');
                $table->integer('posisi');
                $table->integer('anggaran');
                $table->integer('terpasang');
                $table->integer('kwh');
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
        Schema::drop('dataebt');
    }
}

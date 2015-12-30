<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Dusun extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dusun', function (Blueprint $table) {
            $table->bigIncrements('id_dusun');
            $table->double('id_kelurahan');
            $table->string('nama_dusun');
            $table->integer('id_jenis');
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
        Schema::drop('dusun');
    }
}

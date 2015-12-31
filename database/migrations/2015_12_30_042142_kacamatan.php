<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Kacamatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kecamatan', function(Blueprint $table) {
                $table->bigIncrements('id_kecamatan');
                $table->double('id_kabupaten');
                $table->string('nama_kecamatan');
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
        Schema::drop('kecamatan');
    }
}

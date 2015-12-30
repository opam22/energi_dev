<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Kelurahan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelurahan', function(Blueprint $table) {
                $table->bigIncrements('id_kelurahan');
                $table->double('id_kecamatan');
                $table->string('nama_kelurahan');
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
        Schema::drop('kelurahan');
    }
}

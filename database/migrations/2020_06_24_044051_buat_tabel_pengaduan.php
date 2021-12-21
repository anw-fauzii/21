<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuatTabelPengaduan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nik', 35);
            $table->string('nama', 35);
            $table->string('telp', 35);
            $table->string('email', 35);
            $table->string('lat', 50);
            $table->string('long', 50);
            $table->string('deskripsi', 255);
            $table->string('img1', 255);
            $table->string('img2', 255);
            $table->string('img3', 255);
            $table->string('img4', 255);
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
        Schema::dropIfExists('pengaduan');
    }
}

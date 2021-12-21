<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuatTabelPelaporan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('pelaporan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama', 35);
            $table->integer('telp');
            $table->string('email', 50);
            $table->string('nama_perusahaan', 35);
            $table->string('bidang_usaha', 35);
            $table->enum('jenis', ['Air', 'Udara', 'LimbahB3', 'Lingkungan']);
            $table->string('periode', 15);
            $table->string('dok_pelaporan', 255);
            $table->string('dok_izin', 255);
            $table->string('dok_lab', 255);   
            $table->enum('status', ['Reviewing', 'Reviewed']);  
            $table->integer('user_id')->unsigned();       
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
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
        Schema::dropIfExists('pelaporan');
    }
}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuatTabelReview extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('review', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama', 35);
            $table->string('nama_pelapor', 35);
            $table->string('email', 50);
            $table->string('nama_perusahaan', 35);
            $table->string('bidang_usaha', 35);
            $table->string('jenis', 35);
            $table->string('periode', 35);
            $table->string('review_dok_pelaporan', 255);
            $table->string('review_dok_izin', 255);
            $table->string('review_dok_lab', 255); 
            $table->string('kesimpulan', 25);  
            $table->string('no_surat', 20);  
            $table->string('id_verifikasi', 20);  
            $table->string('pdf', 255);  
            $table->integer('pelaporan_id')->unsigned();    
            $table->integer('user_id')->unsigned();     
            $table->timestamps();

            $table->foreign('pelaporan_id')->references('id')->on('pelaporan')->onDelete('cascade');
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

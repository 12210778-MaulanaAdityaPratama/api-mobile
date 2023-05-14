<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Presensi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presensi', function (Blueprint $bp) {
            $bp->id();
            $bp->dateTime('waktu_masuk');
            $bp->dateTime('waktu_tengah');
            $bp->dateTime('waktu_pulang');
            $bp->string('alamat_ip', 512)->nullable(true);
            $bp->text('lokasi')->nullable(false);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('presensi');
    }
}

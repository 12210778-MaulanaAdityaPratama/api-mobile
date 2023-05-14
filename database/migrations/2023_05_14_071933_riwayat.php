<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Riwayat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat', function (Blueprint $bp) {
            $bp->id();
            $bp->integer('jmlh_hdir_tptwktu')->nullable(false);
            $bp->integer('jmlh_tidak_hadir')->nullable(false);
            $bp->integer('jmlh_telat')->nullable(false);
            
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('riwayat');
    }
}

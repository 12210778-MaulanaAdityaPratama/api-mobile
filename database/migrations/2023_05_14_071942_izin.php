<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Izin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('izin', function (Blueprint $bp) {
            $bp->id();
            $bp->date('tgl_mulai')->nullable(false);
            $bp->date('tgl_selesai')->nullable(false);
            $bp->text('keterangan', 512)->nullable(true);
            $bp->string('file')->nullable(true);
            
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('izin');
    }
}

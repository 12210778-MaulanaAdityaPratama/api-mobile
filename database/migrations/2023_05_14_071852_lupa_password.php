<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LupaPassword extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lupa_password', function (Blueprint $bp) {
            $bp->id();
            $bp->unsignedBigInteger('nip');
            $bp->string('email')-> length(128)->nullable(false);
            $bp->string('password_baru') ->nullable(false);
            $bp->dateTime('dt_created');
            $bp->dateTime('dt_updated');
            $bp->index(['password_baru']);
            $bp->unsignedBigInteger('nip_id');

            $bp->foreign('nip_id')->references('id')->on('login')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lupa_password');
    }
}

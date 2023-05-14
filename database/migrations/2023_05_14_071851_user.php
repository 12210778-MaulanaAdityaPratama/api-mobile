<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class User extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $bp) {
            $bp->id();
            $bp->unsignedBigInteger('nip');
            $bp->string('nama_lengkap') ->nullable(false);
            $bp->enum('jenis_kelamin', ['L', 'P']) ->nullable(true);
            $bp->string('jabatan') ->nullable(false);
            $bp->string('alamat') ->nullable(true);
            $bp->integer('no_hp')->length(9)->unsigned();
            $bp->string('email') ->nullable(false);
            $bp->string('password') ->nullable(false);
            $bp->dateTime('dt_created');
            $bp->dateTime('dt_updated');
            $bp->foreign('nip')->references('nip')->on('login')->onUpdate('cascade')->onDelete('cascade');
           
            // $bp->foreign('nip','fk_user_login_nip')
            //     ->on('login')->references('nip')
            //     ->onDelete('cascade')->onUpdate('cascade');
            

            
            


            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

//        'assunto','data_expiracao','imagem','texto','ativo','publicado'

        Schema::create('publicacaos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('assunto');
            $table->date('data_expiracao');
            $table->binary('imagem');
            $table->string('texto');
            $table->boolean('ativo');
            $table->boolean('publicado');
//            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');



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
        Schema::dropIfExists('publicacaos');
    }
}

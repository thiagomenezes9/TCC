<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

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
            $table->string('titulo');
            $table->dateTime('data_expiracao')->nullable();
            $table->dateTime('data_publicacao')->nullable();
            $table->binary('imagem')->nullable();
            $table->string('texto')->nullable();
            $table->boolean('ativo');
            $table->boolean('publicado');
            $table->string('tipo');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');



            $table->timestamps();
        });


        Schema::table('publicacaos', function(Blueprint $table){
            DB::statement('ALTER TABLE publicacaos MODIFY imagem LONGBLOB');
        });

//        DB::statement('ALTER TABLE publicacaos MODIFY imagem LONGBLOB');





    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publicacaos');
//        DB::statement('ALTER TABLE publicacaos CHANGE imagem imagem LONGBLOB NULL DEFAULT NULL');
    }
}

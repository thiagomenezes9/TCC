<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('matricula')->nullable();
            $table->integer('coordenacao_id')->nullable()->unsigned();
            $table->boolean('ativo')->nullable();
            $table->integer('resp_coord_id')->nullable()->unsigned();
            $table->rememberToken();
            $table->timestamps();


            $table->foreign('coordenacao_id')->references('id')->on('coordenacaos')->onDelete('cascade');
            $table->foreign('resp_coord_id')->references('id')->on('coordenacaos')->onDelete('cascade');




        });

        DB::table('users')->insert(
            array(
                'email' => 'thiagomenezes9@gmail.com',
                'name' => 'admin',
                'password' => '$2y$10$GGYmnhv6.JtHUuDseuYlq.z1TlzMCymB1TVwjlifN4CtlrwG861sK',
                'coordenacao_id' => '1',
                'resp_coord_id' => '1',
                'ativo' => '1'

            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

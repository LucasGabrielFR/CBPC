<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PlayerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id('id');
            $table->string('nome');
            $table->string('cidade');
            $table->string('estado');
            $table->string('cpf')->unique();
            $table->string('contato');
            $table->string('imagem');
            $table->integer('codigo_transf')->unique();
            $table->integer('status');
            $table->date('data_nascimento');
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
        //
    }
}

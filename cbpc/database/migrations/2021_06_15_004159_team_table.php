<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TeamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id('id');
            $table->string('nome');
            $table->string('sigla');
            $table->string('emblema');
            $table->string('estado');
            $table->string('contato');
            $table->string('descricao');
            $table->integer('gols');
            $table->integer('gols_sofridos');
            $table->integer('vitorias');
            $table->integer('empates');
            $table->integer('derrotas');
            $table->integer('titulos');
            $table->integer('pontuacao');
            $table->tinyInteger('recrutando');
            $table->date('data_fundacao');
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
        Schema::dropIfExists('teams');
    }
}

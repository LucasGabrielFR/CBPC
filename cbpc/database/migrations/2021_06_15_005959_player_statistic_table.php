<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PlayerStatisticTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_statistics', function (Blueprint $table) {
            $table->unsignedBigInteger('idContrato');
            $table->integer('gols');
            $table->integer('assistencias');
            $table->integer('defesas');
            $table->integer('divididas');
            $table->integer('gols_sofridos');
            $table->integer('finalizacoes');
            $table->integer('pontuacao_media');
            $table->integer('cartoes_amarelos');
            $table->integer('cartoes_vermelhos');
            $table->integer('passes_certos');
            $table->integer('total_passes');
            $table->timestamps();

            $table->foreign('idContrato')->references('id')->on('contracts')->onDelete('cascade');
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

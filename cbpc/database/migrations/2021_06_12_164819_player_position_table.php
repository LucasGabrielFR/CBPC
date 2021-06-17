<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PlayerPositionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_positions', function (Blueprint $table) {
            $table->unsignedBigInteger('jogador_id');
            $table->unsignedBigInteger('posicao_id');

            $table->foreign('jogador_id')->references('id')->on('players')->onDelete('cascade');
            $table->foreign('posicao_id')->references('id')->on('positions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('player_positions');
    }
}

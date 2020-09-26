<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenerosMusicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generos_musicos', function (Blueprint $table) {
            $table->unsignedBigInteger('genero_id');
            $table->unsignedBigInteger('musico_id');
            $table->foreign('genero_id')->references('id')->on('generos')->onDelete('cascade');
            $table->foreign('musico_id')->references('id')->on('musicos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('generos_musicos');
    }
}

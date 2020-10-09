<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMusicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('musicos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('fed_id');

            $table->string('nome');
            $table->string('telefone');
            $table->string('imagem')->nullable();
            $table->text('biografia');
            $table->enum('sexo', ['Feminino', 'Masculino']);
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('fed_id')->references('id')->on('federacaos');
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
        Schema::dropIfExists('musicos');
    }
}

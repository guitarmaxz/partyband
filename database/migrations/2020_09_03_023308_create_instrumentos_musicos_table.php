<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstrumentosMusicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instrumentos_musicos', function (Blueprint $table) {
            $table->unsignedBigInteger('inst_id');
            $table->unsignedBigInteger('musico_id');
            $table->foreign('inst_id')->references('id')->on('instrumentos')->onDelete('cascade');
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
        Schema::dropIfExists('instrumentos_musicos');
    }
}

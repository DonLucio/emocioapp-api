<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmocionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emocions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('tipo')->nullable(false);
            $table->foreign('tipo')->references('id')->on('tipos');            
            $table->string('nombre', 60);
            $table->string('estado', 30)->default('activo');
            $table->string('observacion')->nullable(); 
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
        Schema::dropIfExists('emocions');
    }
}

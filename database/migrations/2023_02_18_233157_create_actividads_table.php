<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActividadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividads', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user')->nullable(false);
            $table->foreign('user')->references('id')->on('users');
            $table->uuid('tipo')->nullable(false);
            $table->foreign('tipo')->references('id')->on('tipos');
            $table->uuid('emocion')->nullable(true);
            $table->foreign('emocion')->references('id')->on('emocions');
            $table->string('lugar', 30);
            $table->string('cuerpo', 30)->nullable();            
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
        Schema::dropIfExists('actividads');
    }
}

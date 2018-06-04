<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComidaIngredienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comida_ingrediente', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->nullable()->default(null);
            $table->string('codigo')->nullable()->default(null);
            $table->double('costo',20,2)->nullable()->default(null);
            $table->tinyInteger('estado')->nullable()->default(1);

            $table->Integer('comida')->unsigned()->nullable()->default(null);
            $table->foreign('comida')->references('id')->on('comidas')->onDelete('cascade');
            $table->Integer('ingrediente')->unsigned()->nullable()->default(null);
            $table->foreign('ingrediente')->references('id')->on('ingredientes')->onDelete('cascade');
            $table->Integer('combo')->unsigned()->nullable()->default(null);
            $table->foreign('combo')->references('id')->on('combos')->onDelete('cascade');
            
            $table->softDeletes();
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
        Schema::dropIfExists('comida_ingrediente');
    }
}

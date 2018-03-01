<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuentas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->nullable()->default(null);
            $table->string('codigo')->nullable()->default(null);
            $table->double('costo',20,2)->nullable()->default(null);
            $table->tinyInteger('separadas')->nullable()->default(1);
            $table->tinyInteger('estado')->nullable()->default(1);

            $table->Integer('mesa')->unsigned()->nullable()->default(null);
            $table->foreign('mesa')->references('id')->on('mesas')->onDelete('cascade');
            $table->Integer('cliente')->unsigned()->nullable()->default(null);
            $table->foreign('cliente')->references('id')->on('clientes')->onDelete('cascade');
            $table->Integer('usuario')->unsigned()->nullable()->default(null);
            $table->foreign('usuario')->references('id')->on('usuarios')->onDelete('cascade');
            
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
        Schema::dropIfExists('cuentas');
    }
}

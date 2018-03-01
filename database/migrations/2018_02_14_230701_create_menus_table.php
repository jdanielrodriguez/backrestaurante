<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->nullable()->default(null);
            $table->string('codigo')->nullable()->default(null);
            $table->double('costo',20,2)->nullable()->default(null);
            $table->tinyInteger('estado')->nullable()->default(1);

            $table->Integer('cuenta')->unsigned()->nullable()->default(null);
            $table->foreign('cuenta')->references('id')->on('cuentas')->onDelete('cascade');
            
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
        Schema::dropIfExists('menus');
    }
}

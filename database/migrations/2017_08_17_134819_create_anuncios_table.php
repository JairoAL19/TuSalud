<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnunciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anuncios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cod_cat');
            $table->string('cod_subcat');            
            $table->string('cod_emp');
            $table->string('encabezado', 600);
            $table->string('texto', 3000);
            $table->string('imagen');
            $table->string('duracion',10);
            $table->string('destacado',1);
            $table->string('estado');
            $table->integer('vistas',11);
            $table->rememberToken();
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
        Schema::dropIfExists('anuncios');
    }
}

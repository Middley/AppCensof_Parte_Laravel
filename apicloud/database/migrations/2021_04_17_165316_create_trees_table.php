<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('project_id');//definimos asi para que no tome 2 pk
            $table->string('nombre_comun');
            $table->string('nombre_cientifico');
            $table->integer('altura');
            $table->integer('coor_este');
            $table->integer('coor_norte');
            $table->text('observaciones');
            $table->date('fecha');
            $table->foreign('project_id')->references('id')->on('projects');
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
        Schema::dropIfExists('trees');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListaAmiciTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Amici', function (Blueprint $table) {
            $table->bigIncrements('IDAmici');
            $table->bigInteger('IDUtente')->unsigned()->index();
            $table->foreign('IDUtente')->references('id')->on('users');
            $table->integer('IDUtenteAmico');
            $table->boolean('Amicizia')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Lista_amici');
    }
}

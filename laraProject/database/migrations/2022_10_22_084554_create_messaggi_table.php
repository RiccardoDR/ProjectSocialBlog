<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessaggiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Messaggi', function (Blueprint $table) {
            $table->bigIncrements('IDMessaggi');
            $table->bigInteger('IDUtente')->unsigned()->index();
            $table->foreign('IDUtente')->references('id')->on('users');
            $table->bigInteger('IDUtenteRichiesta');
            $table->bigInteger('Richiesta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messaggi');
    }
}

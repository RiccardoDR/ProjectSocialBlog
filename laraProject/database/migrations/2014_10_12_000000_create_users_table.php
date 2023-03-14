<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Nome');
            $table->string('Cognome');
            $table->string('Telefono');
            $table->string('Città');
            $table->string('Indirizzo');
            $table->string('Anni');
            $table->string('Codice_Fiscale');
            $table->string('Username')->unique();
            $table->timestamp('email_verified_at');
            $table->string('password');
            $table->enum('livello', ['utente', 'staff', 'amministratore'])->default('utente');
            $table->string('Visibilità');
            $table->string('Descrizione')->default("N/A");
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
        Schema::dropIfExists('users');
    }
}

<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        \DB::table('users')->insert([
            ['Nome' => 'Mario', 'Cognome' => 'Rossi', 'Telefono' => '3245578123', 'Città' => 'Ancona', 'Indirizzo' => 'Via Roma 55', 'Anni' => '22', 'Codice_Fiscale' => 'DRTZED11T03E418C', 'email' => 'blogblog@gmail.com', 'password' => Hash::make('blogblog'), 'Visibilità' => 's', 'Descrizione' => 'Ciao sono Mario Rossi, ho 22 anni e vengo da Ancona'],
            ['Nome' => 'Luigi', 'Cognome' => 'Verdi', 'Telefono' => '3245578123', 'Città' => 'Ancona', 'Indirizzo' => 'Via Giovanni 55', 'Anni' => '28', 'Codice_Fiscale' => 'DRTZED11T03E418C', 'email' => 'staffstaff@gmail.com', 'password' => Hash::make('staffstaff'), 'Visibilità' => 's', 'Descrizione' => 'Luigi Verdi, Staff'],
            ['Nome' => 'Giacomo', 'Cognome' => 'Bianchi', 'Telefono' => '3245578123', 'Città' => 'Ancona', 'Indirizzo' => 'Via Giacomo 55', 'Anni' => '35', 'Codice_Fiscale' => 'DRTZED11T03E418C', 'email' => 'adminadmin@gmail.com', 'password' => Hash::make('adminadmin'), 'Visibilità' => 's', 'Descrizione' => 'Giacomo Bianchi, Admin di E-Friend Group'],
        ]);
    }
}

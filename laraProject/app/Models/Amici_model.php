<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Amici_model extends Model {
    
    protected $table = 'Amici';
    protected $primaryKey = 'IDAmici';
    protected $guarded = ['IDAmici'];
    public $timestamps = false;

    public function sendRequest(int $id, int $idAmico) {
        Amici_model::create([
            'IDUtente' => $id,
            'IDUtenteAmico' => $idAmico,   
            'Amicizia' => 0,
        ]);
    }

    public function getFriends(int $id) {
        $friends = Amici_model::where('IDUtente', '=', $id)
                                    ->orWhere('IDUtenteAmico', '=', $id)
                                    ->get();
        return $friends;
    }

    public function getNumFriends(int $id) {
        $numFriends = Amici_model::where([
                                        ['IDUtente', '=', $id],
                                        ['Amicizia', '=', '1'],
                                    ])
                                    ->orWhere([
                                        ['IDUtenteAmico', '=', $id],
                                        ['Amicizia', '=', '1'],
                                    ])
                                    ->count();
        return $numFriends;
        
    }

    public function getAllFriends() {
        $friends = Amici_model::get();
        return $friends;
    }

    public function acceptRequest(int $id, int $idAmico) {
        Amici_model::where('IDUtente', '=', $idAmico)
                        ->where('IDUtenteAmico', '=', $id)
                        ->update(['Amicizia' => 1]);
    }

    public function deleteRequest(int $id, int $idAmico) {
        Amici_model::where('IDUtente', '=', $idAmico)
                        ->where('IDUtenteAmico', '=', $id)
                        ->delete();
    }

    public function deleteFriend(int $id1, int $id2) {
        Amici_model::where([
                            ['IDUtente', '=', $id1],
                            ['IDUtenteAmico', '=', $id2]])
                    ->orWhere([
                            ['IDUtente', '=', $id2],
                            ['IDUtenteAmico', '=', $id1]])->delete();
    }

}
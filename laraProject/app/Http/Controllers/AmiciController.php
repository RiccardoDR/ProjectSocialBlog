<?php

namespace App\Http\Controllers;

use App\Models\User_model;
use App\Models\Amici_model;
use App\Models\Messaggi_model;

class AmiciController extends Controller
{
    protected $amici_model;
    protected $messaggi_model;
    protected $user_model;
    
    public function __construct() {
        $this->middleware('auth');
        $this->amici_model = new Amici_model;
        $this->messaggi_model = new Messaggi_model;
        $this->user_model = new User_model;
    }

    public function request() {
        $id = $_POST['id'];
        $idAmico = $_POST['idAmico'];
        $this->amici_model->sendRequest($id, $idAmico);
        return back();
    }

    public function accept_request() {
        $id = $_POST['id'];
        $idAmico = $_POST['idAmico'];
        $this->amici_model->acceptRequest($id, $idAmico);
        $this->messaggi_model->messageAccept($idAmico, $id);
        return back();
    }

    public function delete_request() {
        $id = $_POST['id'];
        $idAmico = $_POST['idAmico'];
        $this->amici_model->deleteRequest($id, $idAmico);
        $this->messaggi_model->messageDelete($idAmico, $id);
        return back();
    }

    public function getAmici() {
        $id = $_GET['id'];
        $friends = $this->amici_model->getFriends($id);
        $numFriends = $this->amici_model->getNumFriends($id);
        $users = $this->user_model->getAllUsers();
        return view('amici')
                    ->with('numAmici', $numFriends)
                    ->with('amici', $friends)
                    ->with('utenti', $users);
    }

    public function getAmiciUser(int $id) {
        $friends = $this->amici_model->getFriends($id);
        $allUsers = $this->user_model->getAllUsers();
        $user = $this->user_model->getUser($id);
        return view('amici_user')
                ->with('friends', $friends)
                ->with('users', $allUsers)
                ->with('user', $user[0]);
    }

    public function deleteFriend(int $id1, int $id2) {
        $this->amici_model->deleteFriend($id1, $id2);
        $this->messaggi_model->messageDeleteFriend($id1, $id2);
        return back();
    }
    
}

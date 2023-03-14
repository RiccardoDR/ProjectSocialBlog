<?php

namespace App\Http\Controllers;

use App\Models\Messaggi_model;
use App\Models\User_model;

class MessaggiController extends Controller
{
    protected $messaggi_model;
    protected $user_model;
    
    public function __construct() {
        $this->middleware('auth');
        $this->messaggi_model = new Messaggi_model;
        $this->user_model = new User_model;
    }

    public function getMessage() {
        $id = $_POST['id'];
        $messages = $this->messaggi_model->getAllMessage($id);
        $users = $this->user_model->getAllUsers();
        return view('lista_messaggi')
                    ->with('messaggi', $messages)
                    ->with('utenti', $users);
                    
    }
    
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'Nome' => ['required', 'string', 'max:50'],
            'Cognome' => ['required', 'string', 'max:50'],
            'Telefono' => ['required', 'string', 'max:10'],
            'Città' => ['required', 'string', 'max:50'],
            'Indirizzo' => ['required', 'string', 'max:300'],
            'Anni' => ['required', 'numeric', 'max:100'],
            'Codice_Fiscale' => ['required', 'string', 'min:16', 'max:16'],
            'Username' => ['required', 'string', 'max:30', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'Visibilità' => ['required', 'string', 'max:255'],
            'Descrizione' => ['required', 'string', 'max:255'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'Nome' => $data['Nome'],
            'Cognome' => $data['Cognome'],
            'Telefono' => $data['Telefono'],
            'Città' => $data['Città'],
            'Indirizzo' => $data['Indirizzo'],
            'Anni' => $data['Anni'],
            'Codice_Fiscale' => $data['Codice_Fiscale'],
            'Username' => $data['Username'],
            'password' => Hash::make($data['password']),
            'Visibilità' => $data['Visibilità'],
            'Descrizione' => $data['Descrizione'],
        ]);
    }
}

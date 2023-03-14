<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaffRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'Nome' => 'required|string|max:50',
            'Cognome' => 'required|string|max:50',
            'Telefono' => 'required|numeric|digits:10',
            'Città' => 'required|string|max:50',
            'Indirizzo' => 'required|string|max:300',
            'Anni' => 'required|numeric|max:100',
            'Codice_Fiscale' => 'required|string|min:16|max:16',
            'Username' => 'required|string|min:1|unique:users',
            'password' => 'required_with:confermaPassword|same:confermaPassword|min:8',
            'confermaPassword' => 'min:8',
            'livello' => 'required',
            'Visibilità' => 'required|in:s,n',
            'Descrizione' => 'required|string|max:300',
        ];
    }

}

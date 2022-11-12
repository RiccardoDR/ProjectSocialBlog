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
            'Nome' => 'required|max:25',
            'Cognome' => 'required|max:30',
            'Telefono' => 'required|max:50',
            'Città' => 'required|max:100',
            'Indirizzo' => 'required|max:100',
            'Anni' => 'required|max:50',
            'Codice_Fiscale' => 'required|max:50',
            'email' => 'required|max:50',
            'password' => 'required|max:50',
            'livello' => 'required|max:50',
            'Visibilità' => 'required|max:50',
            'Descrizione' => 'required|max:50',
        ];
    }

}

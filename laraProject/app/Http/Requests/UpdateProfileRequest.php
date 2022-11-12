<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest {

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
            'Nome' => 'nullable|required|max:20',
            'Cognome' => 'nullable|required|max:20',
            'Telefono' => 'nullable|numeric|digits:10',
            'Città' => 'nullable|required|max:20',
            'Indirizzo' => 'nullable|required|max:300',
            'Anni' => 'nullable|required|numeric|max:100',
            'Codice_Fiscale' => 'nullable|string|min:16|max:16',
            'password' => 'nullable|string|min:8',
            'Visibilità' => 'nullable|required|in:s,n',
            'Descrizione' => 'nullable|string|max:300',
            
            ];
    }

}

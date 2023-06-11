<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategorieRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return
        [
			'libelle' => 'required|min:3|unique:categories,libelle',
        ];
    }
    public function messages()
    {
        return [
            'libelle.required' => 'Le champ categorie obligatoire',
            'libelle.unique' => 'Le champ Libelle Categorie existe déja',
            'libelle.min' => 'Le champ type contenir ou moins 3 caracteres',
        ];
    }
}

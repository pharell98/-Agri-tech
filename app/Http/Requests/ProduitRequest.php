<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProduitRequest extends FormRequest
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
			'libelle_produit' => 'required|min:2|unique:produits,libelle_produit',
			'prix' => 'required|numeric|min:50',
			'categorie' => 'required',
			'image' => 'image|nullable|max:1999',
        ];
    }
    public function messages()
    {
        return [
            'libelle_produit.required' => 'Le champ nom produit est obligatoire',
            'libelle_produit.unique' => 'Le champ nom produit existe déja',
            'libelle_produit.min' => 'Le champ nom produit contenir ou moins 3 caracteres',
            'prix.required' => 'Le champ prix est obligatoire',
            'prix.numeric' => 'Le champ Prix doit être numeric',
            'prix.min' => 'Prix minimun 50 Franc',
            'categorie.required'=> 'Choisir categorie produit',
        ];
    }
}

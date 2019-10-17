<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjetStore extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'titre_projet' =>['required','unique:projets'],
            'date_butor_projet'=>'required',
            'date_debut' => ['date','required'],
            'budget_max' => ['interger','required'],
            'desc_projet'=>'required',

        ];
    }
}

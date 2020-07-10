<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateImovelRequest extends FormRequest
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
            'emailProprietario' => 'required | email',
            'estado' => 'required',
            'cidade' => 'required',
            'rua' => 'required',
            'numero' => 'required',
            'complemento' => 'required'
        ];
    }
}

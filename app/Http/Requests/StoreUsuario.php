<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed nome
 * @property mixed email
 * @property mixed telefone
 * @property mixed dataNascimento
 * @property mixed salario
 * @property mixed cargo
 */
class StoreUsuario extends FormRequest
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
            'foto'              => 'mimes:jpeg,bmp,png',
            'nome'              => 'required|min:3',
            'email'             => 'required|min:5',
            'telefone'          => 'required|min:8',
            'dataNascimento'    => 'required|date|before:today',
            'salario'           => 'required|min:3',
        ];
    }

    public function messages()
    {
        $data = date('m/d/Y');
        return  [
            'required'      => 'O campo :attribute é obrigatório.',
            'before'        => 'A data de nascimento devem ser uma data anterior a ' . $data,
            'min'           => 'O :attribute é muito curto.',
            'mimes'        => 'A extensão da :attribute não é válida. Tente as extensões :values.',
        ];
    }
}

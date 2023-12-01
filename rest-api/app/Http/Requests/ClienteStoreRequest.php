<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClienteStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {

        $tipo = $this->input("tipo");

        return [
            'empresa' => [
                'required',
            ],
            'razao_social' => [
                'required',
                'min:3',
                'max:255',
            ],
            'tipo' => [
                'required',
                'in:PF,PJ'
            ],
            'cpf_cnpj' => [
                'required',
                $tipo === "PF" ? "cpf" : "cnpj",
                Rule::unique('clientes')->ignore($this->cliente),
            ]
        ];
    }
}

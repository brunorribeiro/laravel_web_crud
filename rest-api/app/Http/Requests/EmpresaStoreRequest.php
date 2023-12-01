<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmpresaStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'razao_social' => [
                'required', 
                'min:3', 
                'max:255',
                Rule::unique('empresas')->ignore($this->empresa),
            ],
            'sigla' => [
                'required', 
                'min:2',
                'max:6',
            ],
        ];
    }
}
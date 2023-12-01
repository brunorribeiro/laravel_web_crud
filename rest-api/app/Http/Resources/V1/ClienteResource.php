<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClienteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'empresa' => $this->empresa,
            'razao_social' => $this->razao_social,
            'tipo' => $this->tipo,
            'cpf_cnpj' => $this->cpf_cnpj
        ];
    }
}
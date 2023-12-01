<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClienteStoreRequest;
use App\Http\Resources\V1\ClienteResource;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index() 
    {
        return ClienteResource::collection(Cliente::all());
    }

    public function show(Cliente $cliente)
    {
        return new ClienteResource($cliente);
    }

    public function store(ClienteStoreRequest $request, Cliente $cliente) 
    {
        $cliente->create($request->validated());
        return response()->json("Cliente criado");
    }

    public function update(ClienteStoreRequest $request, Cliente $cliente)
    {
        $cliente->update($request->validated());
        return response()->json("Cliente atualizado");
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return response()->json("Cliente removido");
    }
}

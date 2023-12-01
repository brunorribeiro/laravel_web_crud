<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmpresaStoreRequest;
use App\Http\Resources\V1\EmpresaResource;
use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function index() 
    {
        return EmpresaResource::collection(Empresa::all());
    }

    public function show(Empresa $empresa)
    {
        return new EmpresaResource($empresa);
    }

    public function store(EmpresaStoreRequest $request, Empresa $empresa) 
    {
        $empresa->create($request->validated());
        return response()->json("Empresa criada");
    }

    public function update(EmpresaStoreRequest $request, Empresa $empresa)
    {
        $empresa->update($request->validated());
        return response()->json("Empresa atualizada");
    }

    public function destroy(Empresa $empresa)
    {
        $empresa->delete();
        return response()->json("Empresa removida");
    }
}

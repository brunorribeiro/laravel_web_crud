<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\EmpresaController;
use App\Http\Controllers\Api\v1\ClienteController;

Route::prefix('v1')->group( function() {
    Route::apiResource('empresas', EmpresaController::class);
});

Route::prefix('v1')->group( function() {
    Route::apiResource('clientes', ClienteController::class);
});
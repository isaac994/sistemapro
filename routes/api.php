<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UsuarioController;
use App\Http\Controllers\Api\ClienteController;
use App\Http\Controllers\Api\ProveedorController;
use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\MarcaController;
use App\Http\Controllers\Api\ProductoController;
use App\Http\Controllers\Api\InventarioController;
use App\Http\Controllers\Api\CompraController;
use App\Http\Controllers\Api\VentaController;
use App\Http\Controllers\Api\PagoController;
use App\Http\Controllers\Api\ReporteController;

Route::middleware('auth:sanctum')->prefix('api')->group(function () {
    Route::apiResource('usuarios', UsuarioController::class);
    Route::apiResource('clientes', ClienteController::class);
    Route::apiResource('proveedores', ProveedorController::class);
    Route::apiResource('categorias', CategoriaController::class);
    Route::apiResource('marcas', MarcaController::class);
    Route::apiResource('productos', ProductoController::class);
    Route::apiResource('inventario', InventarioController::class)->only(['index', 'store']);
    Route::apiResource('compras', CompraController::class);
    Route::apiResource('ventas', VentaController::class);
    Route::apiResource('pagos', PagoController::class);
    // Reportes
    Route::get('reportes/pdf', [ReporteController::class, 'pdf']);
    Route::get('reportes/excel', [ReporteController::class, 'excel']);
});

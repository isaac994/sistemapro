<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\ReporteController;

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

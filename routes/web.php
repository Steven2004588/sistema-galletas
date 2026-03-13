<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Página principal (Dashboard)
|--------------------------------------------------------------------------
*/

Route::get('/', [DashboardController::class, 'index']);
Route::get('/dashboard', [DashboardController::class, 'index']);


/*
|--------------------------------------------------------------------------
| CRUD PRODUCTOS
|--------------------------------------------------------------------------
*/

Route::get('/productos', [ProductoController::class, 'index']);
Route::get('/productos/create', [ProductoController::class, 'create']);
Route::post('/productos/store', [ProductoController::class, 'store']);
Route::get('/productos/edit/{id}', [ProductoController::class, 'edit']);
Route::post('/productos/update/{id}', [ProductoController::class, 'update']);
Route::get('/productos/delete/{id}', [ProductoController::class, 'destroy']);


/*
|--------------------------------------------------------------------------
| INVENTARIO DIARIO
|--------------------------------------------------------------------------
*/

Route::get('/inventario', [InventarioController::class, 'index']);
Route::post('/inventario/store', [InventarioController::class, 'store']);


/*
|--------------------------------------------------------------------------
| REGISTRAR VENTAS
|--------------------------------------------------------------------------
*/

Route::get('/ventas/create', [VentaController::class, 'create']);
Route::post('/ventas/store', [VentaController::class, 'store']);


/*
|--------------------------------------------------------------------------
| PAGOS DE VENTAS A CRÉDITO
|--------------------------------------------------------------------------
*/

Route::get('/creditos', [VentaController::class, 'creditos']);
Route::post('/creditos/pagar', [VentaController::class, 'pagarCredito']);


/*
|--------------------------------------------------------------------------
| REPORTE DIARIO
|--------------------------------------------------------------------------
*/

Route::get('/reporte', [VentaController::class, 'reporte']);
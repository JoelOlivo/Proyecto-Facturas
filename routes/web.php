<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DetalleFacturaController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::resource('/products', ProductoController::class);
    Route::resource('/clientes', ClienteController::class);
    Route::resource('/facturas', FacturaController::class);
    Route::post('/facturas/complete/{factura}', [FacturaController::class, 'completeSend'])->name('facturas.complete');
    Route::resource('/detalleFactura', DetalleFacturaController::class);
    Route::get('/facturas/agregarProductos/{factura}/', [DetalleFacturaController::class, 'create'])->name('facturas.agregarProductos');

    });

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::resource('/clientes', ClienteController::class);
//     });

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::resource('/facturas', FacturaController::class);
//     });

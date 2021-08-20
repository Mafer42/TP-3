<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FacturaController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//RUTAS PROVEEDOR 

Route::get('proveedor', [ProveedorController::class, 'index'])->middleware('auth')
     ->name('proveedor.index');

Route::get('/proveedor/{id}', [ProveedorController::class, 'show'])->middleware('auth')
     ->name('proveedor.mostrar')
     ->where('id', '[0-9]+');

Route::get('/proveedor/crear', [ProveedorController::class, 'create'])->middleware('auth')
     ->name('proveedor.crear');

Route::post('/proveedor/crear', [ProveedorController::class, 'store'])->middleware('auth')
     ->name('proveedor.guardar');

Route::get('/proveedor/{id}/editar', [ProveedorController::class, 'edit'])->middleware('auth')
     ->name('proveedor.edit')
     ->where('id', '[0-9]+'); 

Route::put('/proveedor/{id}/editar', [ProveedorController::class, 'update'])->middleware('auth')
     ->name('proveedor.update')
     ->where('id', '[0-9]+');   
     
Route::delete('/proveedor/{id}/borrar', [ProveedorController::class, 'destroy'])->middleware('auth')
     ->name('proveedor.borrar')
     ->where('id', '[0-9]+'); 

//RUTAS PRODUCTO

Route::get('producto', [ProductoController::class, 'index'])->middleware('auth')
     ->name('producto.index');

Route::get('/producto/{id}', [ProductoController::class, 'show'])->middleware('auth')
     ->name('producto.mostrar')
     ->where('id', '[0-9]+');

Route::get('/producto/crear', [ProductoController::class, 'create'])->middleware('auth')
     ->name('producto.crear');

Route::post('/producto/crear', [ProductoController::class, 'store'])->middleware('auth')
     ->name('producto.guardar');

Route::get('/producto/{id}/editar', [ProductoController::class, 'edit'])->middleware('auth')
     ->name('producto.edit')
     ->where('id', '[0-9]+'); 

Route::put('/producto/{id}/editar', [ProductoController::class, 'update'])->middleware('auth')
     ->name('producto.update')
     ->where('id', '[0-9]+');   
     
Route::delete('/producto/{id}/borrar', [ProductoController::class, 'destroy'])->middleware('auth')
     ->name('producto.borrar')
     ->where('id', '[0-9]+'); 

//RUTAS CLIENTE

Route::get('cliente', [ClienteController::class, 'index'])->middleware('auth')
     ->name('cliente.index');

Route::get('/cliente/{id}', [ClienteController::class, 'show'])->middleware('auth')
     ->name('cliente.mostrar')
     ->where('id', '[0-9]+');

Route::get('/cliente/crear', [ClienteController::class, 'create'])->middleware('auth')
     ->name('cliente.crear');

Route::post('/cliente/crear', [ClienteController::class, 'store'])->middleware('auth')
     ->name('cliente.guardar');

Route::get('/cliente/{id}/editar', [ClienteController::class, 'edit'])->middleware('auth')
     ->name('cliente.edit')
     ->where('id', '[0-9]+'); 

Route::put('/cliente/{id}/editar', [ClienteController::class, 'update'])->middleware('auth')
     ->name('cliente.update')
     ->where('id', '[0-9]+');   
     
Route::delete('/cliente/{id}/borrar', [ClienteController::class, 'destroy'])->middleware('auth')
     ->name('cliente.borrar')
     ->where('id', '[0-9]+'); 

//RUTAS FACTURA

Route::get('factura', [FacturaController::class, 'index'])->middleware('auth')
     ->name('factura.index');

Route::get('/factura/{id}', [FacturaController::class, 'show'])->middleware('auth')
     ->name('factura.mostrar')
     ->where('id', '[0-9]+');

Route::get('/factura/crear', [FacturaController::class, 'create'])->middleware('auth')
     ->name('factura.crear');

Route::post('/factura/crear', [FacturaController::class, 'store'])->middleware('auth')
     ->name('factura.guardar');

Route::get('/factura/{id}/editar', [FacturaController::class, 'edit'])->middleware('auth')
     ->name('factura.edit')
     ->where('id', '[0-9]+'); 

Route::put('/factura/{id}/editar', [FacturaController::class, 'update'])->middleware('auth')
     ->name('factura.update')
     ->where('id', '[0-9]+');   
     
Route::delete('/factura/{id}/borrar', [FacturaController::class, 'destroy'])->middleware('auth')
     ->name('factura.borrar')
     ->where('id', '[0-9]+'); 

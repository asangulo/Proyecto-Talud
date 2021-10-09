<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group( ['middleware' => 'auth'], function(){
    Route::get('/usuarios/create',[App\Http\Controllers\UsuarioController::class, 'create'])->name('usuario.create');
    Route::post('/usuarios',[App\Http\Controllers\UsuarioController::class, 'store'])->name('usuarios.store');
    Route::get('/usuarios/index',[App\Http\Controllers\UsuarioController::class, 'index'])->name('usuarios.index');
    Route::get('/usuarios/{usuario}',[App\Http\Controllers\UsuarioController::class, 'show'])->name('usuarios.show');
    Route::get('/usuarios/{usuario}/edit',[App\Http\Controllers\UsuarioController::class, 'edit'])->name('usuarios.edit');
    Route::put('/usuarios/{usuario}',[App\Http\Controllers\UsuarioController::class, 'update'])->name('usuarios.update');
    Route::delete('/usuarios/{usuario}',[App\Http\Controllers\UsuarioController::class, 'destroy'])->name('usuarios.delete');

    Route::get('/marcas/create',[App\Http\Controllers\MarcaController::class, 'create'])->name('marca.create');
    Route::post('/marcas',[App\Http\Controllers\MarcaController::class, 'store'])->name('marcas.store');
    Route::get('/marcas/index',[App\Http\Controllers\MarcaController::class, 'index'])->name('marcas.index');
    Route::get('/marcas/{marca}',[App\Http\Controllers\MarcaController::class, 'show'])->name('marcas.show');
    Route::get('/marcas/{marca}/edit',[App\Http\Controllers\MarcaController::class, 'edit'])->name('marcas.edit');
    Route::put('/marcas/{marca}',[App\Http\Controllers\MarcaController::class, 'update'])->name('marcas.update');
    Route::delete('/marcas/{marca}',[App\Http\Controllers\MarcaController::class, 'destroy'])->name('marcas.delete');

    Route::get('/tipoMateriales/create',[App\Http\Controllers\TipoMaterialController::class, 'create'])->name('tipoMaterial.create');
    Route::post('/tipoMateriales',[App\Http\Controllers\TipoMaterialController::class, 'store'])->name('tipoMateriales.store');
    Route::get('/tipoMateriales/index',[App\Http\Controllers\TipoMaterialController::class, 'index'])->name('tipoMateriales.index');
    Route::get('/tipoMateriales/{tipoMaterial}',[App\Http\Controllers\TipoMaterialController::class, 'show'])->name('tipoMateriales.show');
    Route::get('/tipoMateriales/{tipoMaterial}/edit',[App\Http\Controllers\TipoMaterialController::class, 'edit'])->name('tipoMateriales.edit');
    Route::put('/tipoMateriales/{tipoMaterial}',[App\Http\Controllers\TipoMaterialController::class, 'update'])->name('tipoMateriales.update');
    Route::delete('/tipoMateriales/{tipoMaterial}',[App\Http\Controllers\TipoMaterialController::class, 'destroy'])->name('tipoMateriales.delete');

     Route::get('/materiales/create',[App\Http\Controllers\MaterialController::class, 'create'])->name('material.create');
     Route::post('/materiales',[App\Http\Controllers\MaterialController::class, 'store'])->name('materiales.store');
     Route::get('/materiales/index',[App\Http\Controllers\MaterialController::class, 'index'])->name('materiales.index');
     Route::get('/materiales/{material}',[App\Http\Controllers\MaterialController::class, 'show'])->name('materiales.show');
     Route::get('/materiales/{material}/edit',[App\Http\Controllers\MaterialController::class, 'edit'])->name('materiales.edit');
     Route::put('/materiales/{material}',[App\Http\Controllers\MaterialController::class, 'update'])->name('materiales.update');
     Route::delete('/materiales/{material}',[App\Http\Controllers\MaterialController::class, 'destroy'])->name('materiales.delete');



    Route::get('/entradas/create',[App\Http\Controllers\EntradaController::class, 'create'])->name('entrada.create');
    Route::post('/entradas',[App\Http\Controllers\EntradaController::class, 'store'])->name('entradas.store');
    Route::get('/entradas/index',[App\Http\Controllers\EntradaController::class, 'index'])->name('entradas.index');
    Route::get('/entradas/{entrada}',[App\Http\Controllers\EntradaController::class, 'show'])->name('entradas.show');
    Route::get('/entradas/{entrada}/edit',[App\Http\Controllers\EntradaController::class, 'edit'])->name('entradas.edit');
    Route::put('/entradas/{entrada}',[App\Http\Controllers\EntradaController::class, 'update'])->name('entradas.update');
    Route::delete('/entradas/{entrada}',[App\Http\Controllers\EntradaController::class, 'destroy'])->name('entradas.delete');


    Route::get('/obras/create',[App\Http\Controllers\ObraController::class, 'create'])->name('obra.create');
    Route::post('/obras',[App\Http\Controllers\ObraController::class, 'store'])->name('obras.store');
    Route::get('/obras/index',[App\Http\Controllers\ObraController::class, 'index'])->name('obras.index');
    Route::get('/obras/{obra}',[App\Http\Controllers\ObraController::class, 'show'])->name('obras.show');
    Route::get('/obras/{obra}/edit',[App\Http\Controllers\ObraController::class, 'edit'])->name('obras.edit');
    Route::put('/obras/{obra}',[App\Http\Controllers\ObraController::class, 'update'])->name('obras.update');
    Route::delete('/obras/{obra}',[App\Http\Controllers\ObraController::class, 'destroy'])->name('obras.delete');

    Route::get('/entradaMateriales/create',[App\Http\Controllers\EntradaMaterialController::class, 'create'])->name('entradaMaterial.create');
    Route::post('/entradaMateriales',[App\Http\Controllers\EntradaMaterialController::class, 'store'])->name('entradaMateriales.store');
    Route::get('/entradaMateriales/index',[App\Http\Controllers\EntradaMaterialController::class, 'index'])->name('entradaMateriales.index');
    Route::get('/entradaMateriales/{entradaMaterial}',[App\Http\Controllers\EntradaMaterialController::class, 'show'])->name('entradaMateriales.show');
    Route::get('/entradaMateriales/{entradaMaterial}/edit',[App\Http\Controllers\EntradaMaterialController::class, 'edit'])->name('entradaMateriales.edit');
    Route::put('/entradaMateriales/{entradaMaterial}',[App\Http\Controllers\EntradaMaterialController::class, 'update'])->name('entradaMateriales.update');
    Route::delete('/entradaMateriales/{entradaMaterial}',[App\Http\Controllers\EntradaMaterialController::class, 'destroy'])->name('entradaMateriales.delete');

    Route::get('/proveedores/create',[App\Http\Controllers\ProveedorController::class, 'create'])->name('proveedor.create');
    Route::post('/proveedores',[App\Http\Controllers\ProveedorController::class, 'store'])->name('proveedores.store');
    Route::get('/proveedores/index',[App\Http\Controllers\ProveedorController::class, 'index'])->name('proveedores.index');
    Route::get('/proveedores/{proveedor}',[App\Http\Controllers\ProveedorController::class, 'show'])->name('proveedores.show');
    Route::get('/proveedores/{proveedor}/edit',[App\Http\Controllers\ProveedorController::class, 'edit'])->name('proveedores.edit');
    Route::put('/proveedores/{proveedor}',[App\Http\Controllers\ProveedorController::class, 'update'])->name('proveedores.update');
    Route::delete('/proveedores/{proveedor}',[App\Http\Controllers\ProveedorController::class, 'destroy'])->name('proveedores.delete');


    Route::get('/categorias/create',[App\Http\Controllers\CategoriaController::class, 'create'])->name('categoria.create');
    Route::post('/categorias',[App\Http\Controllers\CategoriaController::class, 'store'])->name('categorias.store');
    Route::get('/categorias/index',[App\Http\Controllers\CategoriaController::class, 'index'])->name('categorias.index');
    Route::get('/categorias/{categoria}',[App\Http\Controllers\CategoriaController::class, 'show'])->name('categorias.show');
    Route::get('/categorias/{categoria}/edit',[App\Http\Controllers\CategoriaController::class, 'edit'])->name('categorias.edit');
    Route::put('/categorias/{categoria}',[App\Http\Controllers\CategoriaController::class, 'update'])->name('categorias.update');
    Route::delete('/categorias/{categoria}',[App\Http\Controllers\CategoriaController::class, 'destroy'])->name('categorias.delete');


    Route::get('/clientes/create',[App\Http\Controllers\ClienteController::class, 'create'])->name('cliente.create');
    Route::post('/clientes',[App\Http\Controllers\ClienteController::class, 'store'])->name('clientes.store');
    Route::get('/clientes/index',[App\Http\Controllers\ClienteController::class, 'index'])->name('clientes.index');
    Route::get('/clientes/{cliente}',[App\Http\Controllers\ClienteController::class, 'show'])->name('clientes.show');
    Route::get('/clientes/{cliente}/edit',[App\Http\Controllers\ClienteController::class, 'edit'])->name('clientes.edit');
    Route::put('/clientes/{cliente}',[App\Http\Controllers\ClienteController::class, 'update'])->name('clientes.update');
    Route::delete('/clientes/{cliente}',[App\Http\Controllers\ClienteController::class, 'destroy'])->name('clientes.delete');


    Route::resource('permissions', App\Http\Controllers\PermissionController::class);
});



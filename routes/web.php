<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\SalaController;
use App\Http\Controllers\RegistropController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AsignarController;
use Spatie\Permission\Models\Role;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí puedes registrar las rutas web para tu aplicación. Estas rutas
| son cargadas por el RouteServiceProvider y asignadas al grupo "web".
|
*/




/* Rutas protegidas para el rol de Usuario */
Route::group(['middleware' => ['role:Usuario']], function () {
    // Aquí puedes agregar rutas específicas para vendedores
    Route::get('/sucursal', [SucursalController::class, 'index'])->name('sucursal');
    Route::get('/sucursal/{id}/ver', [SucursalController::class, 'show'])->name('sucursal.show');
    Route::delete('/sucursal/{id}', [SucursalController::class, 'destroy'])->name('sucursal.destroy');
    Route::get('/sucursal/crear', [SucursalController::class, 'create'])->name('sucursal.create');
    Route::post('/sucursal', [SucursalController::class, 'store'])->name('sucursal.store');
    Route::get('/sucursal/{id}/editar', [SucursalController::class, 'edit'])->name('sucursal.edit');
    Route::put('/sucursal/{id}', [SucursalController::class, 'update'])->name('sucursal.update');

    /* Fecha */
    Route::get('/item', [ItemController::class, 'index'])->name('item')->middleware('auth');
    Route::get('/item/{id}/ver', [ItemController::class, 'show'])->name('item.show');
    Route::delete('/item/{id}', [ItemController::class, 'destroy'])->name('item.destroy');
    Route::get('/item/crear', [ItemController::class, 'create'])->name('item.create');
    Route::post('/item', [ItemController::class, 'store'])->name('item.store');
    Route::get('/item/{id}/editar', [ItemController::class, 'edit'])->name('item.edit');
    Route::put('/item/{id}', [ItemController::class, 'update'])->name('item.update');

});

/* Asignación de roles */

Route::get('/asignar', [AsignarController::class, 'index'])->name('asignar');
Route::get('/asignar_{id}_editar', [AsignarController::class, 'edit'])->name('asignar.edit');
Route::put('/asignar_{id}', [AsignarController::class, 'update'])->name('asignar.update');


Route::group(['middleware' => ['role:Administrador']], function () {
    Route::get('/sucursal', [SucursalController::class, 'index'])->name('sucursal');
    Route::get('/sucursal/{id}/ver', [SucursalController::class, 'show'])->name('sucursal.show');
    Route::delete('/sucursal/{id}', [SucursalController::class, 'destroy'])->name('sucursal.destroy');
    Route::get('/sucursal/crear', [SucursalController::class, 'create'])->name('sucursal.create');
    Route::post('/sucursal', [SucursalController::class, 'store'])->name('sucursal.store');
    Route::get('/sucursal/{id}/editar', [SucursalController::class, 'edit'])->name('sucursal.edit');
    Route::put('/sucursal/{id}', [SucursalController::class, 'update'])->name('sucursal.update');

    /* Fecha */
    Route::get('/item', [ItemController::class, 'index'])->name('item')->middleware('auth');
    Route::get('/item/{id}/ver', [ItemController::class, 'show'])->name('item.show');
    Route::delete('/item/{id}', [ItemController::class, 'destroy'])->name('item.destroy');
    Route::get('/item/crear', [ItemController::class, 'create'])->name('item.create');
    Route::post('/item', [ItemController::class, 'store'])->name('item.store');
    Route::get('/item/{id}/editar', [ItemController::class, 'edit'])->name('item.edit');
    Route::put('/item/{id}', [ItemController::class, 'update'])->name('item.update');




    Route::get('/sala', [SalaController::class, 'index'])->name('sala')->middleware('auth');
    Route::get('/sala/{id}/ver', [SalaController::class, 'show'])->name('sala.show');
    Route::delete('/sala/{id}', [SalaController::class, 'destroy'])->name('sala.destroy');
    Route::get('/sala/crear', [SalaController::class, 'create'])->name('sala.create');
    Route::post('/sala', [SalaController::class, 'store'])->name('sala.store');
    Route::get('/sala/{id}/editar', [CategoriaController::class, 'edit'])->name('sala.edit');
    Route::put('/sala/{id}', [SalaController::class, 'update'])->name('sala.update');
});







/* Página principal */
Route::get('/home', function () {
    return view('home');
})->middleware('auth')->name('home');

/* Rutas de autenticación */
Auth::routes();

/* Ruta raíz */
Route::get('/', function () {
    return view('welcome');
})->name('inicio.ir');

/* Registro y login */
Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login', [SessionsController::class, 'create'])->name('login');
Route::post('/login', [SessionsController::class, 'store'])->name('login.store');

/* Verificación de contraseña */
Route::post('/verificar-contraseña/{id}', [CitaController::class, 'verificarContraseña']);

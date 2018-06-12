<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('accesos', 'AccesosController');
Route::resource('clientes', 'ClientesController');
Route::resource('combos', 'CombosController');
Route::resource('comidaingrediente', 'ComidaIngredienteController');
Route::resource('comidamenu', 'ComidaMenuController');
Route::resource('comidas', 'ComidasController');
Route::resource('cuentas', 'CuentasController');
Route::resource('empleados', 'EmpleadosController');
Route::resource('ingredientes', 'IngredientesController');
Route::resource('menus', 'MenusController');
Route::resource('mesas', 'MesasController');
Route::resource('modulos', 'ModulosController');
Route::resource('roles', 'RolesController');
Route::resource('sucursales', 'SucursalesController');
Route::resource('usuarios', 'UsuariosController');

Route::post('usuarios/{id}/upload/avatar', 'UsuariosController@uploadAvatar');
Route::post('comidas/{id}/upload/avatar', 'ComidasController@uploadAvatar');
Route::post('ingredientes/{id}/upload/avatar', 'IngredientesController@uploadAvatar');
Route::post('combos/{id}/upload/avatar', 'CombosController@uploadAvatar');
Route::post('usuarios/{id}/changepassword', 'UsuariosController@changePassword');
Route::post('usuarios/password/reset', 'UsuariosController@recoveryPassword');

Route::get('menus/cuenta/{id}', 'MenusController@menusByCuentas');
Route::get('comidas/menu/{id}', 'ComidasController@comidasByMenu');
Route::get('usuarios/{id}/modulos', 'AccesosController@getAccesos');
Route::get('usuarios/{id}/modulos/{id2}', 'AccesosController@getAcceso');
Route::get('buscar/clientes', 'ClientesController@find');

Route::get('ingrediente/comida/{id}', 'ComidaIngredienteController@ingredientesOfComida');
Route::get('ingrediente/combo/{id}', 'ComidaIngredienteController@ingredientesOfCombo');

Route::post('login', 'AuthenticateController@login');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

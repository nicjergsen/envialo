<?php

use Illuminate\Support\Facades\Mail;

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

// RUTAS ÑE

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/services', function () {
    return view('services');
});

Route::get('/faq', function () {
    return view('faq');
});

Route::get('/404', function () {
    return view('404');
});

Route::get('/recepcionista/success', function () {
    return view('recepcionista/success');
});

Route::get('/branch', 'sucursalController@branch');

Route::get('/tracking', function () {
    return view('tracking');
});

Route::post('/tracking', 'personaController@tracking');

Route::get('/simularenvio', function () {
    return view('simularenvio');
});

Route::post('/simularenvio', 'usuarioController@calcularCosto');


Route::group(['middleware' => 'login'], function () {

    Route::get('/login', function () {
        return view('login');
    });

    Route::post('/', 'usuarioController@auth');

    Route::get('register', 'usuarioController@register');

    Route::post('login', 'usuarioController@store');

    Route::get('register2', 'usuarioController@register2');

    Route::post('register2', 'usuarioController@store2');

});

// GRUPO RUTAS ADMIN //

Route::group(['middleware' => 'admin'], function () {

// RUTAS DE SUCURSALES //

    Route::get('/sucursales', 'sucursalController@index');

    Route::get('/sucursales/create', 'sucursalController@create');

    Route::post('/sucursales', 'sucursalController@store');

    Route::get('/sucursales/{id}', 'sucursalController@show');

    Route::get('/sucursales/edit/{id}', 'sucursalController@edit');

    Route::put('/sucursales/{sucursal}', 'sucursalController@update');

    Route::get('/sucursales/delete/{id}', 'sucursalController@delete');

//RUTAS ROLES

    Route::get('/roles', 'rolesController@index');

    Route::get('/roles/create', 'rolesController@create');

    Route::post('/roles', 'rolesController@store');

    Route::get('/roles/{id}', 'rolesController@show');

    Route::get('/roles/edit/{id}', 'rolesController@edit');

    Route::put('/roles/{rol}', 'rolesController@update');

//RUTAS EMPLEADOS

    Route::get('/empleados', 'empleadoController@index');

    Route::get('/empleados/create', 'empleadoController@create');

    Route::post('/empleados', 'empleadoController@store');

    Route::get('/empleados/{rut}', 'empleadoController@show');

    Route::get('empleados/edit/{rut}', 'empleadoController@edit');

    Route::put('/empleados/{empleado}', 'empleadoController@update');

    Route::get('/empleados/delete/{rut}', 'empleadoController@delete');

});

// GRUPO RUTAS RECEPCION //

Route::group(['middleware' => 'recepcionista'], function () {

//RUTAS RECEPCIONISTA

    Route::get('/recepcionista/create', 'recepcionistaController@create');

    Route::post('/recepcionista/create2', 'recepcionistaController@store');

    Route::get('/recepcionista/create2', 'recepcionistaController@create2');

    Route::post('/recepcionista/create4', 'recepcionistaController@store2');

    Route::get('/recepcionista/create4', 'recepcionistaController@create4');

    Route::post('/recepcionista/create3', 'recepcionistaController@store4');

    Route::get('/recepcionista/create3', 'recepcionistaController@create3');

    Route::post('/recepcionista/success', 'recepcionistaController@store3');

    Route::get('/pdf', 'recepcionistaController@pdf');

    Route::get('/recepcionista/search', 'recepcionistaController@search');

    Route::post('/recepcionista/edit', 'recepcionistaController@edit');

    Route::put('recepcionista/search', 'recepcionistaController@anular');

    Route::put('/recepcionista/anulacion-success', 'recepcionistaController@anular');

});

// GRUPO RUTAS BODEGA //

Route::group(['middleware' => 'bodeguero'], function () {

// RUTAS BODEGA

    Route::get('/bodega/search', 'bodegueroController@search');

    Route::post('/bodega/new/', 'bodegueroController@create');

    Route::post('/bodega/search', 'bodegueroController@store');

    Route::get('/bodega/search2', 'bodegueroController@search2');

    Route::post('/bodega/tracking/', 'bodegueroController@nuevoestado');

    Route::post('/bodega/search2', 'bodegueroController@guardarestado');

    Route::get('/bodega/search3', 'bodegueroController@search3');

    Route::post('/bodega/search3', 'bodegueroController@eliminarDeBodega');

    Route::get('/bodega/search4', 'bodegueroController@search4');

    Route::post('/bodega/search4', 'bodegueroController@buscar');

});

// GRUPO RUTAS USUARIO //

Route::group(['middleware' => 'usuario'], function () {

// USUARIO NORMAL

    Route::put('/change/password/', 'usuarioController@update');

    Route::get('/change/password/', function () {
        return view('usuarios.change-password');
    });
    Route::get('/profile', function () {
        return view('usuarios.profile');
    });
    Route::get('/personal', 'personaController@edit');

    Route::put('/personal', 'personaController@update');

    Route::get('/history', 'usuarioController@encomiendas');

    Route::get('/logout', 'usuarioController@logout');

});

// RUTAS ÑE

Route::get('/personas/buscar/{rut}', 'personaController@buscar');

Route::get('/usuarios/buscar/{rut}', 'usuarioController@buscar');

Route::get('sendemail', function () {

    $data = array(
        'name' => 'Intento de mail',
    );
    Mail::send('emails', $data, function ($message){
        $message->to('contactoenvialo@gmail.com')->subject('testing');

    });
});

Route::get('/bodega/busqueda', 'bodegueroController@busquedaAvanzada');

<?php

use App\Http\Controllers\InicioController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;


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

//
Route::get('/', InicioController::class);

// Route::get('/', '[InicioController]:index');

/* if (View::exists('vista2')) {
    Route::get('/', function (){
        return view('vista2');
    });
}else {
    Route::get('/', function (){
        return ('<h1>La vista solicitada no existe</h1>');
});}
 */



//Ejemplo 1 retornando texto
Route::get('/texto', function(){
    return '<h1>Hola Mundo</h1>';
});

//Ejemplo 2 retornando un arreglo
Route::get('/arreglo', function(){
    $arreglo=['lunes, martes, miercoles'];
    return $arreglo;
});
//Ejemplo 2 retornando un arreglo asociativo
Route::get('/arregloass', function(){
    $arregloass=
    [
        'id'=>1,
        'description'=>'Producto_1',
    ];
    return $arregloass;
});

//Ejemplo 3 -incluir parámetros
Route::get('/nombre/{nombre}',function($nombre){
    return '<h2>El nombre es:'.$nombre.'</h2>';
});

//Ejemplo 4 -incluir parámetros por defecto
Route::get('/cliente/{cliente?}',function($cliente='cliente general'){
    return '<h2>El cliente es:'.$cliente.'</h2>';
});

//Ejemplo 5 -redirigir una ruta
Route::get('/ruta1', function(){
    return 'Esta es la vista de la ruta 1';
})->name('rutaNo1');

Route::get('/ruta2', function(){
    // return 'Esta es la vista de la ruta 2';
    return redirect()->route('rutaNo1');
});

//Ejemplo 5 -validaciones
Route::get('/usuario/{usuario}', function ($usuario) {
    return ('El usuario es: '.$usuario);
})->where('usuario', '[A-Za-z]+');





Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

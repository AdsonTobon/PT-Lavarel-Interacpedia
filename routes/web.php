<?php

use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
});
// Route::get('/empleados','\App\Http\Controllers\EmpleadosController@index');
      //Carpeta empleados usando el archivo index que seria nuestra vista

// Route::get('/empleados/create','\App\Http\Controllers\EmpleadosController@create');
//Carpeta empleados usando el archivo create que seria nuestra vista

Route::resource('empleados', 'App\Http\Controllers\EmpleadosController')->middleware('auth');
Auth::routes(['register'=>false,'reset'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

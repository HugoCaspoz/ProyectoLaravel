<?php

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
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;


Route::get('/', [MainController::class, 'inicio'])
->name('inicio');
Route::resource('libros', 'App\Http\Controllers\LibroController');
Auth::routes();


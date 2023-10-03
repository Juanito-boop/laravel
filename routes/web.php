<?php

use App\Http\Controllers\APIAuthSupabaseController;
use App\Http\Controllers\ProductsController;
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

/*
|--------------------------------------------------------------------------
/ GET
|--------------------------------------------------------------------------
*/

// ruta principal
Route::get('/', function () {
    return redirect('home');
});

// ruta home
Route::get('/home', [ProductsController::class, 'index'])
    ->name('home');

// ruta de información de un producto
Route::get('/info/{productoID}', [ProductsController::class, 'info'])
    ->name('info');

// vista dashboard
Route::get('/dashboard', function () {
    return view(view: 'dashboard');
})->name('dashboard');

// vista login email y password
Route::get('/auth/login/em-pass', function () {
    return view(view: 'login-em-pass');
})->name('login-em-pass');

// vista login magic link
Route::get('/auth/login/magic', function () {
    return view(view: 'login-magic');
})->name('login-magic');

// vista de registro
Route::get('/auth/register', function () {
    return view(view: 'register');
})->name('register');

/*
|--------------------------------------------------------------------------
/ POST
|--------------------------------------------------------------------------
*/

// manejo de la información de login email y password
Route::post('/auth/em-pass', [APIAuthSupabaseController::class, 'getTokenEmailPassword'])
    ->name('em-pass-data');

// manejo de la información de login magic link
Route::post('/auth/magic', [APIAuthSupabaseController::class, 'sendMagicLink'])
    ->name('magic-link-data');

// manejo de la información de registro
Route::post('/auth/register', [APIAuthSupabaseController::class, 'signup'])
    ->name('register-data');

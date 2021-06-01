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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('donors', App\Http\Controllers\PlasmaDonorController::class);
Route::post('get-cities-by-state', [App\Http\Controllers\PlasmaDonorController::class, 'getCities'])->name('cities-data');

Route::resource('requests', App\Http\Controllers\RequestPlasmaController::class);



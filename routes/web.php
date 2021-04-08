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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('list', 'App\Http\Controllers\UserController@list');
Route::get('show/{id}', 'App\Http\Controllers\UserController@show');
Route::get('display', 'App\Http\Controllers\UserController@display')->name('display_user');
Route::get('displayAnimals', 'App\Http\Controllers\AnimalController@listAnimals')->name('display_animal');
Route::get('displayAvailableAnimals', 'App\Http\Controllers\AnimalController@listAvailableAnimals')->name('display_available_animals');

use App\Http\Controllers\AnimalController;
Route::resource('animals', AnimalController::class);
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
Route::get('animals/available', 'App\Http\Controllers\AnimalController@listAvailableAnimals')->middleware('auth')->name('display_available_animals');
Route::get('requests/pending', 'App\Http\Controllers\RequestController@listPending')->middleware('auth')->name('display_pending_requests');

Route::patch('requests/pending/update/{id}', 'App\Http\Controllers\RequestController@updateRequestStatus')->middleware('auth')->name('update_request_status');
Route::patch('requests/adoption/{id}', 'App\Http\Controllers\RequestController@updateRequestAdoption')->middleware('auth')->name('request_adoption');

use App\Http\Controllers\AnimalController;
Route::resource('animals', AnimalController::class)->middleware('auth');

use App\Http\Controllers\RequestController;
Route::resource('requests', RequestController::class)->middleware('auth');

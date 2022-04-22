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

Route::redirect('/', 'login');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('categories', App\Http\Controllers\categoryController::class);


Route::resource('items', App\Http\Controllers\itemsController::class);


Route::resource('taxCategories', App\Http\Controllers\tax_categoryController::class);


Route::resource('history', App\Http\Controllers\activityController::class);


Route::resource('profiles', App\Http\Controllers\profileController::class);

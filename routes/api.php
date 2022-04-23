<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('categories', App\Http\Controllers\API\categoryAPIController::class);

Route::get('category', [App\Http\Controllers\API\itemsAPIController::class,'category']);

Route::resource('items', App\Http\Controllers\API\itemsAPIController::class);


Route::resource('tax_categories', App\Http\Controllers\API\tax_categoryAPIController::class);


Route::post('register',[App\Http\Controllers\API\ProfileController::class,'register']);
Route::get('login',[App\Http\Controllers\API\ProfileController::class,'login']);
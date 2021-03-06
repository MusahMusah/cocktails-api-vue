<?php

/*
 * --------------------------------------------------------------------------
 * API Routes
 * --------------------------------------------------------------------------
 * Here is where you can register API routes for your application. These
 * routes are loaded by the RouteServiceProvider within a group which
 * is assigned the "api" middleware group. Enjoy building your API!
 */

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MeController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\IngredientController;

Route::group(['namespace'=> 'Api','middleware' => 'auth:api'], function() {
    Route::post('/checkToken', [AuthController::class, 'checkToken']);
    Route::post('/me', [MeController::class, 'getMe']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // Ingredients Operations
    Route::get('ingredients', [IngredientController::class, 'index']);
    Route::post('ingredients/create', [IngredientController::class, 'store']);
    Route::get('ingredients/edit/{id}', [IngredientController::class, 'show']);
    Route::put('ingredients/{ingredient}', [IngredientController::class, 'update']);
});

Route::group(['namespace'=> 'Api', 'middleware' => 'guest:api'], function() {
    Route::post('/login', [AuthController::class, 'login']);
});
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::post('admin/add/ingredient', 'APIController@addIngredient')->name('ingredients.add');

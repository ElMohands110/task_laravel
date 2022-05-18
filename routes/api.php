<?php

use App\Http\Controllers\ApiTaskController;
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

Route::group(['prefix' => 'my-api'], function () {
    Route::post('new-user', [ApiTaskController::class, 'createUser']);
    Route::post('edit-user-info', [ApiTaskController::class, 'updateUserInfo']);
    Route::post('insert-product', [ApiTaskController::class, 'insertProduct']);
    Route::post('update-product', [ApiTaskController::class, 'updateProduct']);
    Route::post('delete-product', [ApiTaskController::class, 'deleteProduct']);
    Route::get('get-products/{id}', [ApiTaskController::class, 'getOwnerProducts']);
});

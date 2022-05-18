<?php

use App\Http\Controllers\UserController;
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

Route::get('all-users' , [UserController::class, 'getUsers']);
Route::get('add-user' , [UserController::class, 'addUserPage']);
Route::post('store-user' , [UserController::class, 'storeUser'])->name('add-user');

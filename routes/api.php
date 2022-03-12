<?php

use App\Http\Controllers\Api\RoleController;
use App\Models\Role;
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

// Auth Routes
Route::prefix('v1')->group(function () {
    Route::post('login', [App\Http\Controllers\Api\AuthController::class, 'login'])->name('api.login') ;
    Route::middleware('auth:sanctum')->get('logout', [App\Http\Controllers\Api\AuthController::class, 'logout'])->name('api.logout') ;
});



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//Api Version 1

Route::prefix('v1')->group(function () {
    //Roles route
    Route::resource('roles', App\Http\Controllers\Api\RoleController::class);

    //Users Route
    Route::resource('users', App\Http\Controllers\Api\UserController::class);

    Route::resource('admins', App\Http\Controllers\Api\AdminController::class);



});

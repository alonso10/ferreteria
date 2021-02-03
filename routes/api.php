<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GetAllClientController;
use App\Http\Controllers\CreateClientController;
use App\Http\Controllers\UpdateClientController;
use App\Http\Controllers\DeleteClientController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/client', GetAllClientController::class);

Route::post('/client', CreateClientController::class);

Route::put('/client/{id}', UpdateClientController::class);

Route::delete('/client/{id}', DeleteClientController::class);

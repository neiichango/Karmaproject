<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ChoferController;
use App\Http\Controllers\VehiculoController;

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


// http://127.0.0.1:8000/api

Route::group(['prefix' => 'v1'], function () {
    Route::group(['prefix' => 'kalma'], function () {
        // http://127.0.0.1:8000/api/v1/kalma/


        //RUTAS AUTH
        Route::group([
            'prefix' => 'auth'
        ], function ($router) {
            // http://127.0.0.1:8000/api/v1/kalma/auth/login
            Route::post('login', [AuthController::class, 'login']);

            // http://127.0.0.1:8000/api/v1/kalma/auth/register
            Route::post('register', [AuthController::class, 'register']);

            // http://127.0.0.1:8000/api/v1/kalma/auth/logout
            Route::post('logout', [AuthController::class, 'logout']);
        });


        //RUTAS CHOFER
        //http://127.0.0.1:8000/api/v1/kalma/staff/
        Route::group(['prefix' => 'staff'], function ($router) {
            // http://127.0.0.1:8000/api/v1/kalma/staff/all
            Route::get('index', [ChoferController::class, 'index']);
            // http://127.0.0.1:8000/api/v1/kalma/staff/allstaff
            Route::get('all', [ChoferController::class, 'all']);
            // http://127.0.0.1:8000/api/v1/kalma/staff/{id}
            Route::get('/{id}', [ChoferController::class, 'show']);
        });


        //RUTAS categoria
        //http://127.0.0.1:8000/api/v1/kalma/categoria/
        Route::group(['prefix' => 'categoria'], function ($router) {
            // http://127.0.0.1:8000/api/v1/kalma/categoria/index
            Route::get('index', [CategoriaController::class, 'index']);
            // http://127.0.0.1:8000/api/v1/kalma/categoria/{id}
            Route::get('/{id}', [CategoriaController::class, 'show']);
        });


        //RUTAS vehiculo
        Route::group(['prefix' => 'car'], function ($router) {
            // http://127.0.0.1:8000/api/v1/kalma/car/all
            Route::get('all', [VehiculoController::class, 'index']);
            //->middleware(['auth:api','scopes:Administrador']);


        });
    });
});

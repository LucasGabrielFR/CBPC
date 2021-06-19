<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\ACL;

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

Route::prefix('admin')
        ->group(function() {

            /**
             * Routes Posicoes
             */

            Route::resource('posicoes',Admin\PositionController::class);

            /**
             * Routes Jogadores
             */

            Route::resource('jogadores',Admin\PlayerController::class);

            /**
             * Routes Permissões
             */

            Route::resource('permissoes',ACL\PermissionController::class);




        });

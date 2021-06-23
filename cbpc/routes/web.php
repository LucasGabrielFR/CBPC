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
             * Routes Perfis
             */

            Route::resource('perfis',Admin\ProfileController::class);

            /**
             * Routes Permissões
             */

            Route::resource('permissoes',ACL\PermissionController::class);

            /**
             * Permission x Profile
             */

             Route::get('perfis/{id}/permissions',[ACL\PermissionProfileController::class,'permissions'])->name('perfil.permissoes');
             Route::get('perfis/{id}/permissions/add',[ACL\PermissionProfileController::class,'permissionAdd'])->name('perfil.add.permissao');
             Route::post('perfis/{id}/permissions/add',[ACL\PermissionProfileController::class,'permissionStore'])->name('perfil.store.permissoes');



        });

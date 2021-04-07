<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\InicioController;
use App\Http\Controllers\TimesController;
use App\Http\Controllers\CampeonatosController;
use App\Http\Controllers\JogadoresController;
use App\Http\Controllers\RankingsController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\LoginController;

Route::get('/',[InicioController::class,'inicio']);

Route::get('/login', [LoginController::class,'login']);

Route::get('/times', [TimesController::class,'times']);

Route::get('/jogadores', [JogadoresController::class,'jogadores']);

Route::get('/campeonatos', [CampeonatosController::class,'campeonatos']);

Route::get('/rankings', [RankingsController::class,'rankings']);

Route::get('/perfil/{tag}', [PerfilController::class,'perfil']);

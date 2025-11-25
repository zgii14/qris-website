<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;

Route::get('/', [GameController::class, 'home'])->name('home');

Route::get('/game', [GameController::class, 'index'])->name('game.index');

Route::get('/game/stage/{stage}/level/{level}', [GameController::class, 'showLevel'])
    ->name('game.level.show');

Route::post('/game/stage/{stage}/level/{level}', [GameController::class, 'submitLevel'])
    ->name('game.level.submit');

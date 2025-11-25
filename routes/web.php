<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;

Route::get('/', [GameController::class, 'home'])->name('home');

Route::get('/game', [GameController::class, 'index'])->name('game.index');

Route::get('/game/stage/{stage}/level/{level}', [GameController::class, 'showLevel'])
    ->name('game.level.show');

Route::post('/game/stage/{stage}/level/{level}', [GameController::class, 'submitLevel'])
    ->name('game.level.submit');

/* --- halaman konfirmasi pembayaran QRIS untuk unlock level berikutnya --- */
Route::get('/game/unlock/{fromStage}/{fromLevel}/{toStage}/{toLevel}', [GameController::class, 'showUnlock'])
    ->name('game.unlock.show');

Route::post('/game/unlock/{fromStage}/{fromLevel}/{toStage}/{toLevel}', [GameController::class, 'processUnlock'])
    ->name('game.unlock.process');
Route::get('/reset-session', function () {
    session()->flush(); // hapus semua session
    return redirect('/game')->with('status_type', 'success')
                            ->with('status_msg', 'Session game berhasil direset!');
});

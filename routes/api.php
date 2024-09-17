<?php


use App\Http\Controllers\MovementController;
use Illuminate\Support\Facades\Route;

Route::get('/getMovementRanking', [MovementController::class, 'getMovementRanking'])->name('getMovementRanking');


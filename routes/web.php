<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpenRouterController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\MovieController2;

Route::get('/', [App\Http\Controllers\MovieController::class, 'index']);
Route::get('/openrouter', [OpenRouterController::class, 'chat']);
Route::get('/the-loai/{id}', [App\Http\Controllers\MovieController::class, 'getMoviesByGenre']);
Route::get('/movie/{id}', [App\Http\Controllers\MovieController::class, 'detail'])->name('movie.detail');

/* quang */
Route::get('/movie_manager', [MovieController2::class, 'index']);


// Các route phụ trợ
Route::get('/admin/movies/{id}', [MovieController2::class, 'show']);
Route::delete('/admin/movies/{id}', [MovieController2::class, 'destroy']);

// Bỏ chữ admin ở các route phụ
Route::get('/movies/{id}', [MovieController2::class, 'show']);
Route::delete('/movies/{id}', [MovieController2::class, 'destroy']);
Route::post('/timkiem', [MovieController::class, 'search']);


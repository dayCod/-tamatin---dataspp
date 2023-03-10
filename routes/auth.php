<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', function() {
    return view('petugas.auth.login');
})->name('view.login');

Route::get('/register', function() {
    return view('petugas.auth.register');
})->name('view.register');

Route::post('/login', [AuthController::class, 'login'])->name('post.login');
Route::post('/register', [AuthController::class, 'register'])->name('post.register');
Route::get('/logout', [AuthController::class, 'logout'])->name('post.logout');

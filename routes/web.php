<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Petugas\{
    SiswaController,
    DashboardController,
    KelasController,
    PembayaranController,
    PetugasController,
    SppController,
};

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/petugas')->group(function() {
    require __DIR__ . '/auth.php';
    Route::middleware('auth:web')->group(function() {
        Route::get('/', [DashboardController::class, 'index'])->name('petugas.dashboard');
        Route::resource('siswa', SiswaController::class);
        Route::resource('operator', PetugasController::class);
        Route::resource('kelas', KelasController::class);
        Route::resource('spp', SppController::class);
        Route::resource('pembayaran', PembayaranController::class);
    });
});

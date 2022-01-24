<?php

use App\Http\Controllers\ContestRegistController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DonasiController;
use Illuminate\Support\Facades\Auth;
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

require __DIR__.'/auth.php';

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/sayembara', function () {
    return view('sayembara');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/contestRegist', [ContestRegistController::class, 'index'])->name('contestRegistration');

Auth::routes(['verify'=> true]);

Route::get('/donasi/{page?}', [DonasiController::class, 'index'])->name('Donasi');
// Route::get('/donasi/donasi', [DonasiController::class, 'index'])->name('Donasi');

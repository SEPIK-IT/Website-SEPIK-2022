<?php

use App\Http\Controllers\ContestRegistController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DownloadController;
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

Route::get('/', function () {
    return view('index');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/sayembara', function () {
    return view('sayembara');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/registrasi-lomba/{competition}', [ContestRegistController::class, 'index'])
    ->middleware('auth')
    ->name('contestRegistration');

Route::get('/download_sop_human',DownloadController::class.'@downloadhuman')->name('dlhuman');
Route::get('/download_sop_video',DownloadController::class.'@downloadvideo')->name('dlvideo');
Route::get('/download_sop_mashup',DownloadController::class.'@downloadmashup')->name('dlmashup');
Route::get('/download_sop_desain',DownloadController::class.'@downloaddesain')->name('dldesain');


Auth::routes(['verify'=> true]);

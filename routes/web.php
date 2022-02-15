<?php

use App\Http\Controllers\ContestRegistController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\PengmasController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\ZoopikRegistrationController;
use App\Http\Controllers\SayembaraController;
use App\Http\Controllers\Auth\LoginController;
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

require __DIR__ . '/auth.php';

Route::view('/', 'index');
Route::view('/home', 'home')->name('homepage');
Route::view('/sayembara', 'sayembara')->name('sayembara');
Route::get('/pameranVideo', 'App\Http\Controllers\linkController@index');

Route::get('/zoopikRegistration', [ZoopikRegistrationController::class, 'index'])->middleware('auth');
Route::post('/zoopikRegistration', [ZoopikRegistrationController::class, 'store'])->middleware('auth');

Route::view('/splashscreen', 'splashScreen')->middleware('auth');

Route::view('/zoopiksplashscreen', 'zoopikSplashScreen')->middleware('auth');

Route::get('/registrasi-lomba/{competition}', [ContestRegistController::class, 'index'])
    ->middleware('auth')
    ->name('contestRegistration');

Route::get('/download_sop_human', DownloadController::class . '@downloadhuman')->name('dlhuman');
Route::get('/download_sop_video', DownloadController::class . '@downloadvideo')->name('dlvideo');
Route::get('/download_sop_mashup', DownloadController::class . '@downloadmashup')->name('dlmashup');
Route::get('/download_sop_desain', DownloadController::class . '@downloaddesain')->name('dldesain');
Route::get('/download_laporan_orisinalitas', DownloadController::class . '@downloadlaporan')->name('dllaporan');
Route::get('/download_sop_social', DownloadController::class . '@downloadsocial')->name('dlsocial');


Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth');
Route::get('/donasi', [DonationController::class, 'index'])->name('donasi');

Route::get('/donasi/donasi', [DonationController::class, 'donate'])->name('donate.create');
Route::view('/donasi/suwun', 'donasi.suwun');
Route::post('/donasi/donasi', [DonationController::class, 'store'])->middleware('auth');

Route::get('user-dashboard', [UserDashboardController::class, 'index'])->middleware('auth')->name('user-dashboard');

Route::view('social-media-movement', 'social-media-movement')->name('social-media-movement')->middleware('auth');


// Pengmas
Route::get('social-media-movement/pengmas', [PengmasController::class, 'index'])->middleware('auth')->name('social-media-movement.pengmas.index');


Auth::routes(['verify' => true]);

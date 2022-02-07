<?php

use App\Http\Controllers\ContestRegistController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\DownloadController;

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

Route::get('/pameranVideo', 'App\Http\Controllers\linkController@index');

Route::view('/', 'index');
Route::view('/home', 'home');
Route::view('/sayembara', 'sayembara');
Route::get('/pameranVideo', 'App\Http\Controllers\linkController@index');

Route::get('/zoopikRegistration', [ZoopikRegistrationController::class, 'index'])->middleware('auth');
Route::post('/zoopikRegistration', [ZoopikRegistrationController::class, 'store'])->middleware('auth');

Route::view('/splashscreen', 'splashScreen')->middleware('auth');

Route::view('/zoopikSplashScreen', 'zoopikSplashScreen')->middleware('auth');

Route::get('/registrasi-lomba/{competition}', [ContestRegistController::class, 'index'])
    ->middleware('auth')
    ->name('contestRegistration');

Route::get('/download_sop_human', DownloadController::class . '@downloadhuman')->name('dlhuman');
Route::get('/download_sop_video', DownloadController::class . '@downloadvideo')->name('dlvideo');
Route::get('/download_sop_mashup', DownloadController::class . '@downloadmashup')->name('dlmashup');
Route::get('/download_sop_desain', DownloadController::class . '@downloaddesain')->name('dldesain');
Route::get('/download_laporan_orisinalitas', DownloadController::class . '@downloadlaporan')->name('dllaporan');



Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth');
Route::get('/donasi', [DonationController::class, 'index'])->name('donasi');

Route::get('/donasi/donasi', [DonationController::class, 'donate'])->name('donate.create');
Route::view('/donasi/suwun', 'donasi.suwun');
Route::post('/donasi/donasi', [DonationController::class, 'store'])->middleware('auth');

Auth::routes(['verify' => true]);
Route::get('/download_sop_human',DownloadController::class.'@downloadhuman')->name('dlhuman');
Route::get('/download_sop_video',DownloadController::class.'@downloadvideo')->name('dlvideo');
Route::get('/download_sop_mashup',DownloadController::class.'@downloadmashup')->name('dlmashup');
Route::get('/download_sop_desain',DownloadController::class.'@downloaddesain')->name('dldesain');
Route::get('/download_laporan_orisinalitas',DownloadController::class.'@downloadlaporan')->name('dllaporan');

Auth::routes(['verify'=> true]);

Route::get('/donasi/{page?}', [DonationController::class, 'index'])->name('Donasi');
Route::post('/donasi/donasi', [DonationController::class, 'store'])->name('Donasi');
// Route::post('/donasi/admin', [DonationController::class, 'update'])->name('Donasi');

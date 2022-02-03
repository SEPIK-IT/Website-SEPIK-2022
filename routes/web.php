<?php

use App\Http\Controllers\ContestRegistController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\ZoopikRegistrationController;
use App\Http\Controllers\SayembaraController;
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
Route::get('/sayembara/{id}', [SayembaraController::class, 'show'])->middleware('auth');
Route::get('/pameranVideo', 'App\Http\Controllers\linkController@index');

Route::get('/zoopikRegistration', [ZoopikRegistrationController::class, 'index']);
Route::post('/zoopikRegistration', [ZoopikRegistrationController::class, 'store']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/splashscreen', function(){
    return view('splashScreen');
})->middleware('auth');

Route::get('/registrasi-lomba/{competition}', [ContestRegistController::class, 'index'])
    ->middleware('auth')
    ->name('contestRegistration');

Route::get('/download_sop_human',DownloadController::class.'@downloadhuman')->name('dlhuman');
Route::get('/download_sop_video',DownloadController::class.'@downloadvideo')->name('dlvideo');
Route::get('/download_sop_mashup',DownloadController::class.'@downloadmashup')->name('dlmashup');
Route::get('/download_sop_desain',DownloadController::class.'@downloaddesain')->name('dldesain');
Route::get('/download_laporan_orisinalitas',DownloadController::class.'@downloadlaporan')->name('dllaporan');

Auth::routes(['verify'=> true]);
Route::group(['middleware' => 'isAdmin'], function () {
    Route::get('donasi/admin',[DonationController::class, 'admin']);
});

Route::get('/donasi/{page?}', [DonationController::class, 'index'])->name('donasi');
Route::post('/donasi/donasi', [DonationController::class, 'store'])->middleware('auth')->name('Donasi');
// Route::post('/donasi/admin', [DonationController::class, 'update'])->name('Donasi');

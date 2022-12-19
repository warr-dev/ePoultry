<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FanController;
use App\Http\Controllers\FeedingController;
use App\Http\Controllers\WaterController;
use App\Http\Controllers\LightController;

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
    return redirect('/dashboard');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
    Route::get('/feeding', [FeedingController::class,'index'])->name('feeding');
    Route::post('/feeding', [FeedingController::class,'create'])->name('feeding.addtime');
    Route::delete('/feeding/{id}', [FeedingController::class,'destroy'])->name('feeding.delete');

    Route::get('/light', [LightController::class,'index'])->name('light');
    Route::get('/water', [WaterController::class,'index'])->name('water');
    Route::get('/settingup', [WaterController::class,'setup'])->name('water.settank');
    Route::put('/water', [WaterController::class,'update'])->name('water.update');
    Route::get('/fan', [FanController::class,'index'])->name('fan');
    Route::put('/fan/sensor/set',[FanController::class,'setFanConf'])->name('dhtconf.update');
    Route::put('/lightconf', [LightController::class,'update'])->name('lightconf.update');
});


require __DIR__.'/auth.php';

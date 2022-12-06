<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedingController;

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

    // Route::get('/light', [DashboardController::class,'light'])->name('light');
    // Route::get('/fan', [DashboardController::class,'fan'])->name('fan');
});


require __DIR__.'/auth.php';

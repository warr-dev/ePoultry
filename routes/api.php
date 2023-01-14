<?php

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/feeding/conf',[ApiController::class,'getFeedingConf']);
Route::post('/feeding/conf',[ApiController::class,'setFeedingConf']);
Route::get('/feed/setmode',[ApiController::class,'setFeederMode']);
Route::get('/checkfeedmode',[ApiController::class,'checkfeedmode']);
Route::post('/feeder',[ApiController::class,'feeder']);
Route::get('/setmode',[ApiController::class,'setmode']);
Route::post('/tank/setheight',[ApiController::class,'setheight']);
Route::post('/feeder/conf',[ApiController::class,'setfeedertankheight']);

Route::post('/sethdt',[ApiController::class,'sethdt']);
Route::post('/setlight',[ApiController::class,'setlight']);
Route::post('/setfan',[ApiController::class,'setfan']);
Route::get('/getdhtconf',[ApiController::class,'getdhtconf']);
Route::post('/setwaterlog',[ApiController::class,'setwaterlog']);
Route::get('/checkwatermode',[ApiController::class,'checkWaterMode']);
Route::get('/getwaterconf',[ApiController::class,'getwaterconf']);
Route::post('/settanklevel',[ApiController::class,'settanklevel']);

Route::get('/getwatererlevel',[ApiController::class,'getwatererlevel']);
Route::get('/setwatererlevel',[ApiController::class,'setwatererlevel']);
Route::post('/calwaterer',[ApiController::class,'calwaterer']);

Route::get('/getlightconf',[ApiController::class,'getlightconf']);
Route::get('/getheatstatus',[ApiController::class,'getheatstatus']);



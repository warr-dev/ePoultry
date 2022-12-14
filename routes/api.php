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


Route::get('/check',[ApiController::class,'check']);
Route::get('/checkmode',[ApiController::class,'checkmode']);
Route::get('/setmode',[ApiController::class,'setmode']);
Route::post('/tank/setheight',[ApiController::class,'setheight']);

Route::get('/setlight',[ApiController::class,'setlight']);
Route::get('/setfan',[ApiController::class,'setfan']);
Route::get('/sethdt',[ApiController::class,'sethdt']);
Route::get('/getdhtinterval',[ApiController::class,'getdhtconf']);


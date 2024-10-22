<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ApiWorkerController;

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


Route::get('workers', [ApiWorkerController::class,'index']);
Route::get('workers/{worker}', [ApiWorkerController::class,'show']);
Route::post('workers', [ApiWorkerController::class,'store']);
Route::patch('workers/{worker}', [ApiWorkerController::class,'update']);
Route::delete('workers/{worker}', [ApiWorkerController::class,'destroy']);

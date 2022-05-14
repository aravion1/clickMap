<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\ClickController;

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
Route::post('/site/{method}', [SiteController::class, 'indexAction']);
Route::post('/click/{method}', [ClickController::class, 'indexAction']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

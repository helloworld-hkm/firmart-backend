<?php

use App\Http\Controllers\ItemsController;
use App\Http\Controllers\StocksController;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\TypesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('items',ItemsController::class);
Route::apiResource('types',TypesController::class);
Route::apiResource('stocks',StocksController::class);
Route::apiResource('transactions',TransactionsController::class);

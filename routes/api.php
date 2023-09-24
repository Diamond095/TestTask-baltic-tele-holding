<?php

use App\Http\Controllers\API\DeleteProductController;
use App\Http\Controllers\API\PostProductController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\UpdateProductController;
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
Route::get('/product/{id}', ProductController::class);
Route::put('/product/update/{id}',UpdateProductController::class);
Route::delete('/product/delete/{id}',DeleteProductController::class);
Route::post('/product/add',PostProductController::class);

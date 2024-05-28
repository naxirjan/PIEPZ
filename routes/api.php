<?php

use App\Http\Controllers\Admin\Users\UserController;
use App\Http\Controllers\APIs\APIsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Partner\ProductPanelController;

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


Route::post('addProduct',[APIsController::class,'productStoreApi']);
Route::post('AddOrder',[APIsController::class,'insertOrderApi']);
Route::post('updateOrderApi',[APIsController::class,'updateOrderApi']);

//Route::post('addProduct',[ProductController::class,'productStoreApi']);
//Route::post('AddOrder',[ProductPanelController::class,'insertOrderApi']);
//Route::post('updateOrderApi',[ProductPanelController::class,'updateOrderApi']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('users-complete-list', [UserController::class, 'index']);

<?php

use App\Http\Controllers\Api\ApiAdminController;
use App\Http\Controllers\Api\ApiCartController;
use App\Http\Controllers\Api\ApiCommentController;
use App\Http\Controllers\Api\ApiOrderController;
use App\Http\Controllers\Api\ApiRateController;
use App\Http\Controllers\Api\ApiUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::fallback(function () {
    return response()->json([
        'message' => 'Page Not Found!'
    ],404);

});


// Public routes
Route::group([], function() {
    Route::post('/register', [ApiUserController::class, 'register']);
    Route::post('/login', [ApiUserController::class, 'login']);
});

// Protected routes
Route::group(['middleware' => 'auth:sanctum'], function() {
    Route::apiResource('orders', ApiOrderController::class);
    Route::apiResource('carts', ApiCartController::class);
    Route::apiResource('comments', ApiCommentController::class);
    Route::post('rateings', [ApiRateController::class, 'store']);
    Route::put('rateings/{rate}', [ApiRateController::class, 'update']);
    Route::post('/logout', [ApiUserController::class, 'logout']);
});

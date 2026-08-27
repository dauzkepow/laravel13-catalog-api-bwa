<?php

use App\Http\Controllers\Api\V1\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// dengan prefix V1, semua routes jadi /api/v1/products
Route::prefix('v1')->group(function () {
    // apiResource auto generate 5 route: index, show, store, update, destroy
    Route::apiResource('products', ProductController::class);
});

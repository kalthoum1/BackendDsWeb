<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemsController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SCategoryController;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
//Category
Route::get("/categories",[CategoryController::class,"index"]);
Route::post("/categories",[CategoryController::class,"store"]);
Route::get("/categories/{id}",[CategoryController::class,"show"]);
Route::delete("/categories/{id}",[CategoryController::class,"destroy"]);
Route::put("/categories/{id}",[CategoryController::class,"update"]);
//Scategory
Route::get("/s_categories",[SCategoryController::class,"index"]);
Route::post("/s_categories",[SCategoryController::class,"store"]);
Route::get("/s_categories/{id}",[SCategoryController::class,"show"]);
Route::delete("/s_categories/{id}",[SCategoryController::class,"destroy"]);
Route::put("/s_categories/{id}",[SCategoryController::class,"update"]);

Route::apiResource('categories', CategoryController::class);
Route::apiResource('scategories', SCategoryController::class);
Route::apiResource('customers', CustomerController::class);
Route::apiResource('orders', OrderController::class);
Route::apiResource('order-items', OrderItemsController::class);
Route::apiResource('payments', PaymentsController::class);
Route::apiResource('products', ProductController::class);

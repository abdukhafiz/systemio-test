<?php

use App\Http\Controllers\API\v1\PriceController;
use App\Http\Controllers\API\v1\PurchaseController;
use Illuminate\Support\Facades\Route;

Route::post('calculate-price', [PriceController::class, 'calculate']);
Route::post('purchase', [PurchaseController::class, 'purchase']);

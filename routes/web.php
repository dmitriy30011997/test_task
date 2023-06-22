<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PizzaController;

Route::get('/', [PizzaController::class, 'index']);
Route::get('/cart', [PizzaController::class, 'cart']);
Route::post('/cart', [PizzaController::class, 'addToCart']);
Route::post('/cart/remove', [PizzaController::class, 'removeFromCart']);
Route::get('/checkout', [PizzaController::class, 'checkout']);
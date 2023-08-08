<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DinosaurController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [DinosaurController::class, "Index"]);

Route::get('/create', [DinosaurController::class, "Create"]);

Route::post('/create', [DinosaurController::class, "Store"]);
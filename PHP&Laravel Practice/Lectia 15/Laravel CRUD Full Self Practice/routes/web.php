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

Route::get('/', [DinosaurController::class, "Index"]) -> name('dinosaur.index');

Route::get('/create', [DinosaurController::class, "Create"]);

Route::post('/create', [DinosaurController::class, "Store"]);

Route::get("/dinosaur/{id}", [DinosaurController::class, "DinosaurInfo"]);

Route::get('/update', [DinosaurController::class, "UpdatePrepare"]);

Route::post('/update', [DinosaurController::class, "UpdateForm"]);

Route::put('/update', [DinosaurController::class, "UpdateDino"]);

Route::get('/delete/{id}', [DinosaurController::class, "DeletePrepare"]);

Route::delete('/delete', [DinosaurController::class, "DeleteDino"]);
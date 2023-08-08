<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Models\File;

// -> middleware("auth") - functie ce ne permite sa intram pe o pagina doar daca suntem autentificati
Route::get("/", [FileController::class, "Index"]) -> middleware("auth");

Route::post("/", [FileController::class, "StoreFile"]);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

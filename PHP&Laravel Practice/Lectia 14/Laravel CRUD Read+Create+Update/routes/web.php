<?php

use Illuminate\Support\Facades\Route;

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

// importam clasa Item din Models
use App\Models\Item;

// importam clasa ItemController din sursa specificata
use App\Http\Controllers\ItemController;

// !important: schimbam DB_PORT, DB_DATABASE din .env
// !important: ne uitam la app->Models->Item.php
// !important: ne uitam la app->Http->Controllers->ItemController.php

// Eloquent Models - metoda de a scrie SQL in Laravel
// tablou - vector(are [...])
// tabel - forma de organizare a informatiei in BD

// la accesarea adresei .../, vom accesa clasa ItemController importata de mai sus si vom apela functia Index()
Route::get('/', [ItemController::class, "Index"]);

// la accesarea adresei .../create (cu metoda GET), vom accesa clasa ItemController importata de mai sus si vom apela functia Create()
Route::get("/create", [ItemController::class, "Create"]);

// la accesarea adresei .../create (cu metoda POST), vom accesa clasa ItemController importata de mai sus si vom apela functia Store()
Route::post("/create", [ItemController::class, "Store"]);

// la accesarea adresei .../item/(un oarecare id) (cu metoda POST), vom accesa clasa ItemController 
// importata de mai sus si vom apela functia Item()
Route::get("/item/{id}", [ItemController::class, "Item"]);

// la accesarea adresei .../update (cu metoda get), vom accesa clasa ItemController importata de mai sus si vom apela functia Update()
Route::get("/update", [ItemController::class, "Update"]);

// la accesarea adresei .../update (cu metoda post), vom accesa clasa ItemController importata de mai sus si vom apela functia UpdateItem()
Route::post("/update", [ItemController::class, "UpdateItem"]);

// la accesarea adresei .../update (cu metoda put), vom accesa clasa ItemController importata de mai sus si vom apela functia EditItem()
Route::put("/update", [ItemController::class, "EditItem"]);
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

// !important: schimbam DB_PORT, DB_DATABASE din .env
// !important: ne uitam la app->Models->Item.php
Route::get('/', function() {
    // Eloquent Models - metoda de a scrie SQL in Laravel
    // tablou - vector(are [...])
    // tabel - forma de organizare a informatiei in BD

    // $items = Item::all(); // Select * from items

    // $items = Item::where("item_price", ">", 1000)->get();

    // $items = Item::where("item_category", "Auto")
    //     -> orWhere("item_category", "Food")
    //     -> get();

    // $items = Item::select("*") -> orderBy("item_price", "desc") -> get();

    // $items = Item::select("*") -> orderBy("item_name", "asc") -> get();

    $item = Item::select("*") -> first(); // ne va selecta primul element din tabel

    // $items = Item::select("*") -> limit(2) -> get(); // ne va selecta primele 2 elemente din tabel

    // $items = Item::select("*") -> where("item_category", "like", "%o%") -> get();

    $categories = ["Auto", "Gadget"];

    // $items = Item::whereIn("item_category", $categories) -> get();

    // $items = Item::whereNotIn("item_category", $categories) -> get();

    $items = Item::whereBetween("item_price", [0, 5000]) -> get();

    return view('index', [
        "items" => $items,
        "itm" => $item
    ]);
});
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

Route::get('/', function () {
    $location = "Chisinau, Moldova";
    $fullname = "Chad D";
    $friends = [
        ["name" => "Big Boy", "email" => "big@email.com"], 
        ["name" => "Small Boy", "email" => "small@email.com"],
        ["name" => "Lil Boy", "email" => "lil@email.com"]
    ];
    // transmitem in index o variabila (user) cu o valoare (de User123)
    return view('index', [
        // metoda 1
        // "user" => "Skater001",
        // "password" => "Moldova01"

        // metoda 2
        "loc" => $location,
        "name" => $fullname,
        "friends" => $friends
    ]);
        // metoda 3
        // -> with("user", "User123") 
        // -> with("password", "*******");
});


// Creati un view nou, creati o ruta pentru view nou, afisati in view o variabila text, numar, tablou asociativ, boolean
Route::get('/task-one', function () {
    $number = 888;
    $text = "Chinese lucky number";
    $booleanVal = true;
    $chineseCars = ["Haval", "Chery", "BYD", "JAC", "Baojun"];
    $tableAssoc = [
        ["dynasty" => "Sui Dynasty", "period" => "581-618"],
        ["dynasty" => "Tang Dynasty", "period" => "618-907"],
        ["dynasty" => "Song Dynasty", "period" => "960-1279"],
        ["dynasty" => "Yuan Dynasty", "period" => "1271-1368"],
        ["dynasty" => "Ming Dynasty", "period" => "1368-1644"],
        ["dynasty" => "Qing Dynasty", "period" => "1636-1912"],
    ];

    return view('task-one', [
        "number" => $number,
        "text" => $text,
        "booleanVal" => $booleanVal,
        "chineseDynasties" => $tableAssoc,
        "chineseCars" => $chineseCars
    ]);
});

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// vom folosi clasa Item din path-ul specificat
use App\Models\Item;

// php artisan make:controller ItemController
class ItemController extends Controller
{
    public function Index() {
        // selectam toate datele din tabelul de date(Items)
        $items = Item::all();

        return view("index", ["items" => $items]);
    }

    public function Create() {
        return view("create");
    }

    public function Store(Request $request) {
        // validarea datelor ce vin din Request
        $request -> validate([
            // | - and  
            "item_name" => "required|string|min:3|max:255",
            // la in:Food,Auto,Gadget nu trebuie sa utilizam spatiu! (se considera caracter)
            "item_category" => "required|in:Food,Auto,Gadget",
            "item_price" => "required|numeric|min:0"
        ],
        [
            // in stanga se afla parametrul obiectului care nu este respectat in timpul validarii
            // in partea dreapta se afla textul mesajului de eroare primit la incalcarea validarii 
            "item_name.required" => "Name is required!",
            "item_name.string" => "Name must be text!",
            "item_name.min" => "Name must have at least 3 characters",
            "item_name.max" => "Name must have less than 255 characters",

            "item_category.required" => "Category is required!",
            "item_category.in" => "Category must be Food, Auto or Gadget!",

            "item_price.required" => "Price is required!",
            "item_price.string" => "Price must be numeric!",
            "item_price.min" => "price must be at least 1$!"
        ]);

        // functie predefinita care va lua tabelul si coloanele din Model(Item) si va insera valori in acestea
        Item::create($request->all());

        // dupa create vom transmite o variabila success ce va avea valoarea Item added successfuly
        return redirect("/") -> with("success", "Item added successfuly!");
        // o alta sintaxa ce va face fix acelasi lucru (aceasta nu va lucra insa la redirect)
        // deoarece sintaxa presupune transmiterea unui mesaj prin -> with()
        // return redirect("/", ["success" => "Item added successfuly!"]);
    }

    // Aceeasi ca si functia de mai jos
    // public function Item(Request $request) {
    //     return $request -> id;
    // }

    // orice varaibila transmitem in aceasta functie, aceasta va fi id-ul trimis 
    public function Item($id) {
        // vom primi in $item elementul din baza de date cu id-ul = $id
        $item = Item::find($id);
        // sintaxa de mai sus este aceeasi ca urmatoarea de mai jos
        // $item = Item::where("item_id", $id) -> first();
        // first() - metoda similara cu LIMIT 1 din SQL

        if ($item) {
            return view("item", ["item" => $item]);
        } else {
            return response() -> view("errors.404", [], 404);
        }
    }

    public function Update() {
        $items = Item::all();
        return view("update", ["items" => $items]);
    }

    public function UpdateItem(Request $request) {
        $item = Item::where('item_id', $request -> item_id) -> first();

        if ($item) {
            return view("item_update", ["item" => $item]);
        } else {
            return response() -> view("errors.404", [], 404);
        }
    }

    public function EditItem(Request $request) {
        // findOrFail - metoda prin care putem cauta elementul
        // daca il primim il vom salva in variabila $item
        // in caz contrar, primim eroare de la Laravel
        $item = Item::findOrFail($request -> item_id);
        // sintaxa de mai sus este aceeasi ca urmatoarea de mai jos
        // $item = Item::where("item_id", $request -> item_id) -> first();
        // first() - metoda similara cu LIMIT 1 din SQL


        // validam elementul inainte de actualizare
        $request -> validate([
            // | - and  
            "item_name" => "required|string|min:3|max:255",
            // la in:Food,Auto,Gadget nu trebuie sa utilizam spatiu! (se considera caracter)
            "item_category" => "required|in:Food,Auto,Gadget",
            "item_price" => "required|numeric|min:0"
        ],
        [
            // in stanga se afla parametrul obiectului care nu este respectat in timpul validarii
            // in partea dreapta se afla textul mesajului de eroare primit la incalcarea validarii 
            "item_name.required" => "Name is required!",
            "item_name.string" => "Name must be text!",
            "item_name.min" => "Name must have at least 3 characters",
            "item_name.max" => "Name must have less than 255 characters",

            "item_category.required" => "Category is required!",
            "item_category.in" => "Category must be Food, Auto or Gadget!",

            "item_price.required" => "Price is required!",
            "item_price.string" => "Price must be numeric!",
            "item_price.min" => "price must be at least 1$!"
        ]);

        // daca totul este ok, schimbam valorile elementului $item(cu cele introduse de utilizator in input)
        $item -> item_name = $request -> input("item_name");
        $item -> item_category = $request -> input("item_category");
        $item -> item_price = $request -> input("item_price");

        // save() - metoda ce ne permite sa salvam modificarile efectuate
        $item -> save();

        // dupa create vom transmite o variabila success ce va avea valoarea Item added successfuly
        return redirect("/") -> with("success", "Item updated successfuly!");
    }
}

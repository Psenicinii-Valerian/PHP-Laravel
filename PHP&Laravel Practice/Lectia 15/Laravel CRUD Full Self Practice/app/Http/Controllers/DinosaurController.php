<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dinosaur;

class DinosaurController extends Controller
{
    public function Index(Request $req) {
        $search = $req -> search;
        $species = $req -> filter_dino_species;
        $sortBy = $req -> sort_dino_param;
    
        $query = Dinosaur::query();
        $dinosaurs = Dinosaur::all();
        
        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->whereRaw("LOWER(species) LIKE ?", ["%" . strtolower($search) . "%"])
                  ->orWhereRaw("LOWER(type) LIKE ?", ["%" . strtolower($search) . "%"]);
            });
        }
    
        if (!empty($species)) {
            $query->where('species', $species);
        }
    
        if ($sortBy === 'height asc') {
            $query->orderBy('height', 'asc');
        } elseif ($sortBy === 'weight asc') {
            $query->orderBy('weight', 'asc');
        } elseif ($sortBy === 'height desc') {
            $query->orderBy('height', 'desc');
        } elseif ($sortBy === 'weight desc') {
            $query->orderBy('weight', 'desc');
        }
    
        $dinosaursSearched = $query->paginate(3);
        
        return view("index", [
            "dinosaurs" => $dinosaurs, 
            "dinosaursSearched" => $dinosaursSearched,
        ]);
    }

    public function Create() {
        return view("create");
    }

    public function Store(Request $req) {
        $req -> validate([
            "species" => "required|string|min:2|max:255",
            "type" => "required|in:Herbivore,Carnivore",
            "height" => "required|numeric|min:0.3",
            "weight" => "required|numeric|min:0.3",
            "color" => "required|string|min:2|max:255",
            "img" => "required|string|min:2|max:255",
        ],
        [
            "species.required" => "Species is required!",
            "species.string" => "Species has to be a text value!",
            "species.min" => "Species has to be at least 2 characters long!",
            "species.max" => "Species has to be less than 255 characters long!",

            "type.required" => "Type is required!",
            "type.in" => "Type has to be either Carnivore or Herbivore!",

            "height.required" => "Height is required!",
            "height.numeric" => "Height has to be a numeric value!",
            "height.min" => "Height has to be at leat 0.3m!",

            "weight.required" => "Weight is required!",
            "weight.numeric" => "Weight has to be a numeric value!",
            "weight.min" => "Weight has to be at leat 0.3m!",

            "color.required" => "Color is required!",
            "color.string" => "Color has to be a text value!",
            "color.min" => "Color has to be at least 2 characters long!",
            "color.max" => "Color has to be less than 255 characters long!",

            "img.required" => "Image link is required!",
            "img.string" => "Image link has to be a text value!",
            "img.min" => "Image link has to be at least 2 characters long!",
            "img.max" => "Image link has to be less than 255 characters long!",
        ]);

        Dinosaur::create($req->all());

        return redirect("/") -> with("success_msg", "Item added successfully!");
    }

    public function DinosaurInfo($id) {
        $dinosaur = Dinosaur::find($id);

        if ($dinosaur) {
            return view("dinosaur", ["dinosaur" => $dinosaur]);
        } else {
            return response() -> view("/errors/404", [], 404);
            }
    }

    public function UpdatePrepare() {
        $dinosaurs = Dinosaur::all();
        return view("update", ["dinosaurs" => $dinosaurs]);
    }

    public function UpdateForm(Request $req) {
        $dinosaur = Dinosaur::find($req -> id);

        if ($dinosaur) {
            return view("update_dino", ["dinosaur" => $dinosaur]);
        } else {
            return response() -> view("errors.404", [], 404);
        }
    }

    public function UpdateDino(Request $req) {
        $dinosaur = Dinosaur::findOrFail($req -> id);

        $req -> validate([
            "species" => "required|string|min:2|max:255",
            "type" => "required|in:Herbivore,Carnivore",
            "height" => "required|numeric|min:0.3",
            "weight" => "required|numeric|min:0.3",
            "color" => "required|string|min:2|max:255",
            "img" => "required|string|min:2|max:255",
        ],
        [
            "species.required" => "Species is required!",
            "species.string" => "Species has to be a text value!",
            "species.min" => "Species has to be at least 2 characters long!",
            "species.max" => "Species has to be less than 255 characters long!",

            "type.required" => "Type is required!",
            "type.in" => "Type has to be either Carnivore or Herbivore!",

            "height.required" => "Height is required!",
            "height.numeric" => "Height has to be a numeric value!",
            "height.min" => "Height has to be at leat 0.3m!",

            "weight.required" => "Weight is required!",
            "weight.numeric" => "Weight has to be a numeric value!",
            "weight.min" => "Weight has to be at leat 0.3m!",

            "color.required" => "Color is required!",
            "color.string" => "Color has to be a text value!",
            "color.min" => "Color has to be at least 2 characters long!",
            "color.max" => "Color has to be less than 255 characters long!",

            "img.required" => "Image link is required!",
            "img.string" => "Image link has to be a text value!",
            "img.min" => "Image link has to be at least 2 characters long!",
            "img.max" => "Image link has to be less than 255 characters long!",
        ]);

        $dinosaur -> species = $req -> input("species");
        $dinosaur -> type = $req -> input("type");
        $dinosaur -> weight = $req -> input("weight");
        $dinosaur -> height = $req -> input("height");
        $dinosaur -> color = $req -> input("color");
        $dinosaur -> img = $req -> input("img");

        $dinosaur -> save();

        return redirect("/") -> with("success_msg", "Item updated successfully!");
    }

    public function DeletePrepare($id) {
        $dinosaur = Dinosaur::findOrFail($id);
        return view("delete", ["id" => $id, "dinosaur" => $dinosaur]);
    }

    public function DeleteDino(Request $req) {
        $id = $req -> id;
        Dinosaur::destroy($id);
        return redirect("/") -> with("success_msg", "Item deleted successfully!");
    }
}

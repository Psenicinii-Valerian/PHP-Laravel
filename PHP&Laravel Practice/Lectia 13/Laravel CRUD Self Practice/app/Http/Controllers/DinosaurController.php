<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dinosaur;

class DinosaurController extends Controller
{
    public function Index() {
        $dinosaurs = Dinosaur::all();

        return view("index", ["dinosaurs" => $dinosaurs]);
    }

    public function Create() {
        return view("create");
    }

    public function Store(Request $request) {
        $request -> validate([
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

        Dinosaur::create($request->all());

        return redirect("/") -> with ("success_msg", "Item added successfully!");
    }
}

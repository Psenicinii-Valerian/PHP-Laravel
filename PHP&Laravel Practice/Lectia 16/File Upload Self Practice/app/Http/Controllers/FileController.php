<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;

class FileController extends Controller
{
    public function Index() {
        $files = File::paginate(2);

        return view("index", ["files" => $files]);
    }

    public function StoreFilesForm() {
        return view("add_file");
    }
    
    public function StoreFiles(Request $req) {
        $req -> validate([
            "file" => "required|mimes:txt,gif,pdf,docx,png,jpg,jpeg|max:2048",
            "author" => "required|string|min:5",
            "description" => "required|string|min:3",
        ],
        [
            "file.required" => "File is a required field!",
            "file.mimes" => "Entered file can only have the extensions: txt,gif,pdf,docx,png,jpg,jpeg!",
            "file.max" => "Entered file can have maximum 2Mb size!",

            "author.required" => "Author is a required field!",
            "author.string" => "Author has to be a text value!",
            "author.min" => "Author's name must be at least 5 characters length!",

            "description.required" => "Description is a required field!",
            "description.string" => "Description has to be a text value!",
            "description.min" => "Description's name must be at least 3 characters length!",
        ]);

        $file = $req -> file("file");
        $fileName = time() . "_" . $file -> getClientOriginalName();
        $filePath = $file -> storeAs("uploads", $fileName);
        $fileAuthor = $req -> author;
        $fileDescription = $req -> description;

        File::create([
            "path" => $filePath,
            "name" => $fileName,
            "author" => $fileAuthor,
            "description" => $fileDescription
        ]);

        return redirect("/") -> with("success_message", "File uploaded successfuly!");
    }
}

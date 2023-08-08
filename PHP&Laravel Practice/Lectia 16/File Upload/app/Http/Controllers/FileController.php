<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;

class FileController extends Controller
{
    public function Index() {
        $files = File::paginate(2);
        // return $files;
        return view("index", ["files" => $files]);
    }

    public function StoreFile(Request $req) {
        $req -> validate([
            // required- campul dat este obligator sa fie specificat
            // mimes:png,jpg,jpeg,gif,pdf,doc,docx,txt - doar tipurile date de fisiere vor fi valide
            // max - dimensiunea maxima a fisierului incarcat(in kb - 2048)
            "file" => "required|mimes:png,jpg,jpeg,gif,pdf,doc,docx,txt|
                       max:2048"
        ]);

        // file(denumirea inputului) - functie speciala care ne permite sa apelam un fisier(un input de tip file)
        $file = $req -> file("file");
        // getClientOriginalName() - functie ce apeleaza denumirea fiserului pe care noi l-am incarcat(acel input de tip file)
        $newFileName = time() . "_" . $file -> getClientOriginalName();
        // storeAs("denumirea mapei unde vom salva fisierul", numele fisierului)
        // *fisierul se va salva in storage -> app -> *denumirea mapei*
        $filePath = $file -> storeAs("uploads", $newFileName);

        // salvam in BD fisierul cu valoarea coloanei "path" = $filePath
        File::create([  
            "path" => $filePath
        ]);

        // ne intoarcem inapoi la main page
        return redirect("/");
    }
}

<?php
    $connection = new PDO("mysql:host=localhost;port=4000;dbname=giphy_copy", "root", "");
    $sql = "SELECT * FROM gifs";
    $stmt = $connection -> prepare($sql);
    $stmt -> execute();
    $files = $stmt -> fetchAll(PDO::FETCH_ASSOC);

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $msg = "";
        $successMsg = "";
        if (!empty($_FILES["file"])) {
            $file = $_FILES["file"]; 
            
            if ($file["error"] === 0) {
                if ($file["size"] < 20000000) {
                    // $file["tmp_name"] - property to get the file path
                    $filePath = $file["tmp_name"]; 
                    $fileName = $file["name"];
                    // explode() - functie care ne permite sa transformam un string intr-un tablou de stringuri(cuvinte)
                    // separand un string pe baza unui anumit simbol (split())
                    $fileExt = explode(".", $fileName)[sizeof(explode(".", $fileName)) - 1];
                    $allowedTypes = ["gif", "webp"];
                    
                    // in_array - functie ce cauta stringul_1 in stringul_2 (primul cuv in al doilea) 
                    if (in_array($fileExt, $allowedTypes)) {
                        $uniqueName = uniqid() . $fileName;
                        // move_uploaded_file() - metoda care ne permite sa transferam un fisier dintr-o mapa intr-o alta mapa
                        // (din primul parametru in al doilea)
                        move_uploaded_file($filePath, "storage/" . $uniqueName);
                        $successMsg = "Gif uploaded";
                        // curatam POST-ul pentru ca la refresh-ul paginii fisierul incarcat sa fie sters
                        // (acesta nu va mai ramane in memoria server-ului)
                        $_POST = [];
                        $sql = "INSERT INTO gifs (gif) VALUES (?)";
                        $stmt = $connection -> prepare($sql);
                        $stmt -> execute([$uniqueName]);
                        $successMsg .= " and registered in DB";
                    } else {
                        $msg = "File type not allowed";
                    }
                } else {
                    $msg = "File too large!";
                }
            } else {
                $msg = "Error on file upload!";
            }
        }
        
        if (!empty($successMsg)) {
            echo "<p id='success-msg'>$successMsg</p>";
        }

        if (!empty($msg)) {
            echo "<p id='error'>$msg</p>";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* stilizarea la input de tip file functioneaza pt ca ascundem inputul si stilizam label-ul */
        /* in interiorul caruia se afla inputul */
        form label {
            background-color: black;
            color: white;
            padding: 10px;
        }

        form label input {
            display: none;
        }
    </style>
</head>
<body>
    <div class="upload-file">
        <h1>Cloud System</h1>
        <!-- enctype="multipart/form-data" - atribut care ne permite incarcarea fisierului prin formular -->
        <!-- enctype="multipart/form-data" - atribut care specifica metofa de criptare a datelor atunci cand -->
        <!-- datele vor fi transmise la server -->
        <form action="./index.php" method="POST" enctype="multipart/form-data">
            <!-- multiple - atribut ce ne specifica faptul ca acest input returneaza mai multe fisiere -->
            <label for="file">Upload file<input type="file" name="file" id="file"></label>
            <button type="sumbit">Save</button>
        </form>
    </div>
   
    <h3 class="gif-msg">Available gifs</h3>
    <div class="gifs">
        <?php
            foreach($files as $row) {
                echo "<div class='gif'>
                        <img src = storage/$row[gif]> 
                        <a href='storage/$row[gif]' download>Download gif</a>
                      </div>";
            }
        ?>
    </div>
</body>
</html>
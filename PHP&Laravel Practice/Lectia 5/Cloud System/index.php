<?php
    $connection = new PDO("mysql:host=localhost;port=4000;dbname=cloud_system", "root", "");
    $sql = "SELECT * FROM files";
    $stmt = $connection -> prepare($sql);
    $stmt -> execute();
    $files = $stmt -> fetchAll(PDO::FETCH_ASSOC);

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $msg = "";
        $successMsg = "";
        if (!empty($_FILES["file"])) {
            $file = $_FILES["file"];
            // print_r($file); - pentru a vedea proprietatile tabloului asociativ $file (functioneaza si la $_FILES)
            
            if ($file["error"] === 0) {
                if ($file["size"] < 20000000) {
                    // $file["tmp_name"] - property to get the file path
                    $filePath = $file["tmp_name"]; 
                    $fileName = $file["name"];
                    // explode() - functie care ne permite sa transformam un string intr-un tablou de stringuri(cuvinte)
                    // separand un string pe baza unui anumit simbol (split())
                    $fileExt = explode(".", $fileName)[sizeof(explode(".", $fileName)) - 1];
                    $allowedTypes = ["jpg", "jpeg", "pdf", "png", "gif", "txt"];
                    
                    // in_array - functie ce cauta stringul_1 in stringul_2 (primul cuv in al doilea) 
                    if (in_array($fileExt, $allowedTypes)) {
                        $uniqueName = uniqid() . $fileName;
                        // move_uploaded_file() - metoda care ne permite sa transferam un fisier dintr-o mapa intr-o alta mapa
                        // (din primul parametru in al doilea)
                        move_uploaded_file($filePath, "storage/" . $uniqueName);
                        $successMsg = "File uploaded";
                        // curatam POST-ul pentru ca la refresh-ul paginii fisierul incarcat sa fie sters
                        // (acesta nu va mai ramane in memoria server-ului)
                        $_POST = [];
                        $sql = "INSERT INTO files (file) VALUES (?)";
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
    <h1>Cloud System</h1>
    <!-- enctype="multipart/form-data" - atribut care ne permite incarcarea fisierului prin formular -->
    <!-- enctype="multipart/form-data" - atribut care specifica metoda de criptare a datelor atunci cand -->
    <!-- datele vor fi transmise la server -->
    <form action="./index.php" method="POST" enctype="multipart/form-data">
        <!-- multiple - atribut ce ne specifica faptul ca acest input returneaza mai multe fisiere -->
        <label for="file">Upload file<input type="file" name="file" id="file"></label>
        <button type="sumbit">Save</button>
    </form>
    <h3>Available files</h3>
    <?php
        foreach($files as $row) {
            echo "<a href='storage/$row[file]' download>" . $row["file"] . "</a>" . "<br>";
        }
    ?>
</body>
</html>
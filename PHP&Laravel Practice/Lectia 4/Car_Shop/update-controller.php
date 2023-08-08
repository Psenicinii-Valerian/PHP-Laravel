<?php
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        if (!empty($_POST["brand"]) &&
            !empty($_POST["model"]) &&
            !empty($_POST["color"]) &&
            ((int)$_POST["carYear"] >= 2010 && (int)$_POST["carYear"] <= 2023) &&
            (double)$_POST["price"] > 500 &&
            !empty($_POST["image"])) {
                $brand = $_POST["brand"];
                $model = $_POST["model"];
                $color = $_POST["color"];
                $carYear = $_POST["carYear"];
                $price = $_POST["price"];
                $image = $_POST["image"];
                $id = $_POST["lsd"];

                // require - importam un fisier intr-un alt fisier (cu tot cu variabilele acestuia)
                require "./config.php"; 
                // include - functioneaza fix ca require doar ca da un warning daca nu e gasit fisierul, 
                // pe cand require obliga ca fisierul sa fie importat corect, iar daca nu e - primim o eroare

                // scriem comanda de introducere a datelor in BD cu 7 parametri in loc de valori (pentru securitate)
                $sql = "UPDATE cars SET brand=?, model=?, color=?, carYear=?, price=?, image=? WHERE id=?";
                
                try {
                    // $stmt(statement) - variabila care raspunde de transmiterea/primirea
                    // valorilor. Lucreaza ca un pod dintre php si MySql;
                    // $connection->prepare - metoda prin care pregatim variabila sql sa fie transmisa in BD
                    $stmt = $connection->prepare($sql);
                    // executam comanda cu tot cu parametrii acesteia
                    $stmt->execute([$brand, $model, $color, $carYear, $price, $image, $id]);
                    header("Location: ./index.php");
                } catch (PDOException $e) {
                    echo "Error: " . $e -> getMessage();
                }
            }
    }
?>
<?php
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        if (!empty($_POST["title"]) &&
            !empty($_POST["description"]) &&
            !empty($_POST["price"]) &&
            !empty($_POST["lsd"]) &&
            !empty($_POST["image"])) {
                $title = $_POST["title"];
                $description = $_POST["description"];
                $price = $_POST["price"];
                $image = $_POST["image"];
                $id = $_POST["lsd"];

                // require - importam un fisier intr-un alt fisier (cu tot cu variabilele acestuia)
                require "./config.php"; 
                // include - functioneaza fix ca require doar ca da un warning daca nu e gasit fisierul, 
                // pe cand require obliga ca fisierul sa fie importat corect, iar daca nu e - primim o eroare

                // scriem comanda de introducere a datelor in BD cu 4 parametri in loc de valori (pentru securitate)
                $sql = "UPDATE products set title = ?, description = ?, price = ?, image = ? WHERE id = ?";

                
                try {
                    // $stmt(statement) - variabila care raspunde de transmiterea/primirea
                    // valorilor. Lucreaza ca un pod dintre php si MySql;
                    // $connection->prepare - metoda prin care pregatim variabila sql sa fie transmisa in BD
                    $stmt = $connection->prepare($sql);
                    // executam comanda cu tot cu parametrii acesteia
                    $stmt->execute([$title, $description, $price, $image, $id]);
                    // header - ne permite sa ne transferam de pe pagina curenta la pagina cu adresa - Location: (locatia dorita)
                    header("Location: ./index.php");
                } catch (PDOException $e) {
                    echo "Error: " . $e -> getMessage();
                }
            }
    }
?>  
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

                // require - importam un fisier intr-un alt fisier (cu tot cu variabilele acestuia)
                require "./config.php"; 
                // include - functioneaza fix ca require doar ca da un warning daca nu e gasit fisierul, 
                // pe cand require obliga ca fisierul sa fie importat corect, iar daca nu e - primim o eroare

                // scriem comanda de introducere a datelor in BD cu 4 parametri in loc de valori (pentru securitate)
                $sql = "INSERT INTO cars(brand, model, color, carYear, price, image) VALUES (?, ?, ?, ?, ?, ?)";
                
                try {
                    // $stmt(statement) - variabila care raspunde de transmiterea/primirea
                    // valorilor. Lucreaza ca un pod dintre php si MySql;
                    // $connection->prepare - metoda prin care pregatim variabila sql sa fie transmisa in BD
                    $stmt = $connection->prepare($sql);
                    // executam comanda cu tot cu parametrii acesteia
                    $stmt->execute([$brand, $model, $color, $carYear, $price, $image]);
                } catch (PDOException $e) {
                    echo "Error: " . $e -> getMessage();
                }
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
</head>
<body>
    <nav>
        <a href="index.php">Home</a>
        <a href="create.php">Create</a>
    </nav>
    <form action="./create.php" method="POST">
        <input type="text" name="brand" placeholder="Brand" required minlength="5">
        <input type="text" name="model" placeholder="Model" required minlength="5">
        <input type="text" name="color" placeholder="Color" required minlength="3">
        <input type="number" name="carYear" placeholder="Car Year" required min="2010" max="2023">
        <input type="number" name="price" step="0.01" placeholder="Price" min="500" required>
        <input type="text" name="image" placeholder="Image" required minlength="10">
        <button>Create</button>
    </form>
</body>
</html>
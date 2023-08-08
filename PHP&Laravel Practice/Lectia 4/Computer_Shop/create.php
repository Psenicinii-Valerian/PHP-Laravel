<?php
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        if (!empty($_POST["brand"]) &&
            !empty($_POST["model"]) &&
            !empty($_POST["cpu"]) &&
            !empty($_POST["gpu"]) &&
            (int)$_POST["ram"] >= 4 &&
            (int)$_POST["ssd"] >= 128 &&
            (double)$_POST["price"] >= 300 &&
            !empty($_POST["image"])) {
                $brand = $_POST["brand"];
                $model = $_POST["model"];
                $cpu = $_POST["cpu"];
                $gpu = $_POST["gpu"];
                $ram = $_POST["ram"];
                $ssd = $_POST["ssd"];
                $price = $_POST["price"];
                $image = $_POST["image"];

                require "./config.php"; 

                $sql = "INSERT INTO computers(brand, model, cpu, gpu, ram, ssd, price, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                
                try {
                    $stmt = $connection->prepare($sql);
                    $stmt->execute([$brand, $model, $cpu, $gpu, $ram, $ssd, $price, $image]);
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
        <a href="./index.php">Home</a>
        <a href="./create.php">Create</a>
    </nav>
    <form action="./create.php" method = "POST">
        <input type="text" name="brand" placeholder="Brand" required minlength="3">
        <input type="text" name="model" placeholder="Model" required minlength="3">
        <input type="text" name="cpu" placeholder="CPU" required minlength="3">
        <input type="text" name="gpu" placeholder="GPU" required minlength="3">
        <input type="number" name="ram" placeholder="RAM(Gb)" required min="4">
        <input type="number" name="ssd" placeholder="SSD(Gb)" required min="128">
        <input type="number" name="price" step="0.01" placeholder="Price($)" min="300" required>
        <input type="text" name="image" placeholder="Image" required minlength="10">
        <button>Create</button>
    </form>
</body>
</html>
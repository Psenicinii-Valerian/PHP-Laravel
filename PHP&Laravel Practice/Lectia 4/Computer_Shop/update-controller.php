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
                $id = $_POST["lsd"];

                require "./config.php"; 

                $sql = "UPDATE computers SET brand=?, model=?, cpu=?, gpu=?, ram=?, ssd=?, price=?, image=? WHERE id=?";
                
                try {
                    $stmt = $connection->prepare($sql);
                    $stmt->execute([$brand, $model, $cpu, $gpu, $ram, $ssd, $price, $image, $id]);
                    header("LOCATION: ./index.php");
                } catch (PDOException $e) {
                    echo "Error: " . $e -> getMessage();
                }
            }
    }
?>
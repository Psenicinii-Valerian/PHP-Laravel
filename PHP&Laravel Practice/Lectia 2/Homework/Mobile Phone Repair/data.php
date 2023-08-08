<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (
            strlen($_POST["brand"]) > 0 &&
            strlen($_POST["model"]) > 0 &&
            ((int)($_POST["year"]) >= 2017 && (int)($_POST["year"]) <= 2023) &&
            ((int)($_POST["ram"]) >= 2 && (int)($_POST["ram"]) <= 128) &&
            ((int)($_POST["storage"]) >= 8 && (int)($_POST["storage"]) <= 2000000) &&
            ((int)($_POST["cameraResolution"]) >= 8 && (int)($_POST["cameraResolution"]) <= 512) &&
            ((float)($_POST["displaySize"]) >= 4 && (float)($_POST["displaySize"]) <= 8) &&
            strlen($_POST["price"]) > 0 &&
            isset($_POST["malfunction"]) &&
            isset($_POST["paymentMethod"])
        ) {
            $brand = $_POST["brand"];
            $model = $_POST["model"];
            $year = $_POST["year"];
            $ram = $_POST["ram"];
            $storage = $_POST["storage"];
            $cameraResolution = $_POST["cameraResolution"];
            $displaySize = $_POST["displaySize"];
            $price = $_POST["price"];
            $malfunction = $_POST["malfunction"];
            $paymentMethod = $_POST["paymentMethod"];
    
            echo
                "<div class='php-response'>
                    <h3>Brand: $brand</h3>
                    <h3>Model: $model</h3>
                    <h3>Year: $year</h3>
                    <h3>RAM: $ram Gb</h3>
                    <h3>Storage: $storage Gb</h3>
                    <h3>Camera Resolution: $cameraResolution MP</h3>
                    <h3>Display Size: $displaySize in</h3>
                    <h3>Price: $price$</h3>
                    <h3>Malfunction: $malfunction</h3>
                    <h3>Payment method: $paymentMethod</h3>
                ";
        }
        else {
            echo "Insert all data before submiting!";
        }
    } else {
        echo "Page not found!";
    }
?>
</body>
</html>
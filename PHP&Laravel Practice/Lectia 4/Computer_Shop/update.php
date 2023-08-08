<?php
    require "./config.php";
    $computerId = $_GET["computer"];

    $sql = "SELECT * FROM computers WHERE id = ?";
    $stmt = $connection -> prepare($sql);
    $stmt -> execute([$computerId]);

    $result = $stmt -> FetchAll(PDO::FETCH_ASSOC)[0];
    $computer = $result;
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
    <div class="home">
        <a href="./index.php">&larr; Home</a>
    </div>
    <h1><center>Update</center></h1>
    <form action="./update-controller.php" method = "POST" class="computer-update">
        <input type="text" name="brand" placeholder="Brand" required minlength="3" value="<?= $computer["brand"] ?>">
        <input type="text" name="model" placeholder="Model" required minlength="3" value="<?= $computer["model"] ?>">
        <input type="text" name="cpu" placeholder="CPU" required minlength="3" value="<?= $computer["cpu"] ?>">
        <input type="text" name="gpu" placeholder="GPU" required minlength="3" value="<?= $computer["gpu"] ?>">
        <input type="number" name="ram" placeholder="RAM(Gb)" required min="4" value="<?= $computer["ram"] ?>">
        <input type="number" name="ssd" placeholder="SSD(Gb)" required min="128" value="<?= $computer["ssd"] ?>">
        <input type="number" name="price" step="0.01" placeholder="Price($)" min="300" required value="<?= $computer["price"] ?>">
        <input type="text" name="image" placeholder="Image" required minlength="10" value="<?= $computer["image"] ?>">
        <!-- lsd = id but encoded -->
        <input type="hidden" name="lsd" value="<?= $result["id"] ?>">
        <button>Update</button>
    </form>
</body>
</html>
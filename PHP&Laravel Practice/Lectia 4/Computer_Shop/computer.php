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
    <div class="computer-actions">
        <h1><?= $computer["brand"] . " " . $computer["model"] ?></h1>
        <img src="<?= $computer["image"] ?>" alt="">
        <p>CPU: <?= $computer["cpu"] ?></p>
        <p>GPU: <?= $computer["gpu"] ?></p>
        <p>RAM: <?= $computer["ram"] ?>Gb</p>
        <p>SSD: <?= $computer["ssd"] ?>Gb</p>
        <p>Price: <?= $computer["price"] ?>$</p>
    </div>
    <div class="update-delete">
        <a href="./update.php?computer=<?= $computer["id"] ?>">Update</a>
        <a href="./delete.php?computer=<?= $computer["id"] ?>">Delete</a>
    </div>
</body>
</html>
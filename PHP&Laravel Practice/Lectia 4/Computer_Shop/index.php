<?php
    require "./config.php";

    try {
        $sql = "SELECT * FROM computers";
        $stmt = $connection -> query($sql);
        $result = $stmt -> FetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        die("Something went wrong!");
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
    <main>
        <?php
            if (count($result) > 0):
                foreach($result as $computer):
        ?>
            <a href="./computer.php?computer=<?= $computer["id"] ?>" class="computer">
                    <img src="<?= $computer["image"] ?>" alt="">
                    <h1><?= $computer["brand"] . " " . $computer["model"] ?></h1>
                    <p>CPU: <?= $computer["cpu"] ?></p>
                    <p>GPU: <?= $computer["gpu"] ?></p>
                    <p>RAM: <?= $computer["ram"] ?>Gb</p>
                    <p>SSD: <?= $computer["ssd"] ?>Gb</p>
                    <p>Price: <?= $computer["price"] ?>$</p>
            </a>
        <?php
                endforeach;
            endif;
        ?>
    </main>
</body>
</html>
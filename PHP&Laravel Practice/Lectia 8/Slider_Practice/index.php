<?php
    $connection = new PDO("mysql:host=localhost;port=4000;dbname=slider_practice", "root", "");
    $sql = "SELECT * FROM giphs";
    $stmt = $connection -> prepare($sql);
    $stmt -> execute();
    $giphs = $stmt -> fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giphs Slider</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="slider">
        <?php
            foreach($giphs as $giph) {
                echo "<img src=$giph[name] class='giphs'>";
            }
        ?>
    </div>
    <!-- buttons -->
    <div class="buttons">
        <button id="left">&larr;</button>
        <button id="right">&rarr;</button>
    </div>
    <!-- JavaScript -->
    <script src="app.js"></script>
</body>
</html>
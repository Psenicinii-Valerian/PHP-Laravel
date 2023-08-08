<?php
    $connection = new PDO("mysql:host=localhost;port=4000;dbname=slider_js", "root", "");

    $sql = "SELECT * FROM images";
    $stmt = $connection -> prepare($sql);
    $stmt -> execute();
    $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
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
    <!-- lorem55 - ne va returna 55 de cuvinte de tip lorem -->
    <!-- lorem25 - ne va returna 25 de cuvinte de tip lorem -->
    <!-- loremN - ne va returna N cuvinte de tip lorem -->
    <div id="images">
        <?php
            foreach($result as $img) {
                echo "<img class='slide' src=$img[name]>";
            }
        ?>
    </div>
    <div class="buttons">
        <button id="left">&larr;</button>
        <button id="right">&rarr;</button>
    </div>

    <!-- JavaScript -->
    <script src="app.js"></script>
</body>
</html>
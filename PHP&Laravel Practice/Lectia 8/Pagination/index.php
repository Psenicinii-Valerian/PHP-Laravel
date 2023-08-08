<?php
    $connection = new PDO("mysql:host=localhost;port=4000;dbname=slider_js", "root", "");

    $countSQL = "SELECT COUNT(*) FROM pagination";
    $stmt = $connection -> prepare($countSQL);
    $stmt -> execute();
    // daca avem doar o singura variabila ce trebuie sa o primim putem da simplu fetch() fara parametri
    // adica fara parametrul PDO::FETCH_ASSOC
    $result = $stmt -> fetch();
    $rows = $result[0];
    $itemsPerPage = 2;
    // ceil() - functie care va rotunji in sus (la cel mai apropiat int) valoarea obtinuta in urma impartirii cu rest
    // floor() - functie care va rotunji in jos (la cel mai apropiat int) valoarea obtinuta in urma impartirii cu rest
    $totalNumberOfPages = ceil($rows / $itemsPerPage);
    $page = empty($_GET["page"]) ? 1 : $_GET["page"];
    $offset = ($page - 1) * $itemsPerPage;

    $sql = "SELECT * FROM pagination LIMIT :itemsPerPage OFFSET :offset";
    $stmt = $connection -> prepare($sql);
    $stmt -> bindValue (":itemsPerPage", $itemsPerPage, PDO::PARAM_INT);
    $stmt -> bindValue (":offset", $offset, PDO::PARAM_INT);
    $stmt -> execute();
    $items = $stmt -> fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="styles.css"> -->
</head>
<body>
    <div id="images">
        <?php
            foreach($items as $item) {
                echo "<p>$item[title] - $item[content]</p>";
            }
        ?>
    </div>

    <div>
        <?php
            for ($i = 0; $i < $rows / $itemsPerPage; $i++) {
                echo "<a href='?page=" . $i + 1 . "'>". " " . $i+1 . "</a>";
            }
        ?>
    </div>
    <!-- JavaScript -->
    <script src="app.js"></script>
</body>
</html>
<?php
    require "./config.php";
    // extagem valoarea variabilei din product (url?product = valoare)
    $productId = $_GET["product"];

    // scriem comanda de sql necesara
    $sql = "SELECT * FROM products WHERE id= :id";
    // pregatim comanda sql pentru a fi transmisa
    $stmt = $connection -> prepare($sql);
    // transmitem valoarea pentru parametrul din sql
    $stmt -> bindValue(":id", $productId);
    // executam comanda sql
    $stmt -> execute();
    // prin $result vom putea primi valorile din comanda sql scrisa mai sus
    // fetchAll() - va apela toate datele din tabel care corespund sql-ului scris
    // PDO::FETCH_ASSOC - ne va returna valoarea primita in urma comenzii sql sub forma de tablou in format asociativ
    // [0] - din tot rezultatul primit vom primi doar primul element (primul tablou asociativ)
    $result = $stmt -> fetchAll(PDO::FETCH_ASSOC)[0];
    // printam resultatul sub forma de tablou asociativ
    // print_r($result);
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
    <a href="./index.php">&larr; Home</a>
    <h1><center>Update</center></h1>
    <form action="./update-controller.php" method="POST">
        <input type="text" name="title" palceholder="Title" required minlength="5" value="<?= $result["title"] ?>">
        <textarea name="description" placeholder="Description" cols="30" rows="5" required><?= $result["description"] ?></textarea>
        <input type="number" name="price" step="0.01" placeholder="Price" min="5" required value="<?= $result["price"] ?>">
        <input type="text" name="image" placeholder="Image" required minlength="10" value="<?= $result["image"] ?>">
        <!-- lsd = id but encoded -->
        <input type="hidden" name="lsd" value="<?= $result["id"] ?>">
        <button>Update</button>
    </form>
</body>
</html>
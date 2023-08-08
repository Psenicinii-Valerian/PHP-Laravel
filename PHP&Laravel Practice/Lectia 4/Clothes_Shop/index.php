<?php
    require "./config.php";

    try {
        // comanda de selectare a tuturor datelor ce le avem in tabloul products
        $sql = "SELECT * FROM products";
        // trimiterea interogarii in BD
        $stmt = $connection->query($sql);
        // apelarea valorilor din interogare sub forma de tablou asociativ
        $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);

    } catch(Exception $e) {
        die("Something went wrong");    
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
                foreach($result as $product):
        ?>
        <!-- oricare informatie de dupa semnul de intrebare ? (variabilele) poate fi apelata prin metoda HTTP GET -->
            <a href='./product.php?product=<?= $product["id"] ?>' class='product'>
                <img src="<?= $product["image"] ?>" alt="">
                <h1><?= $product["title"] ?></h1>
                <p><?= $product["description"] ?></p>
                <p>$<?= $product["price"] ?></p>
            </a>
        <?php 
                endforeach; 
            endif; 
        ?>
    </main>
</body>
</html>
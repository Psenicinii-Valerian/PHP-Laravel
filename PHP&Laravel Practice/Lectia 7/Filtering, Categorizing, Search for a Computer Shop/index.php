<?php
    // *in php, pentru a accesa o variabila globala in interiorul unei functii
    // este nevoie sa scriem inainte de variabila cuvantul-cheie global 
    function getProducts($c, $sql){
        $stmt = $c -> prepare($sql);
        $stmt -> execute();
        $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function getBrands($c) {
        $sql = "SELECT DISTINCT brand FROM products";
        $stmt = $c -> prepare($sql);
        $stmt -> execute();
        $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function getTypes($c) {
        $sql = "SELECT DISTINCT type FROM products";
        $stmt = $c -> prepare($sql);
        $stmt -> execute();
        $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    try {   
        $connection = new PDO("mysql:host=localhost;port=4000;dbname=best_computer_shop", "root", "");

        $sql = "";
        if (count($_GET)) {
            // $table[] = newElement; - metoda de adaugare a unui nou element la sfarsit de tablou
            // un analog pentru sintaxa de mai sus este array_push($table, element1, ..., elementN)
            // Functional filtrare, categorizare, cautare
            $sql = "SELECT * FROM products ";
            $sortSql = "";
            $filters = [];

            if (!empty($_GET["search"])) {
                $search = $_GET["search"];
                $filters[] = "(brand LIKE '%$search%' OR model LIKE '%$search%' OR type LIKE '%$search%') "; 
            }

            if (!empty($_GET["sort"])) {
                $sort = $_GET["sort"];

                if ($sort === "A-Z") {
                    $sortSql = "ORDER BY brand ASC";
                } else if ($sort === "Z-A") {
                    $sortSql = "ORDER BY brand DESC";
                } else if ($sort === "0-9") {
                    $sortSql = "ORDER BY price ASC";
                } else {
                    $sortSql = "ORDER BY price DESC";
                }
            }

            if (!empty($_GET["brand"])) {
                $brand = $_GET["brand"];
                $filters[] = " brand = '$brand' ";
            }

            if (!empty($_GET["type"])) {
                $type = $_GET["type"];
                $filters[] = " type = '$type' ";
            }

            if (count($filters) > 0) {
                $sql .= "WHERE";
                // implode() - metoda care transforma tabloul intr-un string, adaugand 
                // intre fiecare element al tabloului un separator
                $sql .= implode(" AND ", $filters);
            }
            $sql .= $sortSql;

            // print_r($sql);
        } else {
            $sql = "SELECT * FROM products";
        }
        $brands = getBrands($connection);
        $types = getTypes($connection);
        $products = getProducts($connection, $sql);
        $sorts = ["A-Z", "Z-A", "0-9", "9-0"];
    } catch(PDOException $ex){
        print("Something went wrong");
        die(" Program killed");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="GET">
        <input type="text" name="search" placeholder="Search..." value="<?= !empty($_GET["search"]) ? $_GET["search"] : ""?>">
        <select name="sort" style="width: 110px; text-align:center">
            <option value="<?= !empty($_GET["sort"]) ? $_GET["sort"] : "" ?>">
                <?= !empty($_GET["sort"]) ? $_GET["sort"] : "Select option" ?>
            </option>
            <?php
                foreach($sorts as $sort){
                    if ($sort !== $_GET["sort"]) {
                        echo "<option value=$sort>$sort</option>";
                    }
                }
            ?>
            <!-- <option value="A-Z">A-Z</option>
            <option value="Z-A">Z-A</option>
            <option value="0-9">Low - High Prices</option>
            <option value="9-0">High - Low Prices</option> -->
        </select>
        <select name="brand" style="width: 120px; text-align:center">
            <option value="<?= !empty($_GET["brand"]) ? $_GET["brand"] : "" ?>">
                <?= !empty($_GET["brand"]) ? $_GET["brand"] : "Select brand" ?>
            </option>
            <?php
                foreach($brands as $brand){
                    if ($brand["brand"] !== $_GET["brand"]) {
                        echo "<option value=$brand[brand]>$brand[brand]</option>";
                    }
                }
            ?>
            <!-- <option value="Apple">Apple</option>
            <option value="Huawei">Huawei</option>
            <option value="Navigator">Navigator</option>
            <option value="DELL">DELL</option> -->
        </select>
        <select name="type" style="width: 110px; text-align:center">
            <option value="<?= !empty($_GET["type"]) ? $_GET["type"] : "" ?>">
                <?= !empty($_GET["type"]) ? $_GET["type"] : "Select type" ?>
            </option>
            <?php
                foreach($types as $type){
                    if ($type["type"] !== $_GET["type"]) {
                        echo "<option value=$type[type]>$type[type]</option>";
                    }
                }
            ?>
            <!-- <option value="Laptop">Laptop</option>
            <option value="Desktop">Desktop</option>
            <option value="Ultrabook">Ultrabook</option> -->
        </select>
        <button type="submit">Set</button>
    </form>
    <a href="./index.php">Reset</a>
    <?php 
        foreach($products as $product){
            echo "
                <div>
                    <h2>$product[brand] $product[model]</h2>
                    <p>Type: $product[type]</p>
                    <p><em>Price: $product[price] MDL</em></p>
                </div>";
        }
    ?>
</body>
</html>
<?php
    try {
        $con = new PDO("mysql:host=localhost;port=4000;dbname=dinosaurs_ajax", "root", "");

        if ($_SERVER["REQUEST_METHOD"] === "POST"){
            if ($_POST["type"] === "CREATE") {
                $name = $_POST["name"]; 
                $price = $_POST["price"]; 
                $image = $_POST["image"];
                $sql = "INSERT INTO dinosaurs(name, price, image) VALUES (?, ?, ?)";
                $stmt = $con -> prepare($sql);
                $stmt -> execute([$name, $price, $image]);

                if ($stmt -> rowCount() > 0) {
                    echo "Data added.";
                } else {
                    http_response_code(400);
                    echo "Something went wrong while adding info to the database";
                }
            }

            if ($_POST["type"] === "READ") {
                $sql = "SELECT * FROM dinosaurs";
                $stmt = $con -> prepare($sql);
                $stmt -> execute();
                $data = $stmt -> fetchAll(PDO::FETCH_ASSOC);
                $rowData = "";
                foreach ($data as $row) {
                    $rowData .= "<img src=$row[image] style='width:300px; height:250px'>";
                    $rowData .= "<p>$row[name] - $row[price]$</p>";
                }
                echo $rowData;
            }
        }
    } catch (PDOException $ex) {
        http_response_code(404);
        die("Something went wrong while connecting to the database." . " " . $ex);
    }
?>
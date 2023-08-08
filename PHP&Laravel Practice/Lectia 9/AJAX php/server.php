<?php
    try {
        $c = new PDO("mysql:host=localhost;port=4000;dbname=ajax_php", "root", "");

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if ($_POST["type"] === "CREATE") {
                $name = $_POST["name"];
                $price = $_POST["price"];

                $sql = "INSERT INTO furniture(name, price) VALUES  (?, ?)";
                $stmt = $c -> prepare($sql);
                $stmt -> execute([$name, $price]);
                // $data = $stmt -> fetchAll(PDO::FETCH_ASSOC);

                if ($stmt -> rowCount() > 0){
                    echo "Data added.";
                } else {
                    http_response_code(400);
                    echo "Something went wrong";
                }
            }

            if ($_POST["type"] === "READ") {
                $sql = "SELECT * FROM furniture";
                $stmt = $c -> prepare($sql);
                $stmt -> execute();
                $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
                $strResult = "";
                foreach($result as $row) {
                    $strResult .= "<p>$row[name] $row[price]</p>";
                }   
                echo $strResult;
            }
        }
    } catch (PDOException $exp) {
        http_response_code(404);
        die("Something went wrong while connecting to DataBase." . " " . $exp);
    }   
?>
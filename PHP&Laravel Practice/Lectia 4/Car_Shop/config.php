<?php
    $host = "localhost";
    $port = "4000";
    $dbname = "car_shop";
    $username = "root";
    $password = "";

    try {
        // pdo - clasa din php utilizata pentru conexiunea intre php cu MySql si 
        // efectuarea operatiilor precum primirea datelor, transmiterea datelor etc.
        $connection = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
    } catch (Exception $e) {
        // die - ne inchide imediat programul nostru php afisand la ecran mesajul
        // setat ca parametru al acestei functii
        die("Connection failed! Try again later.");
    }
?>
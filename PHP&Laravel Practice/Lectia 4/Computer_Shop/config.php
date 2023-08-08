<?php
    try {
        $connection = new PDO("mysql:host=localhost;port=4000;dbname=computer_shop", "root", "");
    } catch(Exception $e) {
        die("Connection with database failed! Try again later");
    }
?>
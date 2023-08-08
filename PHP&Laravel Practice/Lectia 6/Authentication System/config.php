<?php
    try {
        $pdo = new PDO("mysql:host=localhost;port=4000;dbname=auth_system", "root", "");
        // variabila speciala de care avem nevoie pentru a putea deschide sesiunea
        // sesiunea va fi utilizata pentru a afisa diferite variabile in diferite documente
        session_start();
    } catch (PDOException $e) {
        die("DB connection not established!");
    }
?>
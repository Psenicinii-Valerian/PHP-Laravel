<?php
    require "./config.php";
    echo "EAHFSHAFHAHFA" . " " . $id;
    $id = $_GET["computer"];
    $sql = "DELETE FROM computers WHERE id = ?";
    $stmt = $connection -> prepare($sql);
    $stmt -> execute([$id]);

    header("Location: ./index.php");
?>
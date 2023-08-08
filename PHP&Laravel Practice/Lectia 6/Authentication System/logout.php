<?php
    require "./config.php";
    // unset() - metoda prin care stergem un element drintr-un tablou
    unset($_SESSION["user_id"]);
    header("Location: ./login.php");
?>
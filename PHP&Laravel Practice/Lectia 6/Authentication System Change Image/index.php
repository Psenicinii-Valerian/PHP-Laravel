<?php
    require_once "./config.php";

    if(empty($_SESSION["user_id"])) {
        header("Location: ./login.php");
    } else {
        header("Location: ./account.php");
    }
?>
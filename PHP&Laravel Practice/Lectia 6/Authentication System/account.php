<?php
    require_once "./config.php";
    if (!empty($_SESSION["user_id"])) {
        $id = $_SESSION["user_id"];

        // din sql vom primi doar 1 rand (daca ar fi mai multi utilizatori cu acelasi login) 
        $sql = "SELECT * FROM users WHERE id = ? LIMIT 1";
        $stmt = $pdo -> prepare($sql);
        $stmt -> execute([$id]);
        $user = $stmt -> fetch(PDO::FETCH_ASSOC);

    } else {
        header("Location: ./login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $user["login"] ?>'s page</title>
</head>
<body>
    <img src="./images/<?= $user["image"] ?>" height="180px" width="200px">
    <h1><?= $user["login"]?></h1>
    <p><?= $user["email"] ?></p>
    <a href="./logout.php">Logout</a>
</body>
</html>
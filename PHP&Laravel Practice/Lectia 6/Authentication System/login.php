<?php
    // require - se utilizeaza pentru a importa diferite valori dintr-un alt document.
    // in cazul in care documentul nu este gasit -> primim eroare

    // require_once - verifica daca fisierul a fost importat -> nu il mai importam o data
    // asadar, importarea multipla nu este permisa cu ajutorul lui require_once
    // adica nu putem face o conexiune cu aceeasi baza de data de mai multe ori ca in require
    // deci ne scapam de o eroare(conexiunea multipla la o baza de date rezulta o eroare)
    require_once "./config.php";

    if(!empty($_SESSION["user_id"])) {
        header("Location: ./account.php");
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $err;
        if (!empty($_POST["login"]) &&
        !empty($_POST["password"])) {
            $login = $_POST["login"];
            $password = $_POST["password"];

            // din sql vom primi doar 1 rand (daca ar fi mai multi utilizatori cu acelasi login) 
            $sql = "SELECT * FROM users WHERE login = ? LIMIT 1";
            $stmt = $pdo -> prepare($sql);

            try {
                $stmt -> execute([$login]);
            
                if ($stmt -> rowCount() === 1) {
                    $user = $stmt -> Fetch(PDO::FETCH_ASSOC);
    
                    if (password_verify($password, $user["password"])) {
                        $_SESSION["user_id"] = $user["id"];
                        header("Location: ./account.php");
                    } else {
                        $err = "Login or password is wrong. Try again!";
                    }
                } else {
                    $err = "Wrong credentials. Try again!";
                }
            } catch (PDOException $e) {
                $err = "Something went wrong when logging in";
            }
            
        } else {
            $err = "All fields are required!";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <!-- <form action="./login.php" method="POST"> -->
    <!-- daca vrem sa avem actiunea in acelasi document putem sa nu specificam locatia fisierului ca parametru -->
    <form action="" method="POST">
        <input type="text" name="login" placeholder="Login">
        <input type="password" name="password" placeholder="Password">
        <button>Login</button>
    </form>
    <?= !empty($err) ? "<p class='error'>$err</p>" : "" ?>
    <a href="./register.php">Don't have an account? Register</a>
</body>
</html>
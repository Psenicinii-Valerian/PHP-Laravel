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
        !empty($_POST["email"]) && 
        !empty($_POST["password"]) &&
        !empty($_POST["password2"])) {
            $login = $_POST["login"];
            $email = $_POST["email"];
            if ($_POST["password"] === $_POST["password2"]) {
                $newPassword = password_hash($_POST["password"], PASSWORD_DEFAULT);

                $sql = "INSERT INTO users(login, email, password) VALUES (?, ?, ?)";
                $stmt = $pdo -> prepare($sql);
                
                try {
                    $stmt -> execute([$login, $email, $newPassword]);
                    // if-ul este optional. Putem da deodata header("Location: ./login.php");
                    if ($stmt -> rowCount() > 0) {
                        header("Location: ./login.php");
                    }   
                } catch (PDOException $e) {
                    $err = "Something went wrong. Try again with other credentials!";
                }
            }
            else {
                $err = "Passwords do not match!";
            }
        } else {
            $err = "All field are required!";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>
    <!-- <form action="./login.php" method="POST"> -->
    <!-- daca vrem sa avem actiunea in acelasi document putem sa nu specificam locatia fisierului ca parametru -->
    <form action="" method="POST">
        <input type="text" name="login" placeholder="Login">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <input type="password" name="password2" placeholder="Confirm password">
        <button>Register</button>
    </form>
    <?= !empty($err) ? "<p class='error'>$err<p>" : ""?>
    <a href="./login.php">Already have an account? Login</a>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (
                strlen($_POST["firstname"]) > 0 && 
                strlen($_POST["lastname"]) > 0 && 
                strlen($_POST["address"]) > 0 && 
                ((int)$_POST["birthYear"] >= 2015 && (int)$_POST["birthYear"] <= 2016) &&
                strlen($_POST["school"]) > 0 &&
                // isset - verifies if the variable hobbies is seted 
                isset($_POST["hobbies"]) &&
                count($_POST["hobbies"]) > 0 &&
                isset($_POST["gender"]) &&
                strlen($_POST["gender"]) > 0 &&
                strlen($_POST["description"]) > 0
            ) {
                $firstname = $_POST["firstname"];
                $lastname = $_POST["lastname"];
                $address = $_POST["address"];
                $birthYear = (int) $_POST["birthYear"];
                $school = $_POST["school"];
                $hobbies = $_POST["hobbies"];
                $gender = $_POST["gender"];
                $description = $_POST["description"];

                echo
                    "<div>
                        <h1><em>Fullname:</em> $firstname $lastname</h1>
                        <p><em>Address:</em> $address</p>
                        <p><em>Age:</em> " . 2023 - $birthYear . "</p>
                        <p><em>School:</em> $school </p>";
                    
                foreach($hobbies as $hobby) {
                    echo "<p><strong>$hobby</strong></p>";
                }

                echo 
                        "<p><em>Gender: </em> $gender </p>
                        <p>$description</p>
                    </div>";
            }
            else {
                echo "Data does not correspond to the rules";
            }
        } else {
            echo "Page not found";
        }
    // Daca nu avem in document alt cod decat cel php (nu avem HTML sau alte limbaje) 
    // putem sa nu inchidem blocul php (sa nu scriem "?\>"); 
    ?>
</body>
</html>
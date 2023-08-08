<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST"){
        if (
            strlen($_POST["brand"]) > 0 &&
            strlen($_POST["model"]) > 0 &&
            strlen($_POST["color"]) > 0 &&
            strlen($_POST["oldIdnp"]) > 0 &&
            strlen($_POST["newIdnp"]) > 0 &&
            strlen($_POST["carVin"]) > 0 &&
            ((int)$_POST["year"] >= 2010 && (int)$_POST["year"] <= 2023) && 
            isset($_POST["carType"]) && 
            ((int)$_POST["engineCapacity"] >= 0.8 && (int)$_POST["engineCapacity"] <= 16) && 
            isset($_POST["carCapacity"]) && 
            isset($_POST["facilities"]) && 
            isset($_POST["damagedStatus"])
        ) {
            $brand = $_POST["brand"];
            $model = $_POST["model"];
            $color = $_POST["color"];
            $oldIdnp = $_POST["oldIdnp"];
            $newIdnp = $_POST["newIdnp"];
            $carVin = $_POST["carVin"];
            $year = (int) $_POST["year"];
            $carType = $_POST["carType"];
            $engineCapacity = $_POST["engineCapacity"];
            $carCapacity = $_POST["carCapacity"];
            $facilities = $_POST["facilities"];
            $damagedStatus = $_POST["damagedStatus"];

            echo
                "<div>
                    <h3><em>Brand:</em> $brand </h3> 
                    <h3><em>Model:</em> $model </h3> 
                    <p><em>Color:</em> $color </p> 
                    <p><em>Old proprietary IDNP:</em> $oldIdnp </p> 
                    <p><em>New proprietary IDNP:</em> $newIdnp </p> 
                    <p><em>Car VIN:</em> $carVin </p> 
                    <p><em>Year:</em> $year </p> 
                    <p><em>Car type:</em> $carType </p> 
                    <p><em>Engine capacity:</em> $engineCapacity liters </p> 
                    <p><em>Car capacity:</em> $carCapacity </p>
                    <p><em>Facilities:</em> </p>";

                    foreach ($facilities as $facility) {
                        echo "<li> $facility </li>";
                    }

            echo 
                    "<p><em>Damaged status:</em> $damagedStatus </p>";
        } else {
            echo "Insert all data before submiting!";
        }
    } else {
        echo "Page not found!";
    }
?>
</body>
</html>
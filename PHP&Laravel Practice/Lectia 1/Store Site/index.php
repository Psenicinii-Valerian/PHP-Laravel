<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        <?php
            include "styles.css";
        ?>
    </style>
</head>
<body>
    <?php
        // Definirea variabilelor
        // $name = "Valerian";
        // $age = 20;
        // $gender = "M";
        // Afisarea a 2 variabile concatenate (concatenarea se realizeaza prin ".")
        // echo $name . " " . $age;
        // Sintaxa if-ului in php
        // if ($gender === "M") {
        //     echo "You are a male";
        // } else {
        //     echo "You are a female";
        // }
        // $country = "Moldova";
        // Afisarea variabilei $country ca header (h1) - metoda 1
        // echo "<h1>" . $country . "</h1>";
    ?>
    <!-- Afisarea variabilei $country ca header (h1) - metoda 2 -->
    <!-- <h1><?php echo $country ?></h1> -->
    <!-- Afisarea variabilei $country ca header (h1) - metoda 3 -->
    <!-- "="- inlocuieste "php echo" (la afisare) -->
    <!-- <h1><?=$country?></h1> -->

    <!-- traducerea din php in browser se realizeaza in cazul nostru cu ajutorul Serverului Apache -->
    <?php
        // $a = 5;
        // $b = 10;
        // Operatia de adunare (+) in php
        // $c = $a + $b;
    ?>
    <!-- Afisarea rezultatului dintre inmultirea variabilei $c cu 10 -->
    <!-- <p><?=$c * 10?></p> -->
    <!-- Afisarea variabilei $c -->
    <!-- <?= $c ?> -->

    <?php 
        // pentru a afisa tipul de date al variabilei(si valoarea acesteia) folosim var_dump(var_name)
        // $a = 10;
        // var_dump($a);

        // $b = 10.1;
        // var_dump($b);

        // $c = true;
        // var_dump($c);

        // pentru a afisa tipul de date al (si valoarea acesteia) folosim var_dump(var_name)
        // *in tablouri putem avea variabile de diferit tip de date, inclusim alte array-uri
        // $arr1 = ["Brasov", [1,2,3], "Chisinau", "Oradea"];
        // var_dump($arr1);

        // afisam tipul de date al variabilei(Pozitia=>Elementele tabloului)
        // print_r($arr1);

        // afisam primul element al array-ului
        // echo $arr1[0];

        // echo count($arr1);

        // printam un spatiu liber (cum ar fi \n)
        // echo "<br>";

        // printam un lungimea (numarul de caractere) al variabilei $country
        // $country = "Moldova";
        // echo strlen($country);

        // $arrX = array("A", "B", "C", 10, 20, 430, true);
        // print_r($arrX);

        // Sintaxa for-ului in php
        // for ($i = 0; $i < count($arrX); $i++) {
            // echo "<p>" . $arrX[$i] . "<p>";
        // }

        // Sintaxa foreach-ului in php
        // $cars = ["Mustang", "Camaro", "Range Rover"];
        // foreach($cars as $car){
            // echo "<p><strong>" . $car . "</strong></p>";
        // }

        // $countries = ["Moldova", "Romania", "USA"];
        // foreach ($countries as $key => $country) {
        //     echo "<h1>" . $key . " " . $country . "</h1>";  
        // }

        // Id, Nume, Prenume, Varsta
        // $users = [
        //     [
        //     "id" => 1,
        //     "nume" => "John",
        //     "prenume" => "Doe",
        //     "varsta" => 30,
        //     "prieteni" => ["Ana", "Marin", "Ion"]
        //     ],
        //     [
        //         "id" => 2,
        //         "nume" => "Marin",
        //         "prenume" => "Jackson",
        //         "varsta" => 22,
        //         "prieteni" => ["Nina", "Rast", "Mike"]
        //     ],
        //     [
        //         "id" => 3,
        //         "nume" => "John",
        //         "prenume" => "Williams",
        //         "varsta" => 24,
        //         "prieteni" => ["Artur", "Maria", "Ion"]
        //     ],
        // ];
    ?>

    <!-- <?php
        foreach ($users as $user){
    ?>
        <div>
            <h1><?= $user["nume"] . " " . $user["prenume"] ?></h1>
            <p><?= $user["varsta"] ?> years old</p>
            <ul>
            <?php
                foreach ($user["prieteni"] as $friend){
            ?>
                <li><?= $friend ?></li>
            <?php
                }
            ?>
            </ul>
        </div>
    <?php
        }
    ?> -->

    <?php
        $countries = [
            [
                "name" => "Moldova",
                "capital" => "Chisinau",
                "population" => 2000000,
                "img" => "https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/Flag_of_Moldova.svg/2560px-Flag_of_Moldova.svg.png"
            ],
            [
                "name" => "Romania",
                "capital" => "Bucharest",
                "population" => 19000000,
                "img" => "https://upload.wikimedia.org/wikipedia/commons/thumb/7/73/Flag_of_Romania.svg/255px-Flag_of_Romania.svg.png"
            ],
            [
                "name" => "Ukraine",
                "capital" => "Kiev",
                "population" => 43000000,
                "img" => "https://cdn.britannica.com/14/4814-004-7C0DF1BB/Flag-Ukraine.jpg"
            ]
        ];
    ?>

    <?php
        foreach($countries as $country){
    ?>
        <div class="country">
            <div>
                <h1><?= $country["name"] ?></h1>
                <h3><?= $country["capital"] ?></h3>
                <p>Population: <?= $country["name"] ?></p>
            </div>
            <img src=<?= $country["img"] ?> alt="">
        </div>
    <?php
        }
    ?>

</body>
</html>
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
<!-- 1. Creati 10 variabile de diferite tipuri, afisati tipurile de variabila la ecran si valoarea lor prin diferite metode
     2. Creati 2 tablouri, prin metode diferite, afisati valorile la ecran prin for, foreach, foreach cu index
     3. Creati 3 tablouri asociative:
        1. Tablou pentru un oras [Denumirea, Populatia, Tara, Continentul]
        2. Tablou pentru tablouri de masini [brand, model, tara, pret, imagine]
        3. Tablou pentru tablouri de fotografi [Nume, Prenumele, Email, [5 imagini]] 
-->
    <!-- Task 1 -->
    <div class="task1">
        <!-- Method 1 -->
        <div class="variables-method-1">
            <?php
                $number = 10;
                $city = "Turin";
                $country = "Poland";
                $currency = "euro";
                $color = "green";
                $salary = 4000;
                $name = "Stepan";
                $film = "John Wick 4";
                $job = "IT";
                $universityMember = true;

                var_dump($number);
                echo "<br>";
                var_dump($city);
                echo "<br>";
                var_dump($country);
                echo "<br>";
                var_dump($currency);
                echo "<br>";
                var_dump($color);
                echo "<br>";
                var_dump($salary);
                echo "<br>";
                var_dump($name);
                echo "<br>";
                var_dump($film);
                echo "<br>";
                var_dump($job);
                echo "<br>";
                var_dump($universityMember);
            ?>
        </div>

        <!-- Method 2 -->
        <div class="variables-method-2">
            <p><?php var_dump($number) ?></p>
            <p><?php var_dump($city) ?></p>
            <p><?php var_dump($country) ?></p>
            <p><?php var_dump($currency) ?></p>
            <p><?php var_dump($color) ?></p>
            <p><?php var_dump($salary) ?></p>
            <p><?php var_dump($name) ?></p>
            <p><?php var_dump($film) ?></p>
            <p><?php var_dump($job) ?></p>
            <p><?php var_dump($universityMember) ?></p>
        </div>

        <!-- Method 3 -->
        <div class="variables-method-3">
            <p><?= var_dump($number) ?></p>
            <p><?= var_dump($city) ?></p>
            <p><?= var_dump($country) ?></p>
            <p><?= var_dump($currency) ?></p>
            <p><?= var_dump($color) ?></p>
            <p><?= var_dump($salary) ?></p>
            <p><?= var_dump($name) ?></p>
            <p><?= var_dump($film) ?></p>
            <p><?= var_dump($job) ?></p>
            <p><?= var_dump($universityMember) ?></p>
        </div>
    </div>

    <!-- Task 2 -->
    <?php
        $namesArr = array("George", "Mihai", "Nicoleta", "Martin", "Nicu");
        $carMakesArr = ["Lamborghini", "Ferrari", "Subaru", "Toyota", "Mitsubishi"]; 

    ?>

    <!-- HTML Array 1 -->
    <div class="task2-arr1">
        <div class="simple-for">
            <?php
                echo "Simple for:" . "<br>" . "<br>";
                for ($i = 0; $i < count($namesArr); $i++){
                    echo $namesArr[$i] . "<br>";
                }
            ?>
        </div>
        <div class="foreach">
            <?php
                echo "Foreach:" . "<br>" . "<br>";
                foreach ($namesArr as $name) {
                    echo $name . "<br>";
                }
            ?>
        </div>
        <div class="foreach-with-key">
            <?php
                echo "Foreach with key:" . "<br>" . "<br>";
                foreach ($namesArr as $key => $name) {
                    echo $key . "." . " " . $name . "<br>";
                }
            ?>
        </div>
    </div>

    <!-- HTML Array 2 -->
    <div class="task2-arr2">
        <div class="simple-for-2">
            <?php
                echo "Simple for:" . "<br>" . "<br>";
                for ($i = 0; $i < count($carMakesArr); $i++){
                    echo $carMakesArr[$i] . "<br>";
                }
            ?>
        </div>
        <div class="foreach-2">
            <?php
                echo "Foreach:" . "<br>" . "<br>";
                foreach ($carMakesArr as $car) {
                    echo $car . "<br>";
                }
            ?>
        </div>
        <div class="foreach-with-key-2">
            <?php
                echo "Foreach with key:" . "<br>" . "<br>";
                foreach ($carMakesArr as $key => $car) {
                    echo $key . "." . " " . $car . "<br>";
                }
            ?>
        </div>
    </div>
    
    <!-- Task 3 -->

    <!-- Table 1 -->
    <?php
        $cities = [
            [
                "name" => "Cardiff",
                "population" => 488000,
                "country" => "Wales",
                "continent" => "Europe"
            ],
            [
                "name" => "Oradea",
                "population" => 220000,
                "country" => "Romania",
                "continent" => "Europe"
            ],            [
                "name" => "Stockholm",
                "population" => 975000,
                "country" => "Sweden",
                "continent" => "Europe"
            ],
        ];
    ?>

    <!-- HTML Table 1 -->
    <div class="task3-table1">
    <?php
        foreach ($cities as $city) {
    ?>
        <div class="cities">
                <h4>Name: <?= $city["name"] ?> </h4>
                <h4>Population: <?= $city["population"] ?> </h4>
                <h4>Country: <?= $city["country"] ?> </h4>
                <h4>Continent: <?= $city["continent"] ?> </h4>
        </div>
    <?php
        }
    ?>
    </div>

    <!-- Table 2 -->
    <?php
        $cars = [
            [
                "brand" => "Mitsubishi",
                "model" => "Lancer",
                "country" => "Japan",
                "price" => 500000,
                "image" => "https://hips.hearstapps.com/autoweek/assets/s3fs-public/2015_lancer_evolution_fe_23.jpg?crop=0.628xw:1.00xh;0.0680xw,0&resize=1200:*"
            ],
            [
                "brand" => "Toyota",
                "model" => "Supra",
                "country" => "Japan",
                "price" => 770000,
                "image" => "https://www.motortrend.com/uploads/2022/04/2023-Toyota-GR-Supra-manual-matte-white-12.jpg?fit=around%7C551:374"
            ],            
            [
                "brand" => "Alfa-Romeo",
                "model" => "Giulia",
                "country" => "Italy",
                "price" => 20000,
                "image" => "https://www.alfaromeo.ro/content/dam/alfa/cross/awards-hub/alfa-romeo-giulia-gtam/mobile.jpg"
            ],
        ];
    ?>

    <!-- HTML Table 2 -->
    <div class="task3-table2">
        <?php
            foreach ($cars as $car) {
        ?>
            <div class="cars">
                    <h4>Brand: <?= $car["brand"] ?> </h4>
                    <h4>Model: <?= $car["model"] ?> </h4>
                    <h4>Country: <?= $car["country"] ?> </h4>
                    <h4>Price: <?= $car["price"] ?>$ </h4>
                    <img src=<?= $car["image"] ?> alt="">
            </div>
        <?php
            }
        ?>
    </div>

    <!-- Table 3 -->
    <?php
        $photographs = [
            [
                "name" => "Mark",
                "surname" => "Zucker",
                "email" => "mzucker@gmail.com",
                "photos" => [
                    "https://ruthsarc.files.wordpress.com/2015/01/23rd.jpg",
                    "https://cdn.ebaumsworld.com/mediaFiles/picture/1961176/81660963.jpg",
                    "https://iso.500px.com/wp-content/uploads/2016/03/stock-photo-142984111.jpg",
                    "https://i.pinimg.com/736x/69/19/59/691959b187b2b253eb2a8aaff72200b5.jpg",
                    "https://climatecommunication.yale.edu/wp-content/uploads/2017/04/001-stone-circle-jpeg-768x350.jpg",
                    "https://learn.corel.com/wp-content/uploads/2022/01/alberta-2297204_1280.jpg"
                ]
            ],
            [
                "name" => "Jane",
                "surname" => "Rose",
                "email" => "janerosee@gmail.com",
                "photos" => [
                    "https://bramptonist.com/wp-content/uploads/2017/05/sloth-1280x720.jpg",
                    "data:image/jpeg;base64,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",
                    "https://cannabislifenetwork.com/wp-content/uploads/2022/02/Random-Facts-Crossword.png",
                    "https://static.inspiremore.com/wp-content/uploads/2022/11/08110457/random-pet-images-2.jpg",
                    "https://www.thewordfinder.com/random-animal-generator/images/data_mandrill.webp",
                    "https://vetmed.illinois.edu/wp-content/uploads/2021/04/pc-keller-hedgehog.jpg"
                ]
            ],
            [
                "name" => "Ivan",
                "surname" => "Mirniy",
                "email" => "ivanm@gmail.com",
                "photos" => [
                    "https://wallpapers.com/images/hd/random-litchi-fruits-o32xdcsv01j61i8e.jpg",
                    "https://www.chiquita.com/wp-content/uploads/2019/12/Chiquita_Banana_Class_Extra_Yellow.jpg",
                    "https://i.redd.it/qehnij2wc1f51.jpg",
                    "https://static.boredpanda.com/blog/wp-content/uploads/2015/01/20-of-the-Worlds-Weirdest-Natural-Foods-Fruits-Vegetables9__700.jpg",
                    "https://static.boredpanda.com/blog/wp-content/uploads/2015/01/20-of-the-Worlds-Weirdest-Natural-Foods-Fruits-Vegetables3__700.jpg",
                    "https://draxe.com/wp-content/uploads/2022/12/DrAxeEatingCoconutsHeader.jpg"
                ]
            ],

        ];
    ?>

    <!-- HTML Table 3 -->
    <div class="task3-table3">
        <?php
            foreach ($photographs as $photograph) {
        ?>
            <div class="photographs">
                    <h4>Name: <?= $photograph["name"] ?> </h4>
                    <h4>Surname: <?= $photograph["surname"] ?> </h4>
                    <h4>Email: <?= $photograph["email"] ?> </h4>
                    
                    <?php
                        foreach ($photograph["photos"] as $photo) {
                    ?>
                    <img src=<?= $photo ?> alt="">
                    <?php
                        }
                    ?>
            </div>
        <?php
            }
        ?>
    </div>

</body>
</html>
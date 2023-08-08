<?php
    try {
        $c = new PDO("mysql:host=localhost;port=4000;dbname=ajax_php", "root", "");

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if ($_POST["type"] === "READ") {
                $sql = "SELECT * FROM furniture WHERE hidden != 1 or hidden IS NULL";
                $stmt = $c -> prepare($sql);
                $stmt -> execute();
                $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
                $strResult = "";
                foreach($result as $row) {
                    $strResult .= "
                        <div>
                            <p>$row[name] - $row[price] MDL</p>
                            <div class='options-forms' style='display: none'>
                                <form class='update'>
                                    <input type='text' name='name' value='$row[name]'>
                                    <input type='number' step='0.01' name='price' value='$row[price]'>
                                    <input type='hidden' name='id' value='$row[id]'>
                                    <button>Update</button> 
                                </form>    
                                <form class='hide'>
                                    <input type='hidden' name='id' value='$row[id]'>
                                    <button>Hide</button>
                                </form>
                                <form class='delete'>
                                    <input type='hidden' name='id' value='$row[id]'>
                                    <button>Delete</button>
                                </form>
                            </div>
                            <i class='options fa-solid fa-gear'></i>
                        </div>";
                }   
                echo $strResult;
            }

            if ($_POST["type"] === "CREATE") {
                $name = $_POST["name"];
                $price = $_POST["price"];

                $sql = "INSERT INTO furniture(name, price) VALUES  (?, ?)";
                $stmt = $c -> prepare($sql);
                $stmt -> execute([$name, $price]);
                // $data = $stmt -> fetchAll(PDO::FETCH_ASSOC);

                if ($stmt -> rowCount() > 0){
                    echo "Data added.";
                } else {
                    http_response_code(400);
                    echo "Something went wrong while creating info";
                }
            }

            if ($_POST["type"] === "UPDATE") {
                $sql = "UPDATE furniture SET name = ?, price = ? WHERE id = ?";
                $stmt = $c -> prepare($sql);
                $stmt -> execute([$_POST["name"], $_POST["price"], $_POST["id"]]);

                if ($stmt -> rowCount() > 0) {
                    echo "Data updated.";
                } else {
                    http_response_code(400);
                    echo "Something went wrong while updating info";
                }
            }

            if ($_POST["type"] === "HIDE") {
                $sql = "UPDATE furniture set hidden = 1 WHERE id = ?";
                $stmt = $c -> prepare($sql);
                $stmt -> execute([$_POST["id"]]);

                if ($stmt -> rowCount() > 0) {
                    echo "Data hidden.";
                } else {
                    http_response_code(400);
                    echo "Something went wrong while hiding info";
                }
            }

            if ($_POST["type"] === "DELETE") {
                $sql = "DELETE FROM furniture WHERE id = ?";
                $stmt = $c -> prepare($sql);
                $stmt -> execute([$_POST["id"]]);

                if ($stmt -> rowCount() > 0) {
                    echo "Data deleted.";
                } else {
                    http_response_code(400);
                    echo "Something went wrong while deleting info";
                }
            }
        }
    } catch (PDOException $exp) {
        http_response_code(404);
        die("Something went wrong while connecting to DataBase." . " " . $exp);
    }   
?>
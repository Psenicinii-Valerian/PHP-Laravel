<?php
    require_once "./config.php";

    if(empty($_SESSION["user_id"])) {
        header("Location: ./login.php");
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $userId = $_SESSION["user_id"];

        if (!empty($_FILES["newFile"])) {

            $newFile = $_FILES["newFile"];

            if ($newFile["error"] === 0) {
                if ($newFile["size"] < 20000000) {
                    $filePath = $newFile["tmp_name"];
                    $fileName = $newFile["name"];

                    $fileExt = explode(".", $fileName)[sizeof(explode(".", $fileName)) - 1];
                    $allowedExt = ["jpg", "jpeg", "png", "gif", "pdf"];

                    if (in_array($fileExt, $allowedExt)){
                        $uniqueFileName = uniqid() . $fileName;
                        move_uploaded_file($filePath, "./images/" . $uniqueFileName);
                        $successMsg = "File updated";

                        $_POST = [];
                        $sql = "UPDATE users SET image = ? WHERE id = ?";
                        $stmt = $pdo -> prepare($sql);
                        $stmt -> execute([$uniqueFileName, $userId]);
                        $successMsg .= " and saved in DB";

                        echo "<p class='success'>$successMsg</p>";
                        // redirect user back to his account
                        header("Location: ./account.php");
                    } else {
                        $msg = "File type not allowed!";
                    }
                } else {
                    $msg = "File too large!";
                }
            } else {
                $msg = "Error on file upload!";
            }
        } 
    } 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Avatar</title>
    <style>
        * {
            height: 99%;
            width: 99%;
        }
        form {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
        form label {
            background-color: black;
            color: white;
            width: 130px;
            height: 40px;
            text-align: center;
            padding: 15px 10px 0px 10px;
        }
        form label input {
            display: none;
        }

        form button {
            width: 150px;
            height: 50px;
        }
    </style>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data" >
        <label for="file">Upload file <input type="file" name="newFile" id="file"></label>
        <br>    
        <button>Save file</button>
    </form>
    <?= !empty($msg) ? "<p class='error'>$msg</p>" : "" ?>
</body>
</html>
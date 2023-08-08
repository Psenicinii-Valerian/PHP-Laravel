<?php
    require "./config.php";
    $id = $_GET["car"];
    $sql = "DELETE FROM cars WHERE id = ?";
    $stmt = $connection -> prepare($sql);
    $stmt -> execute([$id]);

    // header - ne permite sa ne transferam de pe pagina curenta la pagina cu adresa - Location: (locatia dorita)
    header("Location: ./index.php");
?>
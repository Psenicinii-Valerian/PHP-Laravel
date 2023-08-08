<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Phone Repair</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Creați un formular pentru reparația unui telefon mobil, datele pentru inserare sunt urm.:
    Brand, Model, An, Memorie operativă, Memorie de stocare, Camera Megapixeli,
    Diagonoală ecran, Preț, Defecțiune (select) -> Ecran spart, Defecțiune tehnică,
    Încărcător ce nu lucrează, Defecțiune necunoscută, Plată (radio) -> Card, Cash, Credit
    Afișați datele prin PHP și stilizați prin CSS -->

    <form action="./data.php" method="POST">
        <input type="text" class="text-input" name="brand" placeholder="Brand">
        <input type="text" class="text-input" name="model" placeholder="Model">
        <input type="number" class="text-input" name="year" placeholder="Year" min="2017" max="2023">
        <br><br>
        <input type="number" class="text-input" name="ram" placeholder="RAM" min="2" max="128">
        <input type="number" class="text-input" name="storage" placeholder="Storage" min="8" max="2000000">
        <input type="number" class="text-input" name="cameraResolution" placeholder="Camera Resolution" min="8" max="512">
        <br><br>
        <input type="number" class="text-input" name="displaySize" placeholder="Display Size" min="4" max="8" step="0.1">
        <input type="text" class="text-input" name="price" placeholder="Price">
        <br><br>
        <label for="malfunction">Choose the malfunction:</label>
            <select name="malfunction" id="malfunction">
                <option value="Broken Display">Broken Display</option>
                <option value="Technical Malfunction">Technical Malfunction</option>
                <option value="Broken Charger">Broken Charger</option>
                <option value="Uknown Malfunction">Uknown Malfunction</option>
            </select>
        <p class="radio-msg">Choose the payment method:</p>
        <label for="card" class="radio-label">
            <input type="radio" class="radio-input" name="paymentMethod" value="Card" id="card"> Card
        </label>
        <label for="cash" class="radio-label">
            <input type="radio" class="radio-input" name="paymentMethod" value="Cash" id="cash"> Cash
        </label>        
        <label for="credit" class="radio-label">
            <input type="radio" class="radio-input" name="paymentMethod" value="Credit" id="credit"> Credit
        </label>
        <br><br>
        <button type="submit">Send data</button>
    </form>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--
        Formular la Tema inregistrare auto: 
        Brand, model, color, idnp proprietar vechi, idnp proprietar nou, vin masina, 
        year, type, motor, nr. de locuri, dotari (conditioner, radio, apple car play, tuning), 
        radio input pentru masina avariata sau nu, input pret
    -->
    <form action="./data.php" method="POST">
        <input type="text" name="brand" placeholder="Brand">
        <input type="text" name="model" placeholder="Model">
        <input type="text" name="color" placeholder="Color">
        <br><br>
        <input type="text" name="oldIdnp" placeholder="Old proprietary IDNP">
        <input type="text" name="newIdnp" placeholder="New proprietary IDNP">
        <br><br> 
        <input type="text" name="carVin" placeholder="Car vin">
        <input type="number" name="year" placeholder="Year" min="2010" max="2023">
        <br><br> 
        <label for="carType">Select your car type:</label>
        <select name="carType" id="carType">
            <option value="Sedan">Sedan</option>
            <option value="Hatchback">Hatchback</option>
            <option value="Coupe">Coupe</option>
            <option value="SUV">SUV</option>
            <option value="Minivan">Minivan</option>
        </select>
        <input type="number" name="engineCapacity" placeholder="Engine capacity(liters)" 
               min="1" max="16" style="width: 150px";>
        <label for="carCapacity">Select your car capacity:</label>
        <select name="carCapacity" id="carCapacity">
            <option value="2 people">2</option>
            <option value="4 people">4</option>
            <option value="5 people">5</option>
        </select>
        <br>
        <p>Select your car facilities:</p>
        <label for="conditioner">
            <input type="checkbox" name="facilities[]" value="Conditioner" id="conditioner"> Conditioner
        </label>
        <label for="radio">
            <input type="checkbox" name="facilities[]" value="Radio" id="radio"> Radio
        </label>
        <label for="appleCarPay">
            <input type="checkbox" name="facilities[]" value="Apple car pay" id="appleCarPay"> Apple car pay
        </label>
        <label for="tunning">
            <input type="checkbox" name="facilities[]" value="Tunning" id="tunning"> Tunning
        </label>
        <p>Select wether your car is damaged or not:</p>
        <label for="damaged">
            <input type="radio" name="damagedStatus" value="Damaged" id="damaged"> Damaged
        </label>
        <label for="intact">
            <input type="radio" name="damagedStatus" value="Intact" id="intact"> Intact
        </label>
        <br><br>
        <button type="submit">Send data</button>
    </form>
</body>
</html>
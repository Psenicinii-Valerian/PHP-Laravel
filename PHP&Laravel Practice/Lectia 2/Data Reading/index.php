<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Metoda GET nu ezte recomandata din cauza securitatii scazute a acesteia! -->
    <form action="./data.php" method="POST">
        <input type="text" name="firstname" placeholder="Firstname">
        <input type="text" name="lastname" placeholder="Lastname">
        <input type="text" name="address" placeholder="Address">   
        <input type="number" name="birthYear" placeholder="Birth year" min="2015" max="2016">
        <label for="school">Select your school:</label> 
        <select name="school" id="school">
            <option value="School nr. 1">School nr. 1</option>
            <option value="School nr. 2">School nr. 2</option>
            <option value="School nr. 3">School nr. 3</option>
        </select>
        <p>Choose your hobbies:</p>
        <label for="reading">
            <input type="checkbox" name="hobbies[]" value="Reading" id="reading">Reading
        </label>
        <label for="sport">
            <input type="checkbox" name="hobbies[]" value="Sport" id="sport"> Sport
        </label>
        <label for="drawing">
            <input type="checkbox" name="hobbies[]" value="Drawing" id="drawing"> Drawing
        </label>
        <p>Choose your gender:</p>
        <label for="male">
            <input type="radio" name="gender" value="Male" id="male"> Male
        </label>
        <label for="female">
            <input type="radio" name="gender" value="Female" id="female"> Female
        </label>
        <textarea name="description" cols="30" rows="5" placeholder="Write a description about yourself"></textarea>
        <button type="submit">Send</button>
    </form>
</body>
</html>
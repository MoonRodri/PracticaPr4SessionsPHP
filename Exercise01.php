<?php   
session_start();
        

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> </title>
</head>
<body>

    <h1>Supermarket management</h1>
        <label for="name">Worker name</label>
        <input type="text" id="name" name="name" required>

    <h2>Choose product:</h2>
    <select name="Drink" id="Drink">
        <option value="SoftDrink">SoftDrink</option>
        <option value="Milk">Milk</option>
    </select>
        
    <h2>Product quantity:</h2>
        <input type="text" id="product" name="product" required> <br>
        <button type="submit"> add </button>
        <button type="submit"> remove </button>
        <button type="reset"> reset </button>

    <h2>Inventary</h2>

</body>
</html>

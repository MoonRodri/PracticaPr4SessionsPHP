<?php 



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>supermarket management</title>
</head>
<body>
    <h1>Supermarket management</h1>
    <form action="ejercicio01.php" method="post">
        <label for="worker">Worker name:</label>
        <input type="text" id="worker" name="worker" value="<?php echo isset($_POST['worker']) ? $_POST['worker'] :''; ?>" >
        <h2>Choose product</h2>
        <select name="product" id="product">
            <option value="milk">milk</option>
            <option value="softDrink">Soft Drink</option>
        </select>
        <h2>Product quantity</h2>
        <input type="number" id="quantity" name="quantity" min="1"><br><br>
        <input type="submit" value="add" name="add">
        <input type="submit" value="remove" name="remove">
        <input type="reset" value="reset"> 
    </form>
    
</body>
</html>
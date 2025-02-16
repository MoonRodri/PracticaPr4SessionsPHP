<?php 
session_start();

// Definir productos si estos no existen
if (!isset($_SESSION['softDrink'])) {
    # code...
    $_SESSION['softDrink'] = 0;
}
if (!isset($_SESSION['milk'])) {
    # code...
    $_SESSION['milk'] = 0;
}

// Si se hizo por POST

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    # code...
    $worker = $_POST['worker'];
    $product = $_POST['product'];
    $quantity = $_POST['quantity'];

    $_SESSION['worker'] = $worker;

    //salvar productos

    if (isset($_POST["add"])) {
        # code...
        switch ($product) {
            case 'milk':
                # code...
                $_SESSION['milk'] += $quantity;
                break;
            case 'softDrink':
                # code...
                $_SESSION['softDrink'] += $quantity;
                break;
            default:
                # code...
                echo "<br> <font color='red'> <p>Error: Product not found.</p></font>";
                break;
        }
        // Eliminar productos
    } elseif (isset($_POST["remove"])) {
        # code...
        switch ($product) {
            case 'milk':
                # code...
                if ($_SESSION['milk'] - $quantity < 0 ) {
                    # code...
                    echo "<br> <font color='red'><p>Error: Its not possible to remove more quantity than we have in store</p></font>";
                } else {
                    $_SESSION['milk'] -= $quantity;
                }
                break;
            case 'softDrink':
                # code...
                if ($_SESSION['softDrink'] - $quantity < 0 ) {
                    # code...
                    echo "<br> <font color='red'><p>Error: Its not possible to remove more quantity than we have in store</p></font>";
                } else {
                    $_SESSION['softDrink'] -= $quantity;
                }
                break;
            default:
                # code...
                echo "<br> <font color='red'><p>Error: Product not found.</p></font>";
                break;
        }
    }
}

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
    <form action="Exercise01.php" method="post">
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
    <h2>Inventary: </h2>
    <p>Worker: <?php echo isset($_SESSION['worker']) ? $_SESSION['worker'] : '';?></p>
    <p>units milk: <?php echo isset($_SESSION['milk']) ? $_SESSION['milk'] : '';?></p>
    <p>units soft drink: <?php echo isset($_SESSION['softDrink']) ? $_SESSION['softDrink'] : '';?></p>
    
</body>
</html>
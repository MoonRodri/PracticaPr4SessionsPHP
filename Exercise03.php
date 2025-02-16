<?php
session_start();

if (!isset($_SESSION['list'])) {
    $_SESSION['list'] = [];
}

$error = $message = $name = $quantity = $price = "";
$index = -1;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add'])) {
        $name = $_POST['name'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];

        if (empty($name) || empty($quantity) || empty($price)) {
            $error = "All fields are required.";
        } else {
            $_SESSION['list'][] = ['name' => $name, 'quantity' => $quantity, 'price' => $price];
            $message = "Item added properly.";
        }
    }

    if (isset($_POST['edit'])) {
        $index = $_POST['index'];
        $name = $_POST['name'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
    }

    if (isset($_POST['update'])) {
        $index = $_POST['index'];
        $name = $_POST['name'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];

        if (empty($name) || empty($quantity) || empty($price)) {
            $error = "All fields are required.";
        } else {
            $_SESSION['list'][$index] = ['name' => $name, 'quantity' => $quantity, 'price' => $price];
            $message = "Item updated successfully.";
        }
    }

    if (isset($_POST['delete'])) {
        $index = $_POST['index'];
        array_splice($_SESSION['list'], $index, 1);
        $message = "Item deleted properly.";
    }

    if (isset($_POST['total'])) {
        $totalValue = 0;
        foreach ($_SESSION['list'] as $item) {
            $totalValue += $item['quantity'] * $item['price'];
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Shopping list</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 5px;
        }

        input[type=submit] {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <h1>Shopping list</h1>
    <form method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?php echo $name; ?>">
        <br>
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" id="quantity" value="<?php echo $quantity; ?>">
        <br>
        <label for="price">Price:</label>
        <input type="number" name="price" id="price" value="<?php echo $price; ?>">
        <br>
        <input type="hidden" name="index" value="<?php echo $index; ?>">
        <input type="submit" name="add" value="Add">
        <input type="submit" name="update" value="Update">
        <input type="submit" name="reset" value="Reset">
    </form>
    <p style="color:red;"><?php echo $error; ?></p>
    <p style="color:green;"><?php echo $message; ?></p>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Cost</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($_SESSION['list'] as $index => $item) { ?>
                <tr>
                    <td><?php echo $item['name']; ?></td>
                    <td><?php echo $item['quantity']; ?></td>
                    <td><?php echo $item['price']; ?></td>
                    <td><?php echo $item['quantity'] * $item['price']; ?></td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="name" value="<?php echo $item['name']; ?>">
                            <input type="hidden" name="quantity" value="<?php echo $item['quantity']; ?>">
                            <input type="hidden" name="price" value="<?php echo $item['price']; ?>">
                            <input type="hidden" name="index" value="<?php echo $index; ?>">
                            <input type="submit" name="edit" value="Edit">
                            <input type="submit" name="delete" value="Delete">
                        </form>
                    </td>
                </tr>
            <?php } ?>
            <tr>
                <td colspan="3" align="right"><strong>Total:</strong></td>
                <td><?php echo isset($totalValue) ? $totalValue : ''; ?></td>
                <td>
                    <form method="post">
                        <input type="submit" name="total" value="Calculate total">
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>

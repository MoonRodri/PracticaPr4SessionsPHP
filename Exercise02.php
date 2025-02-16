<?php
session_start();

if (!isset($_SESSION['newValue'])) {
    $_SESSION['newValue'] = 0;
}
// Define initial array first time
if (!isset($_SESSION['array'])) {
    $_SESSION['array'] = array("number1" => 10, "number2" => 20, "number3" => 40);
}


if (isset($_POST['average'])) {
    $sum = array_sum($_SESSION['array']);
    $count = count($_SESSION['array']);
    $average = $sum / $count;
    $average = number_format($average, 2); //lo limita a 2 decimales
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise 2</title>
</head>

<body>
    <form method="post">
        <h1>Modify array saved in session</h1>

        Position to modify:
        <select id="position" name="position" required>
            <option value="number0">0</option>
            <option value="number1">1</option>
            <option value="number2">2</option>
            <option value="number3">3</option>
        </select>
        <br><br>

        New value:
        <input type="number" id="number" name="number">
        <br><br>

        <button type="submit" name="modify" value="modify">Modify</button>
        <button type="submit" name="average" value="average">Average</button>
        <input type="reset" value="Reset">
    </form>
    <br>

    <?php
    echo "Current array: ";
    foreach ($_SESSION['array'] as $key => $value) {
        echo "$value, ";
    }
    echo "<br>";

    if (isset($_POST['average'])) {
        echo "<br> Average: $average";
    }

    //when user click on a button
    if (isset($_POST['modify'])) {
        $position = $_POST['position'];
        if (isset($_POST['number']) && $_POST['number'] !== "") {
            $newValue = (int) $_POST['number'];
            if (isset($_SESSION['array'][$position])) {
                $_SESSION['array'][$position] = $newValue;
                echo "<br> Numero modificado correctamente.<br>";
            } else {
                echo "<br> <font color='red'><p>Error: La posición seleccionada no existe.</p></font>";
            }
        } else {
            echo "<br> <font color='red'><p>Error: Pon un número en el campo de 'Nuevo valor'</p></font>";
        }
    }
    ?>
</body>

</html>
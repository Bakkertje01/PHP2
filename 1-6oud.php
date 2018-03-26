<?php
/**
 * Created by PhpStorm.
 * User: Ernst-Jan Bakker
 * Date: 3-5-2017
 * Time: 13:52
 */
?>

<!DOCTYPE HTML>
<html>
<head>

</head>
<title>PHP order form</title>
<body>

<a href="opdracht1.php">Opdracht 1</a><br>
<a href="opdracht1-2.php">Opdracht 1.2</a><br>
<a href="opdracht1-3.php">Opdracht 1.3</a><br>
<a href="opdracht1-4.php">Opdracht 1.4</a><br>
<a href="opdracht1-5.php">Opdracht 1.5</a><br>
<a href="opdracht1-6.php">Opdracht 1.6</a><br>
<hr>

<h1>Order Form</h1>
<hr>

<?php

$totalAll = 0;
$total = array(
    0,0,0,0,0
);
$quantity = array(
    0,0,0,0,0
);

$items = array(
    array(
        "Skittles",
        "Kistje van4",
        "14.95"),
    array(
        "lagis",
        "Muismat",
        "0.99"),
    array(
        "Skribent",
        "Boekensteun",
        "3.99"),
    array(
        "Moppe",
        "Miniladekast",
        "11.95"),
    array(
        "Dokument",
        "Pennekoker",
        "1.99"),
);

    if (isset($_POST['update'])) {


    }

    if (isset($_POST['submit'])) {


        foreach ($items as $bedrag => $Product) {



            /*$quantity[$bedrag] = $_POST['quantity-' . $bedrag . ''];
            $total[$bedrag] = $_POST['quantity-' . $bedrag . ''] * $items[$bedrag][2];
            $totalAll = array_sum($total);

            */
        }

    }

?>


<form action="opdracht1-6.php" method="post">
    <table style="table-layout:fixed; text-align: center;" width="1000">

        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th></th>
            <th>Quantity</th>
            <th></th>
            <th></th>
            <th>Total</th>
        </tr>

        <?php

        foreach ($items as $price => $item)
        {
            echo "<tr><td>";
            echo "$item[0]";
            echo "</td><td>";
            echo "$item[1]" ;
            echo "</td><td>";
            echo "$item[2]" ;
            echo "</td><td>*</td>";
            echo " <td><input type='number' name='$price' value ='$quantity[$price]'>";
            echo "</td><td>";
            echo "</td><td>=</td>";
            echo "</td><td>";
            echo "€$total[$price]";
            echo "</tr>";
        }
        ?>



        <tr>
            <td><input type="submit" value="update" name="update">
                <input type="submit" value="submit" name="submit"></td>
        </tr>

    </table>

</form>

<?php




?>

</body>
</html>

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

$totalAll = 0; //totalAll variabele defineeren op 0

$product = array(                   //de multidimensionale array met 3 items in elke array
    array(
        "Skittles",
        "Kistje van 4",
         14.95),
    array(
        "lagis",
        "Muismat",
        0.99),
    array(
        "Skribent",
        "Boekensteun",
         3.99),
    array(
        "Moppe",
        "Miniladekast",
         11.95),
    array(
        "Dokument",
        "Pennekoker",
         1.99)
);

                                                                //zorgt er ook voor dat de waardes blijven staan.
    if(isset($_POST["update"]) OR isset($_POST["submit"]) ){ //zorgt ervoor dat je met update of submite het onderstaande wordt uitgevoerd


        // Dit zorgt er voor dat de invoervelden in een variable worden gestopt
        $Q0 = $_POST['Qbox0'];
        $Q1 = $_POST['Qbox1'];
        $Q2 = $_POST['Qbox2'];
        $Q3 = $_POST['Qbox3'];
        $Q4 = $_POST['Qbox4'];

        // Dit zorgt ervoor dat de invoervariablen keer de arrayvalue wordt gedaan.
        $total0 = $Q0 * $product[0][2];
        $total1 = $Q1 * $product[1][2];
        $total2 = $Q2 * $product[2][2];
        $total3 = $Q3 * $product[3][2];
        $total4 = $Q4 * $product[4][2];

        $totalAll = $total0 + $total1 + $total2 + $total3 + $total4; //hier wordt alles in het totaal bij elkaar opgeteld.


    }else{              //als er niks ingevoerd is staat het invoerveld op 0;

        $_POST['Qbox0'] = 0;
        $_POST['Qbox1'] = 0;
        $_POST['Qbox2'] = 0;
        $_POST['Qbox3'] = 0;
        $_POST['Qbox4'] = 0;

    }

if (isset($_POST['submit'])) { //zorgt ervoor dat submit wordt uitgevoerd.

    $date = date("Y-m-d-h-i-s"); //systeem datum en tijd
    $orderFile = fopen("OnlineOrders\\$date.txt", "w") or die("Unable to open file!"); //opentt txt file en maakt hem aan, als het fout gaat krijgt die een foutcode


    //alle informatie die in de .txt moet, had eigenlijk geloopt gemoeten.
    $row0 = "1  : "."Name: ".$product[0][0].", Description ". $product[0][1].", Prijs: €". $product[0][2] .", Aantal: ". $_POST['Qbox0'].", Uitgewerkte prijs: €".$total0 ."\n";
    $row1 = "2 : "."Name: ".$product[1][0].", Description ". $product[1][1].", Prijs: €". $product[1][2] .", Aantal: ". $_POST['Qbox1'].", Uitgewerkte prijs: €".$total1 ."\n";
    $row2 = "3 : "."Name: ".$product[2][0].", Description ". $product[2][1].", Prijs: €". $product[2][2] .", Aantal: ". $_POST['Qbox2'].", Uitgewerkte prijs: €".$total2 ."\n";
    $row3 = "4 : "."Name: ".$product[3][0].", Description ". $product[3][1].", Prijs: €". $product[3][2] .", Aantal: ". $_POST['Qbox3'].", Uitgewerkte prijs: €".$total3 ."\n";
    $row4 = "5 : "."Name: ".$product[4][0].", Description ". $product[4][1].", Prijs: €". $product[4][2] .", Aantal: ". $_POST['Qbox4'].", Uitgewerkte prijs: €".$total4 ."\n";
    $row5 = "6 : "."Name: "."Totale prijs: €".$totalAll;

    $rows = $row0.$row1.$row2.$row3.$row4.$row5; //van meerdere rijen 1 variabele maken.

    //spaties goedzetten en kopieren en plakken

    fwrite($orderFile, $rows); //schrijft naar txt.
    fclose($orderFile); //sluit txt.


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

        $total = 0; //total variabele defineren
        $X=0;

        //dit is een loop geworden die er voor zorgt dat X steeds met 1 omhoog gaat, op deze manier worden er variabelen aangemaakt en kan er mee gerekend worden.
        foreach ($product as $name => $item) //foreachloop die ervoor zorgt om dat de array wordt aangeroepen elke product is een item
        {
            echo "<tr><td>";
            echo "$item[0]"; //item 0
            echo "</td><td>";
            echo "$item[1]" ; //item 1
            echo "</td><td>";
            echo "$item[2]" ; //item 2 (prijs)

            echo "</td><td>*</td>";
            echo " <td><input type='number' name='Qbox$X' value = '".$_POST['Qbox'.$X]."' min ='0'>"; //CONCAT, VARIABLE AAN STRING TOEVOEGEN
            echo "</td><td>";
            echo "</td><td>=</td>";
            echo "</td>";
            if(isset($_POST["submit"]) || isset($_POST["update"]) ){ //BIJ SUBMIT EN UPDATE koppel je de stringnaam van de variabele en daar voeg je de waarde van de andere variabele aan toe, van totaal
                echo "<td>€" . ${"total".$X}."</td>"; /// berekening uitgevoerd dan voert hij dit uit
            }else{
                echo "<td>€" . $total."</td>"; //als er niks gebeurd wordt er gewoon 0 gegeven
            }
            echo "</tr>";
            $X++;

        }
        echo "<tr><td><td><td><td><td><td><td><td><hr>";
        echo "</tr><td><td><td><td><td><td><td><td>€" . $totalAll."</td>"; //hier wordt het totale bedrag weergegeven

        ?>



        <tr>

            <td><input type="submit" value="update" name="update">
                <input type="submit" value="submit" name="submit"></td>
        </tr>

    </table>

</form>




</body>
</html>
<!DOCTYPE HTML>
<html>
<head>
    <?php
    /**
     * Created by PhpStorm.
     * User: Ernst-Jan Bakker
     * Date: 21-4-2017
     * Time: 11:37
     */
    $distances = array(
        "Berlin" => array(
            "Berlin" => 0,
            "Moscow" => 1607.99,
            "Paris" => 876.96,
            "Prague" => 280.34,
            "Rome" => 1181.67
        ),
        "Moscow" => array(
            "Berlin" => 1607.99,
            "Moscow" => 0,
            "Paris" => 2484.92,
            "Prague" => 1664.04,
            "Rome" => 2374.26
        ),
        "Paris" => array(
            "Berlin" => 876.96,
            "Moscow" => 641.31,
            "Paris" => 0,
            "Prague" => 885.38,
            "Rome" => 1105.76
        ),
        "Prague" => array(
            "Berlin" => 280.34,
            "Moscow" => 1664.04,
            "Paris" => 885.38,
            "Prague" => 0,
            "Rome" => 922
        ),
        "Rome" => array(
            "Berlin" => 1181.67,
            "Moscow" => 2374.26,
            "Paris" => 1105.76,
            "Prague" => 922,
            "Rome" => 0
        )
    );

    $startIndex = "Berlin";
    $endIndex = "Berlin";
    $kmToMiles = 0.62;
    ?>

</head>
<body>


<a href="opdracht1.php">Opdracht 1</a><br>
<a href="opdracht1-2.php">Opdracht 1.2</a><br>
<a href="opdracht1-3.php">Opdracht 1.3</a><br>
<a href="opdracht1-4.php">Opdracht 1.4</a><br>
<a href="opdracht1-5.php">Opdracht 1.5</a><br>
<a href="opdracht1-6.php">Opdracht 1.6</a><br>
<hr>


<form action="opdracht1.php" method="post">
    <p>Starting City:
        <select name="Start">
            <?php
            foreach ($distances as $city => $otherCities) {
                echo "<option value='$city'";
                if (strcmp($startIndex, $city) == 0) {
                    echo " selected";
                }
                echo ">$city</option>\n";
            }
            ?>
        </select></p>
    <p>Ending City:
        <select name="End">
            <?php
            foreach ($distances as $city => $otherCities) {
                echo "<option value='$city'";
                if (strcmp($endIndex, $city) == 0) {
                    echo " selected";
                }
                echo ">$city</option>\n";
            }
            ?>
        </select></p>
    <p><input type="submit" name="submit"
              value="Calculate Distance"/></p>
</form>

<?php

if (isset($_POST['submit']))
{
    $startIndex = stripslashes($_POST['Start']);
    $endIndex = stripslashes($_POST['End']);
    if (isset($distances[$startIndex][$endIndex]))
    {
        echo "<p>The distance from " . $startIndex . " to " .
            $endIndex . " is " . $distances[$startIndex][$endIndex]
            . " kilometers, or " . round(($kmToMiles * $distances[$startIndex][$endIndex]), 2) . " miles.</p>\n";
    } else
    {
        echo "<p>The distance from " . $startIndex . " to " .
            $endIndex . " is not in the array.</p>\n";
    }
}


?>



</body>
</html>










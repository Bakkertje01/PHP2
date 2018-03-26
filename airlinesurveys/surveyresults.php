<!DOCTYPE HTML>
<html>
<title>survey results</title>

<head>

</head>

<body>


<?php

//3
$DBConnect = mysqli_connect("127.0.0.1", "root", "");
if ($DBConnect === FALSE) {
    echo "<p>Unable to connect to the database server.</p>"
        . "<p>Error code " . mysqli_errno() . ": " . mysqli_error()
        . "</p>";
} //4
else {
    $DBName = "airportsurvey";
    if (!mysqli_select_db($DBConnect, $DBName)) {
        echo "<p>There are no entries in the bug report</p>";
    } //5
    else {
        $TableName = "survey";
        $SQLstring = "SELECT * FROM $TableName";
        $QueryResult = mysqli_query($DBConnect, $SQLstring);
        if (mysqli_num_rows($QueryResult) == 0) {
            echo "<p>There are no entries in the survey report!</p>";
        } //6
        else {
            echo "<p>The following surveys are reported</p>";
            echo "<table width='100%' border='1'>";
            echo "<tr><th>Date</th><th>time</th><th>flightnumber</th><th>airlinecompany</th><th>airfield</th><th>Friendliness_of_customer_staff</th><th>Space_for_luggage_storage</th><th>Comfort_of_seating</th><th>Cleanliness_of_aircraft</th><th>Noise_level_of_aircraft</th></tr>";
            while ($Row = mysqli_fetch_assoc($QueryResult)) {
                echo "<tr><td>".$Row['Date']."</td>";
                echo "<td>{$Row['time']}</td>";
                echo "<td>{$Row['flightnumber']}</td>";
                echo "<td>{$Row['airlinecompany']}</td>";
                echo "<td>{$Row['airfield']}</td>";
                echo "<td>{$Row['Friendliness_of_customer_staff']}</td>";
                echo "<td>{$Row['Space_for_luggage_storage']}</td>";
                echo "<td>{$Row['Comfort_of_seating']}</td>";
                echo "<td>{$Row['Cleanliness_of_aircraft']}</td>";
                echo "<td>{$Row['Noise_level_of_aircraft']}</td></tr>";
            }
        }//7
        mysqli_free_result($QueryResult);
    }
    mysqli_close($DBConnect);
}

?>
<p><a href="index.php">New surveys</a></p>

</body>


</html>

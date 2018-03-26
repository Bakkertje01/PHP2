<!DOCTYPE HTML>
<html>
<title>surveyreport</title>

<head>

</head>

<body>


<?php
// || empty($_POST['time']) || empty($_POST['flightnumber']) || empty($_POST['airlinecompany']) || empty($_POST['airfield']) || empty($_POST['q1'])
// || empty($_POST['q2']) || empty($_POST['q3']) || empty($_POST['q4']) || empty($_POST['q5'])

if (empty($_POST['Date']) || empty($_POST['time']) || empty($_POST['flightnumber']) || empty($_POST['airlinecompany']) || empty($_POST['airfield']) || empty($_POST['q1']) || empty($_POST['q2']) || empty($_POST['q3']) || empty($_POST['q4']) || empty($_POST['q5']) ) {
    echo "<p>you must enter everything</p>";
} //6

else {
    $DBConnect = mysqli_connect("127.0.0.1", "root", "");
    if ($DBConnect === FALSE) {
        echo "<p>Unable to connect to the database server.</p>"
            . "<p>Error code " . mysqli_errno() . ": "
            . mysqli_error() . "</p>";
    } //7
    else {
    }
    $DBName = "airportsurvey";
    if (!mysqli_select_db($DBConnect, $DBName)) {
        $SQLstring = "CREATE DATABASE $DBName";
        $QueryResult = mysqli_query($DBConnect,
            $SQLstring);
        if ($QueryResult === FALSE) {
            echo "<p>Unable to execute the query.</p>"
                . "<p>Error code "
                . mysqli_errno($DBConnect)
                . ": " . mysqli_error($DBConnect) . "</p>";
        } else {
            echo "<p>Database is gecreërd</p>";
        }
    }
    mysqli_select_db($DBConnect, $DBName);



    //8
    $TableName = "survey";
    $SQLstring = "SHOW TABLES LIKE '$TableName'";
    $QueryResult = mysqli_query($DBConnect, $SQLstring);
    if (mysqli_num_rows($QueryResult) == 0) {
        $SQLstring = "CREATE TABLE $TableName(countID SMALLINT NOT NULL AUTO_INCREMENT PRIMARY KEY, Date DATE, time TIME, flightnumber INT(40), airlinecompany VARCHAR(40), airfield VARCHAR(40), Friendliness_of_customer_staff VARCHAR(25), Space_for_luggage_storage VARCHAR(25), Comfort_of_seating VARCHAR(25), Cleanliness_of_aircraft VARCHAR(25), Noise_level_of_aircraft VARCHAR(25) )";
        $QueryResult = mysqli_query($DBConnect, $SQLstring);
        if ($QueryResult === FALSE) {
            echo "<p>Unable to create the table.</p>"
                . "<p>Error code "
                . mysqli_errno($DBConnect)
                . ": " . mysqli_error($DBConnect) . "</p>";
        }
    }

    $Date = stripslashes($_POST['Date']);
    $time = stripslashes($_POST['time']);
    $flightnumber = stripslashes($_POST['flightnumber']);
    $airlinecompany = stripslashes($_POST['airlinecompany']);
    $airfield = stripslashes($_POST['airfield']);
    $q1 = stripslashes($_POST['q1']);
    $q2 = stripslashes($_POST['q2']);
    $q3 = stripslashes($_POST['q3']);
    $q4 = stripslashes($_POST['q4']);
    $q5 = stripslashes($_POST['q5']);
    $SQLstring2 = "INSERT INTO $TableName VALUES(NULL,'$Date', '$time', '$flightnumber', '$airlinecompany', '$airfield', '$q1', '$q2', '$q3', '$q4', '$q5')";
    $QueryResult2 = mysqli_query($DBConnect, $SQLstring2);
    if ($QueryResult2 === FALSE) {
        echo "<p>Unable to execute the query.</p>"
            . "<p>Error code " . mysqli_errno($DBConnect)
            . ": " . mysqli_error($DBConnect) . "</p>";
    } else {
        echo "<h1>Bedant voor het doorgeven van een survey</h1>";
    }
    mysqli_close($DBConnect);
}


?>
<p><a href="surveyresults.php">vieuw past survey results</a></p>


</body>


</html>

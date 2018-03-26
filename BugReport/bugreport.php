<!DOCTYPE HTML>
<html>
<title>bugreport</title>

<head>

</head>

<body>

<?php

if (empty($_POST['productname']) || empty($_POST['version']) || empty($_POST['hardwaretype']) || empty($_POST['operationsystem']) || empty($_POST['foo']) || empty($_POST['proposedsolutions'])) {
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
    $DBName = "bugreport";
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
    $TableName = "bugs";
    $SQLstring = "SHOW TABLES LIKE '$TableName'";
    $QueryResult = mysqli_query($DBConnect, $SQLstring);
    if (mysqli_num_rows($QueryResult) == 0) {
        $SQLstring = "CREATE TABLE $TableName(countID SMALLINT NOT NULL AUTO_INCREMENT PRIMARY KEY, productname VARCHAR(40), version VARCHAR(40), hardwaretype VARCHAR(40), operationsystem VARCHAR(40), foo INT(40), proposedsolutions VARCHAR(200))";
        $QueryResult = mysqli_query($DBConnect, $SQLstring);
        if ($QueryResult === FALSE) {
            echo "<p>Unable to create the table.</p>"
                . "<p>Error code "
                . mysqli_errno($DBConnect)
                . ": " . mysqli_error($DBConnect) . "</p>";
        }
    }

    $productname = stripslashes($_POST['productname']);
    $version = stripslashes($_POST['version']);
    $hardwaretype = stripslashes($_POST['hardwaretype']);
    $operationsystem = stripslashes($_POST['operationsystem']);
    $foo = stripslashes($_POST['foo']);
    $proposedsolutions = stripslashes($_POST['proposedsolutions']);
    $SQLstring2 = "INSERT INTO $TableName VALUES(NULL,'$productname', '$version', '$hardwaretype', '$operationsystem', '$foo', '$proposedsolutions')";
    $QueryResult2 = mysqli_query($DBConnect, $SQLstring2);
    if ($QueryResult2 === FALSE) {
        echo "<p>Unable to execute the query.</p>"
            . "<p>Error code " . mysqli_errno($DBConnect)
            . ": " . mysqli_error($DBConnect) . "</p>";
    } else {
        echo "<h1>Bedant voor het doorgeven van de bugs</h1>";
        echo "<a href='bugreport.php'>Report bug</a>";
    }
    mysqli_close($DBConnect);
}


?>


</body>


</html>

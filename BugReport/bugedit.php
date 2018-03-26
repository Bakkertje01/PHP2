<!DOCTYPE HTML>
<html>
<title>bugedit</title>

<head>

</head>

<body>

<?php
$files = glob("./" . "*");

foreach ($files as $link) {

    $heh = explode('.', $link);


    $friendlylink = preg_replace('/[^A-Za-z0-9\-]/', '', $heh[1]);

    echo "<a href='$link'>-> $friendlylink</a><br>";
}

?>

<?php

//$countID = "";
$countID = $_GET['bugcount'];

$DBName = "bugreport";
$TableName = "bugs";

$DBConnect = mysqli_connect("127.0.0.1", "root", "");
if ($DBConnect === FALSE) {
    echo "<p>Unable to connect to the database server.</p>"
        . "<p>Error code " . mysqli_errno() . ": "
        . mysqli_error() . "</p>";
} else {
    $db = mysqli_select_db($DBConnect, $DBName);
    $DBquery = "SELECT * FROM $TableName WHERE countID = $countID";

    $dbresult = mysqli_query($DBConnect, $DBquery);
    if ($dbresult === false) {
        echo "error" . mysqli_errno($DBConnect) . mysqli_error($DBConnect);
        echo "query wordt niet uitgevoerd";
    } else {
        if (mysqli_num_rows($dbresult) == 0) {
            echo "geen rijen die aangepast kunnen worden";
        } else {
            echo "<form method='POST' action='bugedit.php?bugcount=$countID'>";
            while ($row = mysqli_fetch_assoc($dbresult)) {


                echo "productname <input type='text' name='productname' value='" . $row['productname'] . "'>";
                echo "<input type='text' name='version' value='" . $row['version'] . "'>";
                echo "<input type='text' name='hardwaretype' value='" . $row['hardwaretype'] . "'>";
                echo "<input type='text' name='operationsystem' value='" . $row['operationsystem'] . "'>";
                echo "<input type='number' name='foo' value='" . $row['foo'] . "'>";
                echo "<input type='text' name='proposedsolutions' value='" . $row['proposedsolutions'] . "'>";
                echo "<input type='submit' name='update' value='update'>";
            }
            echo "</form>";
        }

    }
}

if (isset($_POST['update'])) {

    $productname = stripslashes($_POST['productname']);
    $version = stripslashes($_POST['version']);
    $hardwaretype = stripslashes($_POST['hardwaretype']);
    $operationsystem = stripslashes($_POST['operationsystem']);
    $foo = stripslashes($_POST['foo']);
    $proposedsolutions = stripslashes($_POST['proposedsolutions']);


    $SQLstring2 = "UPDATE bugs SET productname='$productname', version='$version', hardwaretype='$hardwaretype', operationsystem='$operationsystem',foo=$foo, proposedsolutions='$proposedsolutions' WHERE countID= '$countID'";


    $QueryResult2 = mysqli_query($DBConnect, $SQLstring2);


    if ($QueryResult2 === FALSE) {
        echo "<p>Unable to execute the query.</p>"
            . "<p>Error code " . mysqli_errno($DBConnect)
            . ": " . mysqli_error($DBConnect) . "</p>";
    } else {
        echo "<h1>Thank you for reporting your bug!</h1>";
        header("www.youtube.nl");
        echo "<a href='showbug.php'>Back</a>";
    }
    mysqli_close($DBConnect);

} else {
    echo "test";
}
?>

</body>
</html>

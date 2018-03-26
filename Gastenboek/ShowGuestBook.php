<!DOCTYPE HTML>
<html>
<title>Show Guest Book</title>

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
    $DBName = "guestbook";
    if (!mysqli_select_db($DBConnect, $DBName)) {
        echo "<p>There are no entries in the guest book!</p>";
    } //5
    else {
        $TableName = "visitors";
        $SQLstring = "SELECT * FROM $TableName";
        $QueryResult = mysqli_query($DBConnect, $SQLstring);
        if (mysqli_num_rows($QueryResult) == 0) {
            echo "<p>There are no entries in the guest book!</p>";
        } //6
        else {
            echo "<p>The following visitors have signed our guest book:</p>";
            echo "<table width='100%' border='1'>";
            echo "<tr><th>First Name</th>
<th>Last Name </th></tr>";
            while ($Row = mysqli_fetch_assoc($QueryResult)) {
                echo "<tr><td>{$Row['first_name']}</td>";
                echo "<td>{$Row['last_name']}</td></tr>";
            }
        }//7
        mysqli_free_result($QueryResult);
    }
    mysqli_close($DBConnect);
}

?>


</body>


</html>

<!DOCTYPE HTML>
<html>
<title>Show bUg</title>

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


$DBConnect = mysqli_connect("127.0.0.1", "root", "");
if ($DBConnect === FALSE) {
    echo "<p>Unable to connect to the database server.</p>"
        . "<p>Error code " . mysqli_errno() . ": " . mysqli_error()
        . "</p>";
} //4
else {
    $DBName = "bugreport";
    if (!mysqli_select_db($DBConnect, $DBName)) {
        echo "<p>There are no entries in the bug report</p>";
    } //5
    else {
        $TableName = "bugs";
        $SQLstring = "SELECT * FROM $TableName";
        $QueryResult = mysqli_query($DBConnect, $SQLstring);
        if (mysqli_num_rows($QueryResult) == 0) {
            echo "<p>There are no entries in the bug report!</p>";
        } //6
        else {
            echo "<p>The following bugs are reported</p>";
            echo "<table width='100%' border='1'>";
            echo "<tr><th>productname</th><th>version</th><th>hardwaretype</th><th>operationsystem</th><th>foo</th><th>proposedsolutions</th></tr>";
            while ($Row = mysqli_fetch_assoc($QueryResult)) {
                echo "<tr><td>{$Row['productname']}</td>";
                echo "<td>{$Row['version']}</td>";
                echo "<td>{$Row['hardwaretype']}</td>";
                echo "<td>{$Row['operationsystem']}</td>";
                echo "<td>{$Row['foo']}</td>";
                echo "<td>{$Row['proposedsolutions']}</td>";
                echo "<td><a href='bugedit.php?bugcount={$Row['countID']}'>Edit</a></td></tr>";
            }
        }//7
        mysqli_free_result($QueryResult);
    }
    mysqli_close($DBConnect);
}

?>
<p><a href="index.php">New bug report</a></p>

</body>


</html>

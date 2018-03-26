<!DOCTYPE HTML>
<html>
<title>Show zodiac</title>

<head>

</head>

<body>
<?php


include "inc_connect.php";


    $DBName = "chinese_zodiac";
    if (!mysqli_select_db($DBConnect, $DBName)) {
        echo "<p>There are no entries in the bug report</p>";
    } //5
    else {
        $TableName = "zodiacfeedback";
        $SQLstring = "SELECT * FROM $TableName WHERE public_message = true";
        $QueryResult = mysqli_query($DBConnect, $SQLstring);
        if (mysqli_num_rows($QueryResult) == 0) {
            echo "<p>There are no entries in the zodiac report!</p>";
        } //6
        else {
            echo "<p>The following zodiac things are reported</p>";
            echo "<table width='100%' border='1'>";
            echo "<tr><th>message_date</th><th>message_time</th><th>sender</th><th>message</th></tr>";
            while ($Row = mysqli_fetch_assoc($QueryResult)) {
                echo "<tr><td>{$Row['message_date']}</td>";
                echo "<td>{$Row['message_time']}</td>";
                echo "<td>{$Row['sender']}</td>";
                echo "<td>{$Row['message']}</td>";

                //echo "<td><a href='bugedit.php?bugcount={$Row['countID']}'>Edit</a></td></tr>";
            }
        }//7
        mysqli_free_result($QueryResult);
    }
    mysqli_close($DBConnect);


?>
<p><a href="zodiac_feedback.html">New zodiac</a></p>

</body>


</html>

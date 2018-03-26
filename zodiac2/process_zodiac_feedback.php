<?php
include "inc_connect.php";

if (empty($_POST['sender']) || empty($_POST['message'])) { // zijn de formulieren ingevuld
    echo "<p>You must enter your name and message. And if you want your message and name to be publicly displayed..</p><br><a href='zodiac_feedback.html'>Previous page</a>";
}
else
{
    $date = date('Y-m-d');
    $time = date('H:i:s');
    $sender = $_POST['sender'];
    $message = $_POST['message'];

    $public_message = false;

    if (isset($_POST['public_message'])){
        $public_message = true;
    }

    $sql = "INSERT INTO zodiacfeedback (message_date, message_time, sender, message, public_message) " // uit het formulier naar de database versturen
        . "VALUES ('$date','$time','$sender','$message','$public_message')";
    if (!mysqli_query($DBConnect, $sql))
    {
        echo "not inserted<br>";
        echo mysqli_error($DBConnect);
    } else
    {
        echo "<br>inserted<br>";
        echo "<p>Thank you for entering a comment, the comment was successfully added</p>";
        //header("Location: view_zodiac_feedback.php");
    }
}

echo "<p><a href='view_zodiac_feedback.php'>view zodiac feedback</a></p>";

?>
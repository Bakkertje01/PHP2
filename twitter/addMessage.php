<?php
include_once 'include/db_connection.php';
/*if (mysqli_connect_errno($db)) // connectie maken met de database
{
    echo "Connectie Database mislukt: " . mysqli_connect_error();
}*/
//$_SESSION['userId'] = 0;

if (isset($_SESSION['userId']) && $_SESSION['userId'] == true) // is de gebruiker ingelogd?
{
    echo "Plaats je tweet";

    if (isset($_POST['submit'])) {

        $bericht = trim($_POST['bericht']);
        $bericht = strip_tags($bericht);

        if (empty ($_POST['bericht'])) {
            echo "<br>vul het veld in";
        } else {

            $bericht = mysqli_escape_string($db, htmlspecialchars($_POST["bericht"]));; // haal uit bericht
            $userId = $_SESSION['userId'];
            //$date = date('Y:m:d:H:i');
            $sql = "INSERT INTO stenden_messages(`message`, `userId`) VALUES('$bericht', $userId)";
            // haal uit bericht en zet in de database
            if (!mysqli_query($db, $sql)) {
                mysqli_close($db);
                die;//('Error: ' . mysqli_error($db)); //  indien het niet lukt het in de database toe te voegen
            }
        }
    }



} else {
    echo "Je moet <a href = 'login.php'> inloggen</a> voor je een bericht kunt plaatsen.";

}


//session_destroy();
?>
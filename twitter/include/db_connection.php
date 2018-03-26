<?php
/*// DATABASE CONNECTION
define("DB_SERVER", "localhost");//database host
define("DB_USER", "root");                //database login name
define("DB_PASS", "");                //database login password
define("DB_NAME", "twitter");        //database name
$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

//Test connection
if (mysqli_connect_errno()) {
    die ("Database connection failed: " .
        mysqli_connect_error() .
        " (" . mysqli_connect_errno() . ")"
    );
}

else {
    //echo "connected";
}*/


$server = "localhost";
$user = "root";
$pass = "";
$dbName = "twitter";
$db = new mysqli($server, $user, $pass, $dbName);
if ($db->connect_errno) {
    echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
}


?>
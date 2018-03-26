<?php include_once('include/db_connection.php') ?>

<?php
session_start();
?>
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<title>1 Col Portfolio - Start Bootstrap Template</title>

<!-- Bootstrap Core CSS -->
<link href="../css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="../css/1-col-portfolio.css" rel="stylesheet">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<form action="start.php" method="post" id="login">

    <p>Inloggen<br></p>

    <div class="field-group">
        <div><label for="userEmail">Email</label></div>
        <div><input name="userEmail" type="text"></div>
    </div>
    <div class="field-group">
        <div><label for="password">Password</label></div>
        <div><input name="password" type="password"></div>
    </div>
    <div><input type="submit" name="login" value="Login" class="form-submit-button"></span></div>
    </div>
</form>

<form action="../logout.php">
    <button>Log out</button>
</form>


<?php
if (isset($_SESSION['userId'])) {
    echo $_SESSION['userId']; //in plaats van user id, de addmessage.php includen //het 1 tje

    include 'start.php';

} else {
    echo "you are not logged in!";
    /*echo"<form action='login2.php' method='post' autocomplete='off'><input name=\"register\" value=\"register\" type=\"submit\"></form>";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['register'])) {
            require 'signUp2.php';
        }
    }*/
}
?>


<p><a href="signUp2.php">registreren</a></p>

<?php

//session_start();

if (isset($_POST["login"])) {

    $login = $_POST['userEmail'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM stenden_users WHERE userEmail= '$login'";
    $result = $db->query($sql);

    $row = mysqli_fetch_array($result);

    if (is_array($row) && password_verify($password, $row['Wachtwoord']) ) {

        //echo "your are logged in!";
        $_SESSION['userId'] = $row['userId'];
    } else {
        echo "your username or password is incorrect!";

    }
}

?>


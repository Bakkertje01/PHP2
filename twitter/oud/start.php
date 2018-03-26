<body>
<?php
session_start();
//include_once 'hidden.header.php';
//include_once 'hidden.menu.php';

?>

<form action="../logout.php">
    <button>Log out</button>
</form>
<div class="jumbotron">
    <div class="container text-center">

        <h2>Stenden Twitter</h2>
        <form class="form-style" method="POST">


            <label for="bericht">Tweet</label><br><br>
            <textarea style="overflow:auto;resize:none" rows="4" cols="50" maxlength="140" name="bericht"></textarea><br><br>
            <span>Vertel het eens!</span>

            <input name="submit" value="Tweet" type="submit">
            <input type="submit" name="reset" value="Reset">


        </form>

        <?php
        //gastenboek invullen
        include 'addMessage.php';

        //Bekijken gastenboek



        $result = mysqli_query($db, "SELECT `userName` ,`message` FROM `stenden_messages` INNER JOIN `stenden_users` ON stenden_messages.userId = stenden_users.userId "); // haal uit de database //AANVULLEN JOIN ON user.id = bericht.userid


        if (mysqli_num_rows($result) == 0) // staat er al iets in
        { // gastenboek is nog leeg
            echo 'Schrijf als eerste in het gastenboek!';
        } else
        {

        while ($row = mysqli_fetch_array($result))
        {
            echo "<div class='row'>";
            echo "<div class='col-md-5'>";
            echo "<h3>Project Two</h3>";
            echo "<h4>".($row['userName']) . "</h4>";
            echo "<p>".($row['message']) ."</p><br>";

            echo "</div></div>";

            echo "<hr>";
        }

            }
            mysqli_close($db); // sluit connectie
        ?>
        </div>
    </div>
</body>

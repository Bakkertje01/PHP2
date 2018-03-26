<?php
include 'include/header.php';

?>
<!-- Page Content -->
<div class="container">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <img src="include/logo.jpg" alt="logo"/>
            <h1 class="page-header">
                <small>Home</small>
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <!-- Project One -->
    <div class="row">

        <div class="col-md-5">
            <h3>Tweet</h3>
            <!--   <h4>Subheading</h4>-->
            <form class="form-style" method="POST" name="tweet">


                <label for="bericht">Tweet</label><br><br>
                <textarea style="overflow:auto;resize:none" rows="4" cols="50" maxlength="140"
                          name="bericht"></textarea><br><br><br>

                <input name="submit" value="Tweet" type="submit">
                <input type="submit" name="reset" value="Reset"><br><br>
                <?php
                //berichten toevoegen
                include 'addMessage.php';
                ?>


            </form>
            <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium veniam exercitationem expedita laborum at voluptate. Labore, voluptates totam at aut nemo deserunt rem magni pariatur quos perspiciatis atque eveniet unde.</p>
            <a class="btn btn-primary" href="#">View Project <span class="glyphicon glyphicon-chevron-right"></span></a>-->
        </div>
    </div>
    <!-- /.row -->

    <hr>

    <!-- Project Two -->
    <?php

    //Bekijken berichten



    $result = mysqli_query($db, "SELECT `userName` ,`message`, `userImagePath` FROM `stenden_messages` INNER JOIN `stenden_users` ON stenden_messages.userId = stenden_users.userId ORDER BY `msgId` DESC"); // haal uit de database //AANVULLEN JOIN ON user.id = bericht.userid


    if (mysqli_num_rows($result) == 0) // staat er al iets in
    {
        echo 'Tweet als eerste!!';
    } else {

        while ($row = mysqli_fetch_array($result)) {
            echo "<div class='row'>";
            //echo "<div class='col-md-7'><a href='#'><img class='img-responsive' src='{$row['userImagePath']}' width='100px' height='100px' alt=''></a></div>";
            echo "<div class='avatar'><img class='img-responsive' src='{$row['userImagePath']}' width='100px' height='100px' alt=''></div>";

            echo "<div class='col-md-5'>";
           // echo "<div class='avatar'><img class='avatar' src='{$row['userImagePath']}' width='100px' height='100px' alt='avatar'></div>";
            echo "<h4>" . ($row['userName']) . "</h4>";
            echo "<p>" . ($row['message']) . "</p>";

            echo "</div></div>";

            echo "<hr>";
        }

    }
    mysqli_close($db); // sluit connectie

    ?>

    <?php
    include 'include/footer.php';
    ?>

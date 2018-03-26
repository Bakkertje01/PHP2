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
                <small>Login</small>
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <!-- Project One -->
    <div class="row">

        <div class="col-md-5">
            <h3>Login</h3>
            <!--   <h4>Subheading</h4>-->

            <form action="login.php" method="post" id="login">



                <div>
                    <div><label for="userEmail">Email</label></div>
                    <div><input name="userEmail" type="text"></div>
                </div>
                <div>
                    <div><label for="password">Password</label></div>
                    <div><input name="password" type="password"></div><br>
                </div>
                <div><input type="submit" name="login" value="Login" class="form-submit-button"></span></div>

        </form>


        <?php
        if (isset($_SESSION['userId'])) {
            //echo $_SESSION['userId'];

        } else {
            //echo "you are not logged in!";
        }
        ?>


        <?php

        //session_start();

        if (isset($_POST["login"])) {

            $login = $_POST['userEmail'];
            $pass = $_POST['password'];

            $login = trim($_POST['userEmail']);
            $login = strip_tags($login);
            $login = htmlspecialchars($login);

            $pass = trim($_POST['password']);
            $pass = strip_tags($pass);
            $pass = htmlspecialchars($pass);

            $sql = "SELECT * FROM stenden_users WHERE userEmail= '$login'";
            $result = $db->query($sql);

            $row = mysqli_fetch_array($result);

            if (is_array($row) && password_verify($pass, $row['userPass']) ) {

                echo "<h4>Ingelogd!, je wordt automatisch doorgestuurd</h4>";

                $_SESSION['userId'] = $row['userId'];

                header ('Refresh: 2; URL=index.php');

            } else {
                echo "your username or password is incorrect!";

            }
        }

        ?>



            <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium veniam exercitationem expedita laborum at voluptate. Labore, voluptates totam at aut nemo deserunt rem magni pariatur quos perspiciatis atque eveniet unde.</p>
            <a class="btn btn-primary" href="#">View Project <span class="glyphicon glyphicon-chevron-right"></span></a>-->
        </div>
    </div>
    <!-- /.row -->

    <hr>

    <!-- Project Two -->
    <?php



    ?>

<?php
include 'include/footer.php';
?>
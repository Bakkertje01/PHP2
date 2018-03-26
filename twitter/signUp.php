<?php
include 'include/header.php';
ob_start();
?>
<!--

<!-- Page Content -->
<div class="container">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <img src="include/logo.jpg" alt="logo"/>
            <h1 class="page-header">
                <small>Registreren</small>
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <!-- Project One -->
    <div class="row">

        <div class="col-md-5">
            <h3>Registreren</h3>
            <!--   <h4>Subheading</h4>-->
            <form id='register' action='signUp.php' method='post' enctype="multipart/form-data">
                <label for='userName'>Gebruikersnaam*: </label><br/>
                <input type='text' name='userName' id='userName' maxlength="15"/><br/>

                <label for='userEmail'>Email adres*:</label><br/>
                <input type='text' name='userEmail' id='userEmail' maxlength="100"/><br/>

                <label for='userPass'>Wachtworod*:</label><br/>
                <input type='password' name='userPass' id='userPass' maxlength="50"/><br/>

                <label for='fileToUpload'>Kies profielfoto*:</label><br/>
                <input type="file" name="fileToUpload" id="fileToUpload">

                <p>* Verplicht in te vullen.</p>
                <input id='submit' type='submit' name='Submit' value='Registreren'/><br/>
            </form>


            <?php
            //Registration script
            if (isset($_POST["Submit"])) {
                //The post values have to be the same as the form <name> tag
                $userName = trim($_POST['userName']);
                $userName = strip_tags($userName);
                $userName = htmlspecialchars($userName);

                $userEmail = trim($_POST['userEmail']);
                $userEmail = strip_tags($userEmail);
                $userEmail = htmlspecialchars($userEmail);

                $userPass = trim($_POST['userPass']);
                $userPass = strip_tags($userPass);
                $userPass = htmlspecialchars($userPass);



                //FILE UPLOAD
                $target_dir = "images/uploads";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

                $uploadOk = 1;
                $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
                // Check if image file is a actual image or fake image
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if ($check !== false) {
                    echo "<p>Bestand is een afbeelding - " . $check["mime"] . ".</p>";
                    $uploadOk = 1;
                } else {
                    echo "<p>Bestand is geen afbeelding.</p>";
                    $uploadOk = 0;
                }

              /*  // Check if file already exists
                if (file_exists($target_file)) {
                    echo "<p>Sorry, het bestand bestaat al.</p>";
                    $uploadOk = 0;
                }*/
                // Check file size
                if ($_FILES["fileToUpload"]["size"] > 5000000) {
                    echo "<p>Sorry, het bestand is te groot.</p>";
                    $uploadOk = 0;
                }
                // Allow certain file formats
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif"
                ) {
                    echo "<p>Sorry, alleen JPG, JPEG, PNG & GIF bestanden zijn toegestaan.</p>";
                    $uploadOk = 0;
                }
                $fileCount = count(glob('images/uploads/*'));
                $newName = $target_dir . '/' . ($fileCount + 1) . '.' . $imageFileType;
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "<p>Sorry, uw bestand is niet geupload.</p>";
                    // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $newName)) {
                        //echo "<p>Het bestand " . basename($_FILES["fileToUpload"]["name"]) . " is geupload.</p>";


                        if (empty ($_POST['userName'])
                            || empty ($_POST['userEmail'])
                            || empty ($_POST['userPass'])
                        ) {
                            echo "please fill in all fields";
                        } else {
                            //hasing the password
                            $userPass = password_hash($userPass, PASSWORD_BCRYPT);
                            //defining the query
                            $sql = "INSERT INTO stenden_users ";
                            $sql .= "(userName, userEmail, 	userPass, userImagePath) ";
                            $sql .= "VALUES ('$userName', '$userEmail', '$userPass', '$newName')";
                            $result = mysqli_query($db, $sql);

                            echo "<h4>Geregistreerd!, je wordt automatisch doorgestuurd</h4>";

                            header ('Refresh: 3; URL=login.php');

                            ob_end_flush();




                            if ($result === false) {
                                echo "ERROR" . mysqli_errno() . " : " . mysqli_error();
                            }
                        }


                    } else {
                        echo "<p>Sorry, er was een probleem bij het uploaden van de afbeelding</p>";
                    }
                }


                //FILE UPLOAD


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

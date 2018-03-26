<?php
session_start();
?>

<html>

<head>
    <link rel="icon" type="image/png" href="hide/fav.png"/>
</head>

<body>

<?php include 'include/db_connection.php'; ?>

<?php //include 'include/session.php';?>
<?php
//include 'hidden.header.php';


?>







                    <form id='register' action='signUp2.php' method='post' enctype="multipart/form-data">
                        <label for='userName'>userName*: </label><br/>
                        <input type='text' name='userName' id='userName' maxlength="15"/><br/>

                        <label for='userEmail'>Email Address*:</label><br/>
                        <input type='text' name='userEmail' id='userEmail' maxlength="100"/><br/>

                        <label for='userPass'>Password*:</label><br/>
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
    $userName = $_POST['userName'];
    $userEmail = $_POST['userEmail'];
    $userPass = $_POST['userPass'];


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

// Check if file already exists
    if (file_exists($target_file)) {
        echo "<p>Sorry, het bestand bestaat al.</p>";
        $uploadOk = 0;
    }
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
    $fileCount = count(glob('images/uploads*'));
    $newName = $target_dir . '/' . ($fileCount + 1) . '.' . $imageFileType;
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<p>Sorry, uw bestand is niet geupload.</p>";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $newName)) {
            echo "<p>Het bestand " . basename($_FILES["fileToUpload"]["name"]) . " is geupload.</p>";
        } else {
            echo "<p>Sorry, er was een probleem bij het uploaden.</p>";
        }
    }


    //FILE UPLOAD


    if (empty ($_POST['userName'])
        || empty ($_POST['userEmail'])
        || empty ($_POST['userPass'])
    ) {
        echo "please fill in all fields";
    } else {
        //hasing the password
        //$userPass = password_hash($userPass, PASSWORD_BCRYPT);
        //defining the query
        $sql = "INSERT INTO stenden_users ";
        $sql .= "(userName, userEmail, 	userPass, userImagePath) ";
        $sql .= "VALUES ('$userName', '$userEmail', '$userPass', '$newName')";
        $result = mysqli_query($db, $sql);

        header("Location: login2.php");


        if ($result === false) {
            echo "ERROR" . mysqli_errno() . " : " . mysqli_error();
        }
    }
}
?>






<?php

//include 'hidden.footer.php';

?>

</body>

</html>

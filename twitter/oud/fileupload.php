<?php
/**
 * Created by PhpStorm.
 * User: Gebruiker
 * Date: 13-6-2017
 * Time: 21:10
 */


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

?>
//FILE UPLOAD
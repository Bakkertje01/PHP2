<!DOCTYPE HTML>
<html>
<head>

</head>
<title>Song Organizer</title>
<body>

<a href="opdracht1.php">Opdracht 1</a><br>
<a href="opdracht1-2.php">Opdracht 1.2</a><br>
<a href="opdracht1-3.php">Opdracht 1.3</a><br>
<a href="opdracht1-4.php">Opdracht 1.4</a><br>
<a href="opdracht1-5.php">Opdracht 1.5</a><br>
<a href="opdracht1-6.php">Opdracht 1.6</a><br>
<hr>


<h1>Song Organizer</h1>
<?php
if (isset($_GET['action']))
{
    if ((file_exists("SongOrganizer/songs.txt")) &&
        (filesize("SongOrganizer/songs.txt") != 0))
    {
        $SongArray = file("SongOrganizer/songs.txt");
        switch ($_GET['action'])
        {
            case 'Remove Duplicates':
                $SongArray = array_unique($SongArray);
                $SongArray = array_values($SongArray);
                break;
            case 'Sort Ascending':
                sort($SongArray);
                break;
            case 'Sort Descending':
                rsort($SongArray);
                break;
            case 'Shuffle':
                shuffle($SongArray);
                break;
            case 'Delete First':
                array_shift($SongArray);
                break;
            case 'Delete Last':
                array_pop($SongArray);
                break;
        }
        if (count($SongArray) > 0)
        {
            $NewSongs = implode($SongArray);
            $SongStore = fopen("SongOrganizer/songs.txt", "wb");
            if ($SongStore === false)
            {
                echo "There was an error updating the song file\n";
            } else
            {
                fwrite($SongStore, $NewSongs);
                fclose($SongStore);
            }
        } else
        {
            unlink("SongOrganizer/songs.txt");
        }
    }
}

if (isset($_POST['submit']))
{
    $SongToAdd = stripslashes($_POST['SongName']) . "-" . stripslashes($_POST['ArtistName']) . "\n";
    $ExistingSongs = array();
    if (file_exists("SongOrganizer/songs.txt") &&
        filesize("SongOrganizer/songs.txt") > 0)
    {
        $ExistingSongs = file("SongOrganizer/songs.txt");
    }
    if (in_array($SongToAdd, $ExistingSongs) || empty($_POST['SongName']))
    {
        echo "<p>The song you entered already exists!<br>\n";
        echo "Your song was not added to the list.</p>";
    } else
    {
        $SongFile = fopen("SongOrganizer/songs.txt", "ab");
        if ($SongFile === false)
        {
            echo "There was an error saving your message!\n";
        } else
        {
            if (!empty($_POST['SongName']))
            {
                fwrite($SongFile, $SongToAdd);
                fclose($SongFile);
                echo "Your song has been added to the list.\n";
            }
        }
    }
}

if ((!file_exists("SongOrganizer/songs.txt")) ||
    (filesize("SongOrganizer/songs.txt") == 0))
{
    echo "<p>There are no songs in the list.</p>\n";
} else
{
    $ArtistArray = file("SongOrganizer/songs.txt");
    $SongArray = file("SongOrganizer/songs.txt");
    echo "<table border=\"1\" width=\"50%\"
                      style=\"background-color:lightgray\">\n";

    echo "<tr><th>Song</th> ";
    echo "<th>Artist</th></tr>";



    foreach ($SongArray as $Song)
    {
        $sawng = explode('-', $Song);
        echo "<tr>";
        echo '<td>' . ucfirst(htmlentities($sawng[0])) . '</td>' . '<td>' . ucfirst(htmlentities($sawng[1])) . '</td>';

        echo "</tr>";
    }





    echo "</table>\n";
}
?>

<form action="opdracht1-3.php" method="post">
    <p><b>Add a New Song</b></p>
    <p>Song Name: <input type="text" name="SongName"/></p>
    <p>Artist Name: <input type="text" name="ArtistName"/></p>
    <p>
        <input type="submit" name="submit"
               value="Add Song to List" />
        <input type="reset" name="reset"
               value="Reset Song Name" />
    </p> </form>

<p>
    <a href="opdracht1-3.php?action=Sort%20Ascending">
        Sort Song List</a><br>
    <a href="opdracht1-3.php?action=Remove%20Duplicates">
        Remove Duplicate Songs</a><br>
    <a href="opdracht1-3.php?action=Shuffle">
        Randomize Song list</a><br>
    <a href="opdracht1-3.php?action=Sort%20Descending">
        Sort Song list Descending</a><br>
    <a href="opdracht1-3.php?action=Delete%20First">
        Delete First Song</a><br>
    <a href="opdracht1-3.php?action=Delete%20Last">
        Delete Last Song</a><br>
</p>
</body>
</html>
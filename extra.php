<?php
/**
 * Created by PhpStorm.
 * User: Ernst-Jan Bakker
 * Date: 3-5-2017
 * Time: 13:52
 */
?>

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

<h1>rekenen</h1>

<?php
$skitprijs = 38;
$yogprijs = 22;
$pizprijs = 9;
$fietsstalprijs = 12;
$pannenkoekprijs = 2;




if (isset($_POST['submit']))
{
    $totalskitprijs = $skitprijs * $_POST['qskit'];
    $totalyogprijs = $yogprijs * $_POST['qyog'];
    $totalpizprijs = $pizprijs * $_POST['qpiz'];
    $totalfietsstalprijs = $fietsstalprijs * $_POST['qfiet'];
    $totalpannenkoekprijs = $pannenkoekprijs * $_POST['qpan'];

    $supertotal = $totalskitprijs + $totalyogprijs + $totalpizprijs + $totalfietsstalprijs + $totalpannenkoekprijs;
}
?>
<form action="opdracht1-6.php" method="post">
    <table style="table-layout:fixed; text-align: center;" width="1000">
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th></th>
            <th>Quantity</th>
            <th></th>
            <th></th>
            <th>Total</th>
        </tr>

        <tr>
            <td>Skittles</td>
            <td>Doosje van 211</td>
            <td><p>Inc. BTW.</p></td>
            <td><?php echo '&euro; ' . $skitprijs; ?></td>
            <td><input type="number" name="qskit"></td>
            <td></td>
            <td>=</td>
            <td><?php
                if (isset($_POST['submit']))
                {
                    echo '&euro; ' . $totalskitprijs;
                }
                ?></td>
        </tr>

        <tr>
            <td>Yogamatje</td>
            <td>Van hout</td>
            <td><p>Inc. BTW.</p></td>
            <td><?php echo '&euro; ' . $yogprijs; ?></td>
            <td><input type="number" name="qyog"></td>
            <td></td>
            <td>=</td>
            <td><?php
                if (isset($_POST['submit']))
                {
                    echo '&euro; ' . $totalyogprijs;
                }
                ?></td>
        </tr>

        <tr>
            <td>Pizzasnijder</td>
            <td>Met een funky randje</td>
            <td><p>Inc. BTW.</p></td>
            <td><?php echo '&euro; ' . $pizprijs; ?></td>
            <td><input type="number" name="qpiz"></td>
            <td></td>
            <td>=</td>
            <td><?php
                if (isset($_POST['submit']))
                {
                    echo '&euro; ' . $totalpizprijs;
                }
                ?></td>
        </tr>

        <tr>
            <td>Fietsstalling</td>
            <td>Van het merk Ronsen</td>
            <td><p>Inc. BTW.</p></td>
            <td><?php echo '&euro; ' . $fietsstalprijs; ?></td>
            <td><input type="number" name="qfiet"></td>
            <td></td>
            <td>=</td>
            <td><?php
                if (isset($_POST['submit']))
                {
                    echo '&euro; ' . $totalfietsstalprijs;
                }
                ?></td>
        </tr>

        <tr>
            <td>Pannenkoek</td>
            <td>Van Bollejan</td>
            <td><p>Inc. BTW.</p></td>
            <td><?php echo '&euro; ' . $pannenkoekprijs; ?></td>
            <td><input type="number" name="qpan"></td>
            <td></td>
            <td>=</td>
            <td><?php
                if (isset($_POST['submit']))
                {
                    echo '&euro; ' . $totalpannenkoekprijs;
                }
                ?></td>

        </tr>


        <tr>

            <td></td>
            <td></td>
            <td><p>Inc. BTW.</p></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td id="lastrow"><?php
                if (isset($_POST['submit']))
                {
                    echo '&euro; <b>' . $supertotal . '</b>';
                } else
                {
                    echo 'Totaal: &euro;';
                }
                ?></td>

        </tr>

        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><input type="submit" value="Update" name="update">
                <input type="submit" value="Submit" name="submit"></td>
        </tr>


    </table>

</form>

<?php ?>

</body>
</html>


1.4
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


<h1>Zodiac</h1>

<p>Enter 12 zodiac signs in a random order and separate them using commas.<br>
    <i><u>Don't use for voodoo purposes.</u></i>
</p>

<p>Try this:<br>
    Aries, Taurus, Gemini, Cancer, Leo, Virgo, Libra, Scorpio, Sagittarius, Capricorn, Aquarius, Pisces</p>

<form action="opdracht1-4.php" method="POST">
    <p>Enter Zodiac Signs Here:</p>
    <input type="text" name="signs"><br><br>
    <input type="submit" name="submit" value="Klik!">
</form>

<p>

    <?php
    if (isset($_POST['submit']) & empty($_POST['signs']))
    {
        echo '<b>Nothing was entered</b>';
        $signsString = 0;
    }

    if (isset($_POST['submit']) & !empty($_POST['signs']))
    {
        $signsString = $_POST['signs'];
        $seperatedsigns = explode(',', $signsString);

        $sortedSigns = natcasesort($seperatedsigns);

        echo '<b>The zodiac signs are displayed in alphabetical order:<br><br></b>';



        echo '<ol>';

        foreach ($seperatedsigns as $sign)
        {

            echo '<li><i>' . ucwords($sign) . '</i></li><br>';
        }
        echo '</ol>';
    }



    ?>

</body>

</html>
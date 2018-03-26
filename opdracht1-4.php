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

<p>Vul (in het engels) alle zodiac dingen in. Gescheiden door een komma<br>

</p>

<p>Try this:<br>
    Aries, Taurus, Gemini, Cancer, Leo, Virgo, Libra, Scorpio, Sagittarius, Capricorn, Aquarius, Pisces</p>

<form action="opdracht1-4.php" method="post">
    <textarea name="zodiacs" rows="4" cols="50"></textarea>
    <p><input type="submit" name="submit" value="GO!!"/></p>
</form>

<?php
$zodiacCheck = array('Capricorn', 'Aquarius', 'Pisces', 'Aries', 'Taurus', 'Gemini', 'Cancer', 'Leo', 'Virgo', 'Libra', 'Scorpio', 'Sagittarius');
$zodiacCheck = array_map('strtolower', $zodiacCheck);
sort($zodiacCheck);

if (isset($_POST['submit']))
{
    $zodiacArray = explode(", ",$_POST['zodiacs']);
    $zodiacArray = array_map('strtolower', $zodiacArray);
    sort($zodiacArray);

    if ($zodiacArray == $zodiacCheck) {
        echo "<ol>";
        foreach ($zodiacArray as $zodiacSorted) {
            $zodiacSorted = ucfirst($zodiacSorted);
            echo "<li>$zodiacSorted</li>";
        };
        echo "</ol>";
    }
    else{
        echo "Vul alle zodiac sings in, probeer dit: ";
        echo "Aries, Taurus, Gemini, Cancer, Leo, Virgo, Libra, Scorpio, Sagittarius, Capricorn, Aquarius, Pisces";
    }
}
?>

</body>

</html>
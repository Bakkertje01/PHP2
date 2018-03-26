<?php
/**
 * Created by PhpStorm.
 * User: Ernst-Jan Bakker
 * Date: 3-5-2017
 * Time: 13:38
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

<h1>Zodiac 2</h1>

<?php
$pictures = array(
    'zodiac/aquarius.jpg' => 'Aquarius',
    'zodiac/aries.jpg' => 'Aries',
    'zodiac/cancer.jpg' => 'Cancer',
    'zodiac/capricorn.jpg' => 'Capricorn',
    'zodiac/gemini.jpg' => 'Gemini');

foreach ($pictures as $key => $picture)
{
    echo '<a href = ' . $key . '><img src="' . $key . '" title="' . $picture . '" width="50"></a>';
}
?>

</body>

</html>
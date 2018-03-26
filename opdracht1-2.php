<!DOCTYPE HTML>
<html>
<head>

</head>
<body>

<a href="opdracht1.php">Opdracht 1</a><br>
<a href="opdracht1-2.php">Opdracht 1.2</a><br>
<a href="opdracht1-3.php">Opdracht 1.3</a><br>
<a href="opdracht1-4.php">Opdracht 1.4</a><br>
<a href="opdracht1-5.php">Opdracht 1.5</a><br>
<a href="opdracht1-6.php">Opdracht 1.6</a><br>
<hr>

<?php
/**
 * Created by PhpStorm.
 * User: Ernst-Jan Bakker
 * Date: 21-4-2017
 * Time: 12:03
 */

//multidimensional associative array

$boxes = array(
    "Small Box" => array("Length" => 12, "Width" => 10, "Depth" => 2.5),
    "middle Box" => array("Length" => 30, "Width" => 20, "Depth" => 4),
    "large Box" => array("Length" => 60, "Width" => 40, "Depth" => 11.5),
);

/**
print "<pre>";
print_r($box);
print "</pre>";

$inhoudSmall = $box["Smallbox"]["Length"] * $box["Smallbox"]["Width"] * $box["Smallbox"]["Depth"];
$inhoudMiddle = $box["middlebox"]["Length"] * $box["middlebox"]["Width"] * $box["middlebox"]["Depth"];
$inhoudLarge = $box["largebox"]["Length"] * $box["largebox"]["Width"] * $box["largebox"]["Depth"];

echo "The volume of the Small Box is: " . $inhoudSmall . "<br/>";
echo "The volume of the Middle Box is: " . $inhoudMiddle . "<br/>";
echo "The volume of the Large Box is: " . $inhoudLarge . "<br/>";

 * **/

foreach($boxes as $box => $item){
    echo 'The volume of the ' . $box . 'is: ';
    echo $item['Length'] * $item['Width'] * $item['Depth'];

    echo ' Cm3' . '<br>';
}

?>
</body>

</html>

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


<h1>ORDER LIST</h1>
<hr>
<?php
$header = array("Name","Description","Price","Quantity","Total");
$product = array(
    "Forhoja" => "kistje set van 4" ,
    "Lagis" => "muismat",
    "Skribeat" =>"boekensteun",
    "Moppe" =>"Miniladekast",
    "Dokument" => "pennenkoker");
$price = array(14.95,0.99,3.99,11.95,1.99);
?>
<table>
    <form>
        <tr>
            <?php
            foreach($header as $head ){
                echo"<th>".$head."<th>";
            }
            ?>
        </tr>
        <tr>
            <?php
            $X=0;
            foreach($product as $name => $item){
            echo"<td>".$name."<td>";
            echo"<td>".$item."<td>";
            echo"<td>".$price[$X]."<td>";
            echo"<td><input type='number' name='Tbox$X'><td>";
            $X++;
            ?>
        </tr>
        <tr>
        </tr>
        <tr>
        </tr>
        <tr>
        </tr>
        <tr>
            <?php
            }
            echo"<td><td>";
            echo"<td><td>";
            echo"<td><td>";
            echo"<td><input type='submit' name='submit'><td>"; // deze en update onder elkaar
            echo"<td><input type='submit' name='update' value='update'><td>";
            ?>
        </tr>
    </form>
</table>
</body>
</html>
<html>
<body>
<form method="post" action="" name="form1">

    <h1>hotelkamerreserveringssysteem</h1>

    naam:<br>
    <input type='text' name='naam1'><br><br>

    1 persoonskamers    <input type='radio' name='kamer' value="1" checked><br>
    2 persoonskamers    <input type='radio' name='kamer' value="2"><br><br>

    Ontbijt     <input type='checkbox' name='ontbijt' value="ontbijt">
    Lunch     <input type='checkbox' name='lunch' value="lunch">
    Diner     <input type='checkbox' name='diner' value="diner">

    <br><br>

    <input type="submit" value="submit" name="submit">

</form>

</body>


</html>


<?php

if (isset($_POST['submit'])) {
    if (!empty($_POST['naam1']) && !empty($_POST['kamer'])) {

        $naam = $_POST['naam1'];

       if (!empty($_POST['ontbijt']) || !empty($_POST['lunch']) || !empty($_POST['diner'])){

           //echo "er is een eten aangevinkt";

           $food1 = $_POST['ontbijt'];
           $food2 = $_POST['lunch'];
           $food3 = $_POST['diner'];

           $k1 = $_POST['kamer'];
           echo "bedankt voor uw reservering: ".$naam."<br>";
           echo "u heeft een ".$k1." persoons kamer geboekt"."met een: ".$food1;


       }
        else
        {
            $k1 = $_POST['kamer'];
            echo "bedankt voor uw reservering: ".$naam."<br>";
            echo "u heeft een ".$k1." persoons kamer geboekt";
        }

    }
    else
    {
        echo "vul wat in";
    }

}


?>
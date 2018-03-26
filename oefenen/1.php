<?php

if (isset($_POST['submit'])) {
    if (!empty($_POST['getal1']) && !empty($_POST['getal2'])) {

        $number1 = $_POST['getal1'];
        $number2 = $_POST['getal2'];

        if (is_numeric($number1) && (is_numeric($number2))) {

            $number3 = $number1 + $number2;

            echo "getal 1 + getal 2 = " . $number3;

        } else {
            echo "de invoerwaarden zijn geen getal";
        }


    } else {
        echo "vul wat in";
    }

}


?>


<html>
<body>
<form method="post" action="" name="form1">

    <h1> De 2 nummers worden vermenigvuldigd</h1>

    Nummer 1:<br>
    <input type='text' name='getal1'><br>

    Nummer 2:<br>
    <input type='text' name='getal2'>

    <br><br>

    <input type="submit" value="submit" name="submit">

</form>

</body>


</html>

<?php

//if(!empty($_POST['1']) && !empty($_POST['2']) ){
//    if (isset($_POST['submit'])){
//        $number1 = $_POST['1'];
//        $number2 = $_POST['2'];
//
//        $uitslag = $number1 * $number2;
//        echo "het aantal is " . $uitslag;
//    }
//}

?>

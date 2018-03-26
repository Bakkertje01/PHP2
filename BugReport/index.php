<!DOCTYPE HTML>
<html>
<title>Bug Report</title>

<head>

</head>

<?php
if (isset($_GET["bugcount"])) {
    //ToDo: Ophalen alle gegevens met Countid = bugcount
    //Invullen opgehaalde database gegevens in onderstaande formulier (values aanpassen)
    //Hidden input is aangemaakt, value aanpassen op basis van $_GET['bugcount'} (leeg of niet leeg)
    //Nieuwe query inschieten op basis van $_POST['bugcount']. Is afkomstig van hidden input in dit form.
    //
}
?>


<body>

<?php
$files = glob("./" . "*");

foreach ($files as $link) {

    $heh = explode('.', $link);


    $friendlylink = preg_replace('/[^A-Za-z0-9\-]/', '', $heh[1]);

    echo "<a href='$link'>-> $friendlylink</a><br>";
}

?>

<h2>Enter The BuGs</h2>
<form method="POST" action="bugreport.php">
    Productname <p><input type="text" name="productname"/></p>
    Version <p><input type="text" name="version"/></p>
    hardwaretype<p><input type="text" name="hardwaretype"/></p>
    Operation system<p><input type="text" name="operationsystem"/></p>
    Frequency of occurrence<p><input type="number" min="0" name="foo"/></p>
    Proposed solutions <p><input type="text" name="proposedsolutions"/></p>
    <p><input type="submit" value="Submit"/></p>
    <p><input type="submit" value="Update"/></p>
    <p><input type="hidden" name='Bugcount' value=""</p>
</form>

<p><a href="showbug.php">New bug report</a></p>


</body>


</html>
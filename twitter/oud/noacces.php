<?php
if(!isset($_SESSION['email']) || empty($_SESSION['email'])) {
	redirect_to("start.php");
}
?>


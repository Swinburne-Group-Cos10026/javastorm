<?php
	session_start();
?>
<?php
	unset($_SESSION["user"]);
	header("location: index.php");
?>

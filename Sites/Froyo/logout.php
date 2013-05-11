<?php
	session_start();
//	$_SESSION["doctor"] = "";
	unset($_SESSION["patient"]);
	unset($_SESSION["doctor"]);
//	session_destroy();
//	echo "<script>alert('Bye Bye');window.location='index.php';</script>";
	//<meta http-equiv='refresh' content='0; url=index.php'>
	header("location: {$rootpath}index.php");
?>

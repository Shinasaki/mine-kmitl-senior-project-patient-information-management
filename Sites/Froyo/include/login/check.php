<!DOCTYPE html> 
<html> 
<head> 
<title>Patient Information Management System</title> 
 <meta name="viewport" content="width=device-width, initial-scale=1"> 
 <link rel="stylesheet" href="http://code.jquery.com/mobile/1.0/jquery.mobile-1.0.min.css" />
 <script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
 <script type="text/javascript" src="js/jquery.tablesorter.min.js"></script>
<script src="http://code.jquery.com/mobile/1.0/jquery.mobile-1.0.min.js"></script>
<link href="css/jquery-mobile-fluid960.css" rel="stylesheet" type="text/css">
<link href="css/reset.css" rel="stylesheet" type="text/css">
<link href="css/main.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php

//	include("./inc/connect.php");

	$rootpath = "../../";

	session_start();
	require_once($rootpath."lib/func_date.php");
	require_once($rootpath."lib/DB.php");
	require_once($rootpath."lib/conn.inc.php");
	if (!$db->open()){
		die($db->error());
	}
	mysql_query("SET NAMES 'utf8'");

	$user  = $_POST['username'];
	$pass  = $_POST['password'];
	$pass  = sha1(md5($pass)).md5(sha1($pass));

	$sql = "
		select `username` 
		from `Mahidol_Rama_Medicine_Surg_doctor_profiles`
		where `username` ='$user' and  `password` ='$pass'";
	$query = mysql_query($sql)or die(mysql_error());
	$num   = mysql_num_rows($query);
	if($num==0)
	{
	   //exit("<script>alert('LOGIN FAIL');history.back();</script>");
	   
	   exit("<script>
	   			alert('Username or password incorrected');
	   			window.location='".$rootpath."index.php';
	   		</script>");
	   	
	  // header("location: ./index.php");
	}
	else{
		$sql = "
			SELECT `id`
			FROM `Mahidol_Rama_Medicine_Surg_doctor_profiles`
			WHERE `username` = '$user'
		";
		$result = mysql_query($sql);
		if($rs = mysql_fetch_array($result))
		{
			$doctor_id = $rs["id"];
		}
		$_SESSION['doctor'] = $doctor_id;
		exit("<script>window.location='".$rootpath."index.php';</script>");
	}

 ?>

<?php
	include("./include/user_bottom.php");
?>

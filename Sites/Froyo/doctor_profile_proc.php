<?php
session_start();

require_once($rootpath."lib/func_date.php");
require_once($rootpath."lib/DB.php");
require_once($rootpath."lib/conn.inc.php");
if (!$db->open()){
	die($db->error());
}
mysql_query("SET NAMES 'utf8'");

$title_name = "Search Result";
include("./include/user_head.php");

if($_SESSION['doctor'] == ""){
	include("./include/login/login.php");
}
elseif($_SESSION['doctor'] != ""){

	$fn = $_POST["fn"];
	$doctorID = $_POST["doctorID"];

	$data = $_POST[$fn];
	
	if($fn == "password")
	{
		$oldPass  = sha1(md5($data)).md5(sha1($data));
		$sql = "
			SELECT `password`
			FROM `Mahidol_Rama_Medicine_Surg_doctor_profiles`
			WHERE `id` = '$doctorID' 
			AND `password` = '$oldPass'
		;";
		$result = mysql_query($sql);
		if($rs = mysql_fetch_array($result))
		{
			$pass1 = $_POST["newPass1"];
			$pass2 = $_POST["newPass2"];
			if($pass1 == $pass2)
			{
				$pass1 = sha1(md5($pass1)).md5(sha1($pass1));
				$pass2 = sha1(md5($pass2)).md5(sha1($pass2));
				
				$sql = "
				UPDATE  `Mahidol_Rama_Medicine_Surg_doctor_profiles`
				SET  `$fn` =  '$pass1' 
				WHERE  `id` = '".$_SESSION['doctor']."' ;
				";

				$result=mysql_query($sql);
				if(!$result)die(mysql_error());
				
				header ("location: ./doctor_profile.php?did=".$doctorID."&check=opc");
				
			}
			else{
				echo "&error=op";
				header ("location: ./doctor_profile.php?did=".$doctorID."&check=npw");
			}
		}
		else{
			echo "&error=op";
			header ("location: ./doctor_profile.php?did=".$doctorID."&check=opw");
		}
	}
	else{

		$sql = "
		UPDATE  `Mahidol_Rama_Medicine_Surg_doctor_profiles`
		SET  `$fn` =  '$data'
		WHERE  `id` = '".$_SESSION['doctor']."' ;
		";

		$result=mysql_query($sql);
		if(!$result)die(mysql_error());
		
		$fn2 = md5($fn);
		
		header ("location: ./doctor_profile.php?did=".$doctorID."&check=".$fn2);
	}
?>

<?php
//	include("./include/user_bottom.php");
	} //end ( $_SESSION["doctor"] != "" );
?>       

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
	$patientID = $_POST["patientID"];

	if($fn == "patient_id"){
		$data = $_POST["patient_id"];
	}
	elseif($fn == "firstName"){
		$data = $_POST["firstName"];
	}
	elseif($fn == "lastName"){
		$data = $_POST["lastName"];
	}
	elseif($fn == "address"){
		$data = $_POST["address"];
	}
	elseif($fn == "tel"){
		$data = $_POST["tel"];
	}

	$sql = "
	UPDATE  `Mahidol_Rama_Medicine_Surg_s_patient_profiles` 
	SET  `$fn` =  '$data' 
	WHERE  `Patient_id` = '".$_SESSION['patient']."' ;
	";
	$result=mysql_query($sql);
	if(!$result)die(mysql_error());

	header ("location: ./result-found.php?pid=".$patientID);
?>

<?php
//	include("./include/user_bottom.php");
	} //end ( $_SESSION["doctor"] != "" );
?>       

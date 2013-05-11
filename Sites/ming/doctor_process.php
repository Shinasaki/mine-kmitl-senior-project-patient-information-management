<?php
session_start();
require_once($rootpath."lib/func_date.php");
require_once($rootpath."lib/DB.php");
require_once($rootpath."lib/conn.inc.php");
if (!$db->open()){
	die($db->error());
}
mysql_query("SET NAMES 'utf8'");


	$patient = $_POST["patient"];
	$doctor = $_SESSION['doctor'];
	$fn = $_POST["fn"];

	$patient = $_SESSION["patient"];

	$s_latest_reports_id = $_SESSION["s_latest_reports_id"];

	$time = date('Y-m-d H:i:s', (strtotime($_SESSION["date3"])));

//	query doctor_name to doctor_id
	$sql = "
		SELECT `id`
		FROM  `Mahidol_Rama_Medicine_Surg_doctor_profiles` 
	";
//	end query doctor_name to doctor_id

	if($fn == "addNewDoctor"){
		$username = $_POST["username"];
		$password1 = $_POST["password1"];
		$password2 = $_POST["password2"];
		$firstName = $_POST["firstName"];
		$lastName = $_POST["lastName"];
		$gender = $_POST["gender"];//-
		$birthday = $_POST["date1"];//-
		$address = $_POST["address"];
		$tel = $_POST["telNo"];
		$email = $_POST["email"];

		if($password1 != $password2)
		{
			exit("<script> alert('password are not matches.'); history.back();</script>");
		}
		else{

			$birthday = date("Y-m-d", strtotime($birthday));	//change date format
			$password1 = sha1(md5($password1)).md5(sha1($password1));

			$sql="
				INSERT INTO  `Mahidol_Rama_Medicine_Surg_doctor_profiles` (
				`id` ,			
				`name` ,
				`lastname` , `gender`, `birthday`, 
				`address` ,
				`tel`
				)
				VALUES (
				'', '$firstName',  '$lastName',  '$gender', '$birthday', '$address', '$tel'
				);
			";

			$sql="
				INSERT INTO `project_hospital`.`Mahidol_Rama_Medicine_Surg_doctor_profiles` 
				(`username`, `password`, `name`, `surname`, `gender`, `birthday`, `address`, `tel`, `email`, `admin`)
				VALUES
				('$username', '$password1', '$firstName', '$lastName', '$gender', '$birthday', '$address', '$tel', '$email', '0');
			";
			
			$result=mysql_query($sql);
			if(!$result)die(mysql_error());

			$sql="
				SELECT `Patient_id`
				FROM `Mahidol_Rama_Medicine_Surg_s_patient_profiles`
				WHERE `firstname` = '$firstname' 
				AND `lastname` = '$lastName'
				AND `gender` = '$gender'
				AND `birthday` = '$birthday'
				AND `address` = '$address'
				AND `tel` = '$tel'
			";
			$result=mysql_query($sql);
			if($rs = mysql_fetch_array($result)){
				$_SESSION["patient"] = $rs["Patient_id"];
			}
			header ("location: ./index.php");
			
		}//end check
	}
/*
	elseif()
	{
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

		header ("location: ./doctor_profile.php?pid=".$patientID);
	}
*/


	//clear memory

mysql_close();
?>


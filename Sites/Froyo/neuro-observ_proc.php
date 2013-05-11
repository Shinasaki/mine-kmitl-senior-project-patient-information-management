<?php
session_start();
require_once($rootpath."lib/func_date.php");
require_once($rootpath."lib/DB.php");
require_once($rootpath."lib/conn.inc.php");
if (!$db->open()){
	die($db->error());
}
mysql_query("SET NAMES 'utf8'");

	$fn = $_POST["fn"];

	$patient = $_SESSION["patient"];
	$yp_id = $_SESSION["yp_id"];

	$time = $_POST["time"];
		if($fn == "comaScale_addNew"){

			$location = $_POST["location"];

			$c_value = $_POST["c_value"];
			$t_value = $_POST["t_value"];
			$mm_value = $_POST["mm_value"];

			$total_score = $c_value + $t_value + $mm_value;

			$sql="
				INSERT INTO  `Mahidol_Rama_Medicine_Surg_yp_coma_scale` (
				`Patient_id`, `order_id`, `c_value` , `t_value` , `mm_value`, `total_score`
				)
				VALUES (
					'$patient', '$yp_id', '$c_value', '$t_value', '$mm_value', '$total_score'
				);
			";

			$result=mysql_query($sql);
			if(!$result)die(mysql_error());
			$yp_type = "comaScale";

		}
		elseif($fn == "comaScale_edit"){

			$location = $_POST["location"];

			$c_value = $_POST["c_value"];
			$t_value = $_POST["t_value"];
			$mm_value = $_POST["mm_value"];

			$total_score = $c_value + $t_value + $mm_value;

			$sql="
				UPDATE `Mahidol_Rama_Medicine_Surg_yp_coma_scale`
				SET 
					`c_value` =  '$c_value',
					`t_value` = '$t_value',
					`mm_value` = '$mm_value',
					`total_score` = '$total_score'
				
				WHERE `Patient_id` = '$patient' 
				AND `order_id` = '$yp_id'
			";
			$result=mysql_query($sql);
			if(!$result)die(mysql_error());

			$yp_type = "comaScale";

		}
		elseif($fn == "vitalSigns_addNew"){
			$location = $_POST["location"];

			$R_size = $_POST["R_size"];
			$L_size = $_POST["L_size"];
			$R_response = $_POST["R_response"];
			$L_response = $_POST["L_response"];
			$tempreture = $_POST["tempreture"];
			$p_bp = $_POST["p_bp"];
			$r = $_POST["r"];

			$sql="
				INSERT INTO  `Mahidol_Rama_Medicine_Surg_yp_vital_signs` (
				`Patient_id`, `order_id`, `R_size`, `L_size`, `R_response`, `L_response`, `tempreture`, `p_bp`, `r`
				)
				VALUES (
					'$patient', '$yp_id', '$R_size', '$L_size', '$R_response', '$L_response', '$tempreture', '$p_bp', '$r'
				);
			";
			$result=mysql_query($sql);
			if(!$result)die(mysql_error());

			$yp_type = "vitalSigns";
		}
		elseif($fn == "vitalSigns_edit"){
			$location = $_POST["location"];

			$R_size = $_POST["R_size"];
			$L_size = $_POST["L_size"];
			$R_response = $_POST["R_response"];
			$L_response = $_POST["L_response"];
			$tempreture = $_POST["tempreture"];
			$p_bp = $_POST["p_bp"];
			$r = $_POST["r"];

			$sql = "
				UPDATE `Mahidol_Rama_Medicine_Surg_yp_vital_signs` 
				SET 
					`Patient_id` =  '$patient', 
					`R_size` = '$R_size',
					`L_size` = '$L_size',
					`R_response` = '$R_response',
					`L_response` = '$L_response',
					`tempreture` = '$tempreture',
					`p_bp` = '$p_bp',
					`r` = '$r'
				WHERE `patient_id` = '$patient'
				AND `order_id` = '$yp_id' 
			";
			$result=mysql_query($sql);
			if(!$result)die(mysql_error());

			$yp_type = "vitalSigns";
		}
		elseif($fn == "motorPower_addNew"){
			$location = $_POST["location"];

			$arm_fracture = $_POST["arm_fracture"];
			$leg_fracture = $_POST["leg_fracture"];

			$sql="
				INSERT INTO  `Mahidol_Rama_Medicine_Surg_yp_motor_power` (
				`Patient_id`, `order_id`, `arm_fracture`, `leg_fracture`
				)
				VALUES (
					'$patient', '$yp_id', '$arm_fracture', '$leg_fracture'
				);
			";
			$result=mysql_query($sql);
			if(!$result)die(mysql_error());

			$yp_type = "motorPower";
		}
		elseif($fn == "motorPower_edit"){
			$location = $_POST["location"];

			$arm_fracture = $_POST["arm_fracture"];
			$leg_fracture = $_POST["leg_fracture"];

			$sql = "
				UPDATE `Mahidol_Rama_Medicine_Surg_yp_motor_power` 
				SET 
					`Patient_id` =  '$patient', 
					`arm_fracture` = '$arm_fracture',
					`leg_fracture` = '$leg_fracture'
				WHERE `patient_id` = '$patient' 
				AND `order_id` = '$yp_id'
			";
			$result=mysql_query($sql);
			if(!$result)die(mysql_error());

			$yp_type = "motorPower";
		}

		if(strstr($fn, "_") == "_addNew"){
			$sql = "
				INSERT INTO `Mahidol_Rama_Medicine_Surg_patient_YP` (
				`Patient_id`, `order_id`)
				VALUES ('$patient', '".$_SESSION["yp_id"]."');
			";

			$result = mysql_query($sql);
			if(!$result)die(mysql_error());
		}


		header ("location: ./".$location);
/*
		if(strstr($fn, "_") == "_addNew"){

			$sql = "
				INSERT INTO  `Mahidol_Rama_Medicine_Surg_yp_lastest_reports` (
				`order_id`, `time`
				)
				VALUES (
				'$yp_id', '$time'
				);
			";

			$result=mysql_query($sql);
			if(!$result)die(mysql_error());
			header ("location: ./".$location);

		}
		elseif(strstr($fn, "_") == "_edit"){

			$sql = "
				UPDATE `Mahidol_Rama_Medicine_Surg_yp_lastest_reports` 
				SET
				`order_id` = '$yp_id' , `time` = '$time'
				WHERE `order_id` = '$yp_id'
				;
			";
			$result=mysql_query($sql);
			if(!$result)die(mysql_error());
			header ("location: ./".$location);
		}
*/
?>

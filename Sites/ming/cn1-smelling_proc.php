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
/*
	if(strstr($fn, "_") == "_addNew")
	{
		//######## last reports ##########
		$sql_last="
		INSERT INTO `Mahidol_Rama_Medicine_Surg_s_latest_reports` (
		`s_latest_reports_id`, `time`)
		VALUES ('$s_latest_reports_id', '$time');
		";
			$result_last = mysql_query($sql_last);
		if(!$result_last)die(mysql_error());
		//################################
	}
	elseif(strstr($fn, "_") == "_edit")
	{
		//######## last reports ##########
		$sql_last="
		UPDATE `Mahidol_Rama_Medicine_Surg_s_latest_reports`
		SET
			`s_latest_reports_id` = '$s_latest_reports_id', `Patient_id` = '$patient', 
			`CN_id` = '$CN_id' , `CN_type` = '' , `time` = '$time'
		WHERE `patient_id` = '$patient' 
			AND `s_latest_reports_id` = '$s_latest_reports_id'
		";
		$result_last = mysql_query($sql_last);
		if(!$result_last)die(mysql_error());
		//################################

	}
*/

//	query doctor_name to doctor_id

	$sql = "
		SELECT `id`
		FROM  `Mahidol_Rama_Medicine_Surg_doctor_profile` 
	";
	

//	end query doctor_name to doctor_id

	if(strstr($fn, "_") == "_addNew"){
		$sql_last="
		INSERT INTO `Mahidol_Rama_Medicine_Surg_patient_CN` (
		`Patient_id`, `order_id`)
		VALUES ('$patient', '".$_SESSION["s_latest_reports_id"]."');
		";
			$result_last = mysql_query($sql_last);
		if(!$result_last)die(mysql_error());
	}

	if($fn == "addNewPatient"){
//		$patientID = $_POST["patientID"];
		$firstName = $_POST["firstName"];
		$lastName = $_POST["lastName"];
		$gender = $_POST["gender"];//-
		$birthday = $_POST["date1"];//-
		$address = $_POST["address"];
		$tel = $_POST["telNo"];

		$birthday = date("Y-m-d", strtotime($birthday));	//change date format

		$sql="
			INSERT INTO  `Mahidol_Rama_Medicine_Surg_s_patient_profiles` (
			`doctor_id` ,			
			`firstname` ,
			`lastname` , `gender`, `birthday`, 
			`address` ,
			`tel`
			)
			VALUES (
			'', '$firstName',  '$lastName',  '$gender', '$birthday', '$address', '$tel'
			);
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

	}

	elseif($fn == "CN1_addNew")
	{
		$smelling_right = $_POST["smellingRight"];
		$smelling_left = $_POST["smellingLeft"];
		if($smelling_right == "choice-1"){
			$smelling_right = "Good";
		}
		elseif($smelling_right == "choice-2"){
			$smelling_right = "Anosmia";
		}
		$smelling_left = $_POST["smellingLeft"];
		if($smelling_left == "choice-1"){
			$smelling_left = "Good";
		}
		elseif($smelling_left == "choice-2"){
			$smelling_left = "Anosmia";
		}
	
		$sql="
		INSERT INTO  `Mahidol_Rama_Medicine_Surg_cn_1` (`Patient_id`, `s_latest_reports_id`, `R_smelling`, `L_smelling`)
		VALUES ('$patient', '$s_latest_reports_id', '$smelling_right',  '$smelling_left');
		";
		$result=mysql_query($sql);
		if(!$result)die(mysql_error());

		header ("location: ./main-cranialNerve.php");
	}
	elseif($fn=="CN1_edit_R")
	{
		$smelling_right = $_POST["smellingRight"];
		if($smelling_right == "choice-1"){
			$smelling_right = "Good";
		}
		elseif($smelling_right == "choice-2"){
			$smelling_right = "Anosmia";
		}

		$sql="
		UPDATE `Mahidol_Rama_Medicine_Surg_cn_1` 
		SET `R_smelling` =  '$smelling_right' 
		WHERE `patient_id` = '$patient' 
			AND `s_latest_reports_id` = '$s_latest_reports_id'
		";
		$result=mysql_query($sql);
		if(!$result)die(mysql_error());

		header ("location: ./main-cranialNerve.php");
	}
	elseif($fn=="CN1_edit_L")
	{
		$smelling_left = $_POST["smellingLeft"];
		if($smelling_left == "choice-1"){
			$smelling_left = "Good";
		}
		elseif($smelling_left == "choice-2"){
			$smelling_left = "Anosmia";
		}

		$sql="
		UPDATE `Mahidol_Rama_Medicine_Surg_cn_1` 
		SET `L_smelling` =  '$smelling_left' 
		WHERE `patient_id` = '$patient' 
			AND `s_latest_reports_id` = '$s_latest_reports_id'
		";
		$result=mysql_query($sql);
		if(!$result)die(mysql_error());

		header ("location: ./main-cranialNerve.php");
	}
	elseif($fn == "CN2_addNew"){

		for($count = 1; $count <= 4; $count++){
			$valueR[$count] = $_POST[("valueR".$count)];
			$valueL[$count] = $_POST[("valueL".$count)];
		}

		$R_visualAcuity_up = $_POST["R_visualAcuity_up"];
		$R_visualAcuity_down = $_POST["R_visualAcuity_down"];
		$L_visualAcuity_up = $_POST["L_visualAcuity_up"];
		$L_visualAcuity_down = $_POST["L_visualAcuity_down"];

		$location = $_POST["location"]; //next page is back or home ?

		$sql = "
		INSERT INTO  `Mahidol_Rama_Medicine_Surg_cn_2` (
			`Patient_id` , `s_latest_reports_id` ,
			`R_visualAcuity_up`, `R_visualAcuity_down`, `L_visualAcuity_up`, `L_visualAcuity_down`,
			`R_visualField_1`, `R_visualField_2`, `R_visualField_3`, `R_visualField_4`,
			`L_visualField_1`, `L_visualField_2`, `L_visualField_3`, `L_visualField_4`
		)
		VALUES (
			'$patient', '$s_latest_reports_id', 
			'$R_visualAcuity_up',  '$R_visualAcuity_down',  '$L_visualAcuity_up',  '$L_visualAcuity_down',  
		";

		for($count = 1; $count <=4; $count++){
			$sql .= "'$valueR[$count]',";
		}
		for($count = 1; $count <=4; $count++){
			if($count <= 3){
				$sql .= "'$valueL[$count]',";
			}
			elseif($count == 4){
				$sql .= "'$valueL[$count]'";
			}
		}
		$sql .= ")";

		$result=mysql_query($sql);
		if(!$result)die(mysql_error());

		header ("location: ".$location);

	}
	elseif($fn == "CN2_edit"){
		for($count = 1; $count <= 4; $count++){
			$valueR[$count] = $_POST["valueR".$count];
			$valueL[$count] = $_POST["valueL".$count];
		}
		$R_visualAcuity_up = $_POST["R_visualAcuity_up"];
		$R_visualAcuity_down = $_POST["R_visualAcuity_down"];
		$L_visualAcuity_up = $_POST["L_visualAcuity_up"];
		$L_visualAcuity_down = $_POST["L_visualAcuity_down"];

		$location = $_POST["location"]; //next page is back or home ?

		$sql="
		UPDATE `Mahidol_Rama_Medicine_Surg_cn_2` 
		SET
		`R_visualAcuity_up` =  '$R_visualAcuity_up',
		`R_visualAcuity_down` =  '$R_visualAcuity_down',
		`L_visualAcuity_up` =  '$L_visualAcuity_up',
		`L_visualAcuity_down` =  '$L_visualAcuity_down',
		";
		for($count = 1; $count <=4; $count++){
			if($count <= 3){
				$sql .= "
					`R_visualField_".$count."` = '$valueR[$count]', 
					`L_visualField_".$count."` = '$valueL[$count]',
				";
			}
			elseif($count == 4){
				$sql .= "
					`R_visualField_".$count."` = '$valueR[$count]', 
					`L_visualField_".$count."` = '$valueL[$count]'
				";
			}
		}
		$sql .= "
		WHERE `patient_id` = '$patient' 
			AND `s_latest_reports_id` = '$s_latest_reports_id'
		";

		$result=mysql_query($sql);
		if(!$result)die(mysql_error());
//		header ("location: ".$location);
		?>
		<script type="text/javascript">
		<!--
		window.location = "<?=$location?>"
		//-->
		</script>
		<?php
	}
	
	elseif($fn == "CN3_addNew_RHS"){
		$location = $_POST["location"]; //next page is back or home ?
		$R_oem = $_POST["R_oem"];
		$L_oem = $_POST["L_oem"];
		$sql="
		INSERT INTO  `Mahidol_Rama_Medicine_Surg_cn_3_4_6` 
			(`Patient_id`, `s_latest_reports_id`, `R_eom`, `L_eom`)
		VALUES
			('$patient', '$s_latest_reports_id', '$R_oem',  '$L_oem');
		";
		
		$result=mysql_query($sql);
		if(!$result)die(mysql_error());
		header ("location: ./".$location);
		
	}
	elseif($fn == "CN3_edit_RHS"){
		$location = $_POST["location"]; //next page is back or home ?
		$R_oem = $_POST["R_oem"];
		$L_oem = $_POST["L_oem"];
		
		$sql="
		UPDATE `Mahidol_Rama_Medicine_Surg_cn_3_4_6`
		SET 
			`R_eom` = '$R_oem', `L_eom` = '$L_oem'
		WHERE `patient_id` = '$patient' 
			AND `s_latest_reports_id` = '$s_latest_reports_id'
		";
		
		$result=mysql_query($sql);
		if(!$result)die(mysql_error());
		header ("location: ./".$location);
		
	}
	elseif($fn == "CN3_addNew_LHS"){
		$location = $_POST["location"]; //next page is back or home ?
		$R_oem_LHS = $_POST["R_oem_LHS"];
		$L_oem_LHS = $_POST["L_oem_LHS"];
		$sql="
		INSERT INTO  `Mahidol_Rama_Medicine_Surg_cn_3_4_6` 
			(`Patient_id`, `s_latest_reports_id`, `R_eom_LHS`, `L_eom_LHS`)
		VALUES
			('$patient', '$s_latest_reports_id', '$R_oem_LHS',  '$L_oem_LHS');
		";
		
		$result=mysql_query($sql);
		if(!$result)die(mysql_error());
		header ("location: ./".$location);
		
	}
	elseif($fn == "CN3_edit_LHS"){
		$location = $_POST["location"]; //next page is back or home ?
		$R_oem_LHS = $_POST["R_oem_LHS"];
		$L_oem_LHS = $_POST["L_oem_LHS"];
		
		$sql="
		UPDATE `Mahidol_Rama_Medicine_Surg_cn_3_4_6`
		SET 
			`R_eom_LHS` = '$R_oem_LHS', `L_eom_LHS` = '$L_oem_LHS'
		WHERE `patient_id` = '$patient' 
			AND `s_latest_reports_id` = '$s_latest_reports_id'
		";
		
		$result=mysql_query($sql);
		if(!$result)die(mysql_error());
		header ("location: ./".$location);
		
	}
	
	elseif($fn == "CN5_addNew"){
		$sliderR = $_POST["sliderR"];
		$sliderL = $_POST["sliderL"];
		for($i = 1; $i <= 3; $i++)
		{
			$sensoryR[$i] = $_POST["CN5_sensoryR".$i];
			$sensoryL[$i] = $_POST["CN5_sensoryL".$i];
		}
		$location = $_POST["location"];

		$sql = "
			INSERT INTO  `Mahidol_Rama_Medicine_Surg_cn_5` (`Patient_id`, `s_latest_reports_id`, `R_motor`, `L_motor`, 
		";
		for($i=1; $i<=3; $i++){
			$sql .= "`sensory_".$i."R` , `sensory_".$i."L` ";
			if($i != 3)
				$sql .= ", ";
		}
		$sql .= "
			) VALUES ('$patient', '$s_latest_reports_id', '$sliderR',  '$sliderL', 
		";
		for($i=1; $i<=3; $i++){
			$sql .= "'$sensoryR[$i]' , '$sensoryL[$i]' ";
			if($i != 3)
				$sql .= ", ";
		}
		$sql .= ");
		";
//		echo $sql;

		$result=mysql_query($sql);
		if(!$result)die(mysql_error());

		header ("location: ".$location);

	}
	elseif($fn == "CN5_edit"){
		$sliderR = $_POST["sliderR"];
		$sliderL = $_POST["sliderL"];
		for($i = 1; $i <= 3; $i++)
		{
			$sensoryR[$i] = $_POST["CN5_sensoryR".$i];
			$sensoryL[$i] = $_POST["CN5_sensoryL".$i];
		}
		$location = $_POST["location"];
	
		$sql = "
		UPDATE `Mahidol_Rama_Medicine_Surg_cn_5` 
		SET `R_motor` =  '$sliderR' , `L_motor` =  '$sliderL' , 
		";
		for($i=1; $i<=3; $i++){
			$sql .= "`sensory_".$i."R` = '$sensoryR[$i]' , ";
			$sql .= "`sensory_".$i."L` = '$sensoryL[$i]'";
			if($i != 3)
				$sql .= ", ";
		}
		$sql .= "
		WHERE `patient_id` = '$patient' 
			AND `s_latest_reports_id` = '$s_latest_reports_id'
		";
//		echo $sql."<br /><br />";

		$result=mysql_query($sql);
		if(!$result)die(mysql_error());

		header ("location: ".$location);

	}
	elseif($fn == "CN7_addNew"){
		$choiceR = $_POST["choiceR"];
		$choiceL = $_POST["choiceL"];
		$location = $_POST["location"];

		$sql="
		INSERT INTO  `Mahidol_Rama_Medicine_Surg_cn_7` (`Patient_id`, `s_latest_reports_id`, `R_HB`, `L_HB`)
		VALUES ('$patient', '$s_latest_reports_id',  '$choiceR', '$choiceL');
		";

		$result=mysql_query($sql);
		if(!$result)die(mysql_error());
		header ("location: ".$location);

	}
	elseif($fn == "CN7_edit"){
		$choiceR = $_POST["choiceR"];
		$choiceL = $_POST["choiceL"];
		$location = $_POST["location"];

		$sql="
		UPDATE `Mahidol_Rama_Medicine_Surg_cn_7` 
		SET
			`R_HB` =  '$choiceR',
			`L_HB` =  '$choiceL'
		WHERE `patient_id` = '$patient' AND `s_latest_reports_id` = '$s_latest_reports_id'
		";
		$result=mysql_query($sql);
		if(!$result)die(mysql_error());

		header ("location: ".$location);
	}
	elseif($fn == "CN8_addNew"){
		$choiceR = $_POST["radio-choice-R"];
		$choiceL = $_POST["radio-choice-L"];

		$sql="
		INSERT INTO  `Mahidol_Rama_Medicine_Surg_cn_8` (`Patient_id`, `s_latest_reports_id`, `R_hearing`, `L_hearing`)
		VALUES ('$patient', '$s_latest_reports_id',  '$choiceR', '$choiceL');
		";
		$result=mysql_query($sql);
		if(!$result)die(mysql_error());

//echo		$_SESSION["s_latest_reports_id"] = $s_latest_reports_id;
			$sql="
			SELECT `time`
			FROM `Mahidol_Rama_Medicine_Surg_s_latest_reports`
			WHERE `s_latest_reports_id` = '".$_SESSION["s_latest_reports_id"]."'
			";
			$result = mysql_query($sql);
			$num=mysql_num_rows($result);
/*			if($rs = mysql_fetch_array($result)){
				$_SESSION["date3"] = $rs["time"];
			}
*/

		header ("location: ./cn8-hearing.php");
	}
	elseif($fn == "CN8_edit"){
		$choiceR = $_POST["radio-choice-R"];
		$choiceL = $_POST["radio-choice-L"];
	
		$sql="
		UPDATE `Mahidol_Rama_Medicine_Surg_cn_8` 
		SET
			`R_hearing` =  '$choiceR',
			`L_hearing` =  '$choiceL'
		WHERE `patient_id` = '$patient' AND `s_latest_reports_id` = '$s_latest_reports_id'
		";
		$result=mysql_query($sql);
		if(!$result)die(mysql_error());

//echo		$_SESSION["s_latest_reports_id"] = $s_latest_reports_id;
			$sql="
			SELECT `time`
			FROM `Mahidol_Rama_Medicine_Surg_s_latest_reports`
			WHERE `s_latest_reports_id` = '".$_SESSION["s_latest_reports_id"]."'
			";
			$result = mysql_query($sql);
			$num=mysql_num_rows($result);
//echo $_SESSION["date3"];

/*			if($rs = mysql_fetch_array($result)){
				$_SESSION["date3"] = $rs["time"];
			}
*/

		header ("location: ./cn8-hearing.php");
	}
	elseif($fn == "CN9_addNew"){
		$choice1 = $_POST["radio-choice-1"];
		$choice2 = $_POST["radio-choice-2"];
		$choice3 = $_POST["radio-choice-3"];
		$choice4 = $_POST["radio-choice-4"];
		$location = $_POST["location"];

		$sql="
		INSERT INTO  `Mahidol_Rama_Medicine_Surg_cn_9_10` (`Patient_id`, `s_latest_reports_id`, `GagReflex`, `hoarseness_of_voice`, `dysphagia`, `dysarthria`)
		VALUES ('$patient', '$s_latest_reports_id',  '$choice1', '$choice2', '$choice3', '$choice4');
		";
		$result=mysql_query($sql);
		if(!$result)die(mysql_error());

		header ("location: ".$location);
	}
	elseif($fn == "CN9_edit"){
		$choice1 = $_POST["radio-choice-1"];
		$choice2 = $_POST["radio-choice-2"];
		$choice3 = $_POST["radio-choice-3"];
		$choice4 = $_POST["radio-choice-4"];
		$location = $_POST["location"];

		$sql="
		UPDATE `Mahidol_Rama_Medicine_Surg_cn_9_10` 
		SET
			`GagReflex` =  '$choice1',
			`hoarseness_of_voice` =  '$choice2',
			`dysphagia` = '$choice3',
			`dysarthria` = '$choice4'
		WHERE `patient_id` = '$patient' AND `s_latest_reports_id` = '$s_latest_reports_id'
		";
		$result=mysql_query($sql);
		if(!$result)die(mysql_error());

		header ("location: ".$location);
	}
	elseif($fn == "CN11_addNew"){
		$location = $_POST["location"];
		$choice = $_POST["radio-choice"];

		$sql="
		INSERT INTO  `Mahidol_Rama_Medicine_Surg_cn_11` (`Patient_id`, `s_latest_reports_id`, `sternocleidomastoid`)
		VALUES ('$patient', '$s_latest_reports_id',  '$choice');
		";
		$result=mysql_query($sql);
		if(!$result)die(mysql_error());

		header ("location: ./".$location);

	}
	elseif($fn == "CN11_edit"){
		$location = $_POST["location"];
		$choice = $_POST["radio-choice"];
	
		$sql="
		UPDATE `Mahidol_Rama_Medicine_Surg_cn_11` 
		SET `sternocleidomastoid` =  '$choice'
		WHERE `patient_id` = '$patient' 
			AND `s_latest_reports_id` = '$s_latest_reports_id'
		";
		$result=mysql_query($sql);
		if(!$result)die(mysql_error());

		header ("location: ./".$location);
	}
	elseif($fn == "CN12_addNew"){
		$sliderR = $_POST["sliderR"];
		$sliderL = $_POST["sliderL"];
		$location = $_POST["location"];
		if($location == "home"){
			$location = "index.php";
		}
		elseif($location == "back"){
			$location = "main-cranialNerve.php";
		}
		$sql="
		INSERT INTO  `Mahidol_Rama_Medicine_Surg_cn_12` (`Patient_id`, `s_latest_reports_id`, `R_tongue`, `L_tongue`)
		VALUES ('$patient', '$s_latest_reports_id', '$sliderR',  '$sliderL');
		";
		$result=mysql_query($sql);
		if(!$result)die(mysql_error());

		header ("location: ./{$location}");
	}
	elseif($fn == "CN12_edit"){
		$sliderR = $_POST["sliderR"];
		$sliderL = $_POST["sliderL"];
		$location = $_POST["location"];
		if($location == "home"){
			$location = "index.php";
		}
		elseif($location == "back"){
			$location = "main-cranialNerve.php";
		}
		$sql="
		UPDATE `Mahidol_Rama_Medicine_Surg_cn_12` 
		SET `R_tongue` =  '$sliderR' , `L_tongue` =  '$sliderL' 
		WHERE `patient_id` = '$patient' 
			AND `s_latest_reports_id` = '$s_latest_reports_id'
		";
		$result=mysql_query($sql);
		if(!$result)die(mysql_error());

		header ("location: ./{$location}");
	}

	//clear memory

mysql_close();
?>

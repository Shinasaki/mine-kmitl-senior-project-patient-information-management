<?php
	$title_name = "CN2: Visual";
	include("./include/user_head.php");

	if($_SESSION['doctor'] == ""){
		include("./include/login/login.php");
	}
	elseif($_SESSION['doctor'] != ""){
		$patient = $_SESSION["patient"];
		if($patient == ""){
			header("location: ./search-main.php");
		}
		else{
			include("./include/user_CNsetTime.php");
			$s_latest_reports_id = $_SESSION["s_latest_reports_id"];
?>

<?php
/*
<script src="include/js/canvas/canvas2image2.js" ></script>
<script src="include/js/canvas/base642.js" ></script>
<script src="include/js/canvas/CN2_R.js" ></script>
<script src="include/js/canvas/CN2_L.js" ></script>
*/
?>

<?php

	$patient = $_POST["patient"];
	$doctor = $_SESSION['doctor'];
	$fn = $_POST["fn"];
	$patient = $_SESSION["patient"];

	$s_latest_reports_id = $_SESSION["s_latest_reports_id"];

	$time = date('Y-m-d H:i:s', (strtotime($_SESSION["date3"])));


	$imageR = $_POST["imageR"];
	$imageL = $_POST["imageL"];
	$imageR =  substr($imageR,strpos($imageR,",")+1);
	$imageL =  substr($imageL,strpos($imageL,",")+1);
	$imageR2 = base64_decode($imageR);
	$imageL2 = base64_decode($imageL);
	$filenameR = "CN2_{$_SESSION["doctor"]}_{$_SESSION["patient"]}_".strtotime($_SESSION["date3"])."_R";
	$filenameL = "CN2_{$_SESSION["doctor"]}_{$_SESSION["patient"]}_".strtotime($_SESSION["date3"])."_L";
	$localFileR = "./{$rootpath}images/CN2/{$filenameR}.png";
	$localFileL = "./{$rootpath}images/CN2/{$filenameL}.png";

	if($fn == "CN2_VF_addNew"){		//insert
		$sql_last="
			INSERT INTO `Mahidol_Rama_Medicine_Surg_patient_CN` (
			`Patient_id`, `order_id`)
			VALUES ('$patient', '".$_SESSION["s_latest_reports_id"]."');
		";
			$result_last = mysql_query($sql_last);
		if(!$result_last)die(mysql_error());
		
		
		$sql = "
			INSERT INTO `Mahidol_Rama_Medicine_Surg_cn_2_VF`
			(`Patient_id`, `s_latest_reports_id`, `VF_imagePath_R`, `VF_imagePath_L`)
			VALUES 
			('$patient', '$s_latest_reports_id', '$filenameR', '$filenameL')
		;";

		
		$fhR = @fopen($localFileR, "w");
		if($fhR){
			fwrite($fhR, $imageR2);
			fclose($fhR);
		}
		$fhL = @fopen($localFileL, "w");
		if($fhL){
			fwrite($fhL, $imageL2);
			fclose($fhL);
		}
		
		$result = mysql_query($sql);
		
		
		/*
		if(!(file_put_contents($localFileR, $imageR2, FILE_USE_INCLUDE_PATH) && file_put_contents($localFileL, $imageL2, FILE_USE_INCLUDE_PATH) && $result = mysql_query($sql)))	//FILE_USE_INCLUDE_PATH
		{
			die(mysql_error());
		//	echo "asdf";
		}
		*/
		

	}
	else{	//Update
		
		
		$sql = "
			UPDATE `Mahidol_Rama_Medicine_Surg_cn_2_VF` 
			SET 
				`Patient_id` = '$patient',
				`s_latest_reports_id` = '$s_latest_reports_id',
				`VF_imagePath_R` = '$filenameR',
				`VF_imagePath_L`= '$filenameL'
			WHERE
				`Patient_id` = '$patient' 
				AND
				`s_latest_reports_id` = '{$_SESSION["s_latest_reports_id"]}'
		;";
		
		$fhR = @fopen($localFileR, "w");
		if($fhR){
			fwrite($fhR, $imageR2);
			fclose($fhR);
			echo "R ";
		}
		$fhL = @fopen($localFileL, "w");
		if($fhL){
			fwrite($fhL, $imageL2);
			fclose($fhL);
			echo "L ";
		}
		
		$result = mysql_query($sql);
		
		
		/*
		if(!(file_put_contents($localFileR, $imageR2, FILE_USE_INCLUDE_PATH) && file_put_contents($localFileL, $imageL2, FILE_USE_INCLUDE_PATH) && $result = mysql_query($sql)))
		{
			die(mysql_error());
		}
		*/
	}
	header("location: ./{$rootpath}cn2-visual-pad.php");
	
?>

<?php
			include("./include/user_bottom.php");
		} //end ( $_SESSION['patient'] != "" );
	} //end ( $_SESSION["doctor"] != "" );
?>

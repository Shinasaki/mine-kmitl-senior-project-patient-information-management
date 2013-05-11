<?php
	//query id_time & keep to DB
	if($_POST["date3"] != ""){
		$_SESSION["date3"] = $_POST["date3"];
	}
	$temp = $_SESSION["date3"];
	$time = date('Y-m-d H:i:s', (strtotime($temp)));
	unset($temp);
	$sql="
		SELECT `s_latest_reports_id`
		FROM `Mahidol_Rama_Medicine_Surg_s_latest_reports`
		WHERE `time` = '$time'
	";
	$result = mysql_query($sql);
	$num = mysql_num_rows($result);
	if($rs = mysql_fetch_array($result)){
		$_SESSION["s_latest_reports_id"] = $rs["s_latest_reports_id"];
	}
	elseif($num == ""){
		$sql="
			INSERT INTO `Mahidol_Rama_Medicine_Surg_s_latest_reports`
			( `time` )
			VALUE ('$time')
		";
		$result = mysql_query($sql);
		if(!$result)die(mysql_error());
		
		$sql="
			SELECT `s_latest_reports_id`
			FROM `Mahidol_Rama_Medicine_Surg_s_latest_reports`
			WHERE `time` = '$time'
		";
		$result = mysql_query($sql);
		$num=mysql_num_rows($result);
		if($rs = mysql_fetch_array($result)){
			$_SESSION["s_latest_reports_id"] = $rs["s_latest_reports_id"];
		}
	}
?>

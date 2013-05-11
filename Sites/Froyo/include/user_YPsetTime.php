<?php
	//query id_time & keep to DB
	if($_POST["date2"] != ""){
		$_SESSION["date2"] = $_POST["date2"];
	}
	$temp = $_SESSION["date2"];
	$time = date('Y-m-d H:i:s', (strtotime($temp)));
	unset($temp);
	$sql="
		SELECT `order_id`
		FROM `Mahidol_Rama_Medicine_Surg_yp_lastest_reports`
		WHERE `time` = '$time'
	";
	$result = mysql_query($sql);
	$num = mysql_num_rows($result);
	if($rs = mysql_fetch_array($result)){
		$_SESSION["yp_id"] = $rs["order_id"];
	}
	elseif($num == ""){
		$sql="
			INSERT INTO `Mahidol_Rama_Medicine_Surg_yp_lastest_reports`
			( `time` )
			VALUE ('$time')
		";
		$result = mysql_query($sql);
		if(!$result)die(mysql_error());
		
		$sql="
			SELECT `order_id`
			FROM `Mahidol_Rama_Medicine_Surg_yp_lastest_reports`
			WHERE `time` = '$time'
		";
		$result = mysql_query($sql);
		$num=mysql_num_rows($result);
		if($rs = mysql_fetch_array($result)){
			$_SESSION["yp_id"] = $rs["order_id"];
		}
	}
?>

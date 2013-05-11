<?php
/*
$sql = "
	SELECT `firstname`, `lastname`
	FROM  `Mahidol_Rama_Medicine_Surg_s_patient_profiles` 
	WHERE `Patient_id` = '".$_SESSION['patient']."'
";
$result = mysql_query($sql);
/*
if($rs = mysql_fetch_array($result)){
	$firstname = $rs["firstname"];
	$lastname = $rs["lastname"];
}*/
/*
$rs = mysql_fetch_array($result);
*/
?>
<a data-role="actionsheet" data-icon="grid" class="ui-btn-right" >Settings</a>
<div>
<?php
	$sql = "
	SELECT `id`, `name`, `surname`
	FROM  `Mahidol_Rama_Medicine_Surg_doctor_profiles`
	WHERE `id` = '".$_SESSION['doctor']."'
	";
	$result = mysql_query($sql);
	if($rs = mysql_fetch_array($result)){
		$did = $rs["id"];
		$doctor_firstname = $rs["name"];
		$doctor_lastname = $rs["surname"];
	}
	
	$sql = "
	SELECT `patient_id`, `firstname`, `lastname`
	FROM  `Mahidol_Rama_Medicine_Surg_s_patient_profiles`
	WHERE `patient_id` = '{$_SESSION["patient"]}'
	";
	$result = mysql_query($sql);
	if($rs = mysql_fetch_array($result)){
		$pid = $rs["patient_id"];
		$patient_firstname = $rs["firstname"];
		$patient_lastname = $rs["lastname"];
	}

?>
	<a data-role="button" href="<?php echo $rootpath; ?>doctor_profile.php?did=<?php echo $did; ?>" rel="external">Doctor: <?php echo $doctor_firstname." ".$doctor_lastname; ?></a> <br />
	<a data-role="button" href="<?php echo $rootpath; ?>result-found.php?pid=<?php echo $pid; ?>" rel="external">Patient: <?php echo $patient_firstname." ".$patient_lastname; ?></a> <br />
	<a data-role="button" href="<?php echo $rootpath; ?>logout.php" data-theme="b">Log Out</a>	
</div>

<?php
$title_name = "Neurological Observation";
include("./include/user_head.php");
if($_SESSION['doctor'] == ""){
	include("./include/login/login.php");
}
elseif($_SESSION['doctor'] != ""){
	$patient = $_SESSION["patient"];
	if($_GET["new"] == 1){ //new CN
		unset($_SESSION["date2"]);
	}
	$timeRecord = $_SESSION["date2"];
	if($_GET["edit"] == 1){ //edit CN
		unset($_SESSION["date2"]);
		$sql = "
		SELECT `time`
		FROM  `Mahidol_Rama_Medicine_Surg_yp_lastest_reports`
		WHERE `order_id` = '".$_GET['id']."' ;
		";
		$result = mysql_query($sql);
		while($rs = mysql_fetch_array($result)){
			$timeRecord = $rs["time"];
		}
	}
	if($timeRecord == ""){
		$timeRecord = $_SESSION["date2"];
	}
	if($patient == ""){
		header("location: ./search-main.php");
	}
	else{
		
?>
		<div data-role="page">
			<div data-role= "header" data-theme= "b">
				<div data-role="listview" data-type="horizontal" class="ui-btn-left">
					<a href="index.php" data-role="button" data-icon="home" >Home</a>
				</div>
				<h1>Neurological Observation</h1>
				<?php include("./include/user_head_right.php"); ?>
			</div><!--end header -->
			<div data-role="content" class="container_12">
				<div class="grid_6">
					<div data-role="fieldcontain">
						<form name="neuroObservForm" action="" method="POST">
							<label for="date2">Date and Time</label>
							<input type="text" name="date2" id="date3" class="mobiscroll" value="<?=$timeRecord?>"/>
						</form>
					</div>
				</div>
				<div class="grid_12">
					<ul data-role="listview">
						<li>
							<a href="#" rel="external" onclick="neuroObservNextPage('coma-scale.php'); ">
								<h3>Coma Scale</h3>
							</a>
						</li>
						<li>
							<a href="#" rel="external" onclick="neuroObservNextPage('vital-signs.php'); ">
								<h3>Vital Signs</h3>
							</a>
						</li>
						<li>
							<a href="#" rel="external" onclick="neuroObservNextPage('motor-power.php'); ">
								<h3>Motor Power</h3>
							</a>
						</li>          
					</ul>
				</div>
				<?php // <input name="" type="submit" value="Submit"  data-theme="b"> ?>
			</div><!--end content -->
		</div><!--end page -->
<?php
		include("./include/user_bottom.php");
	} //end ( $_SESSION['patient'] != "" );
} //end ( $_SESSION["doctor"] != "" );
?>

<?php
	$title_name = "Gragh";
	$rootpath = "../";
	include($rootpath."include/user_head.php");

	if($_SESSION['doctor'] == ""){
		include($rootpath."./include/login/login.php");
	}
	elseif($_SESSION['doctor'] != ""){
	
		$patient = $_SESSION["patient"];

		if($patient == ""){
			header("location: ./search-main.php");
		}
		else{
?>
			<div data-role="page">
				<div data-role= "header" data-theme= "b">
<?php
/*
					<!--div data-role="listview" data-type="horizontal" class="ui-btn-left">
<?php					$sql = "
							SELECT `admin`
							FROM  `Mahidol_Rama_Medicine_Surg_doctor_profiles` 
							WHERE `username` = '".$_SESSION["doctor"]."'
							AND `admin` = '1'
						;";
						$result = mysql_query($sql);
						if($rs = mysql_fetch_array($result)){
							if($rs["admin"] == '1'){
?>								<a href="doctor_list.php" data-role="button" data-icon="admin" >Admin</a>
<?php						}
						}
?>				 	</div-->
*/
?>
					<div data-role="listview" data-type="horizontal" class="ui-btn-left">
						<a href="<?php echo $rootpath; ?>result-found.php" data-role="button" data-icon="back">Back</a>
						<a href="<?php echo $rootpath; ?>index.php" data-role="button" data-icon="home" >Home</a>
					</div>
					<h1>Patient Information Management System</h1>
<?php				include($rootpath."./include/user_head_right.php"); ?>
				</div><!--end header -->
				<div data-role="content" class="container_12">
		
					<!--script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script-->
<?php
					$sql="
						SELECT `order_id`, `R_size`, `L_size`, `R_response`, `L_response`, `tempreture`, `p_bp`, `r`
						FROM  `Mahidol_Rama_Medicine_Surg_yp_vital_signs` 
						WHERE `Patient_id` = '$patient'
					;";
					$result = mysql_query($sql);
					$num=mysql_num_rows($result);
//					$vital_R_size = new SplFixedArray($num);
					while($rs = mysql_fetch_array($result)){
						$vital_R_size[] = $rs["R_size"];
						$vital_L_size[] = $rs["L_size"];
						$vital_R_response[] = $rs["R_response"];
						$vital_L_response[] = $rs["L_response"];
						$vital_tempreture[] = $rs["tempreture"];
						$vital_p_bp[] = $rs["p_bp"];
						$vital_r[] = $rs["r"];
					
						$sql2 = "
								SELECT `time`
								FROM  `Mahidol_Rama_Medicine_Surg_yp_lastest_reports` 
								WHERE `order_id` = '{$rs["order_id"]}';
						";
						$result2 = mysql_query($sql2);
						if($rs2 = mysql_fetch_array($result2)){
							$time[] = "Date: ".date("D, F d, Y" ,strtotime($rs2["time"]))." <br />Time: ".date("H:i:s",strtotime($rs2["time"]));
						}
						
					}
//					print_r($vital_R_size);
//					echo count($vital_tempreture);
//					echo $vital_tempreture;
					
					
echo <<<HTMLBLOCK
					<script type="text/javascript">
						$(function () {
							var chart;
							$(document).ready(function() {
								chart = new Highcharts.Chart({
									chart: {
										renderTo: 'graphContainer',
										type: 'line',
										marginRight: 130,
										marginBottom: 50
									},
									title: {
										text: 'Neurological Observation',
										x: -20 //center
									},
									subtitle: {
										text: 'Temperature',
										x: -20
									},
									xAxis: {
										categories: 
										[
HTMLBLOCK;

										for($i=0; $i<count($time); $i++){
											echo "'$time[$i]'";
											if($i < count($time) - 1){
												echo ", ";
											}
										}
										
echo <<<HTMLBLOCK
										]
									},
									yAxis: {
										title: {
											text: 'Temperature (°C)'
										},
										plotLines: [{
											value: 0,
											width: 1,
											color: '#808080'
										}]
									},
									tooltip: {
										formatter: function() {
												return '<b>'+ this.series.name +'</b><br/>'+
												this.x +': '+ this.y +'°C';
										}
									},
									legend: {
										layout: 'vertical',
										align: 'right',
										verticalAlign: 'top',
										x: -10,
										y: 100,
										borderWidth: 0
									},
									series: [{
										name: 'Temperature',
										data: [
HTMLBLOCK;
										for($i=0; $i<count($vital_tempreture); $i++){
											echo $vital_tempreture[$i];
											if($i < count($vital_tempreture) - 1){
												echo ", ";
											}
										}

echo <<<HTMLBLOCK
										]
									}
									/*
									,
									{
										name: 'vital_L_size',
										data: [

HTMLBLOCK;
/*
										for($i=0; $i<count($vital_L_size); $i++){
											echo $vital_L_size[$i];
											if($i < count($vital_L_size) - 1){
												echo ", ";
											}
										}
*/
echo <<<HTMLBLOCK
										]
									}
									*/
									]
								});
							});
		
						});
					</script><br/>
HTMLBLOCK;
?>
					<script src="<?=$rootpath?>include/js/Highcharts-2.2.1/js/highcharts.js"></script>
					<script src="<?=$rootpath?>include/js/Highcharts-2.2.1/js/modules/exporting.js"></script>

					<div id="graphContainer" style="min-width: 400px; height: 400px; margin: 0 auto"></div>

<!-- ####################################		2		########################## -->

<?php
/*
					$sql="
						SELECT `order_id`, `R_size`, `L_size`, `R_response`, `L_response`, `tempreture`, `p_bp`, `r`
						FROM  `Mahidol_Rama_Medicine_Surg_yp_vital_signs` 
						WHERE `Patient_id` = '$patient'
					;";
					$result = mysql_query($sql);
					$num=mysql_num_rows($result);
//					$vital_R_size = new SplFixedArray($num);
					while($rs = mysql_fetch_array($result)){
						$vital_R_size[] = $rs["R_size"];
						$vital_L_size[] = $rs["L_size"];
					//	$vital_R_response = $rs["R_response"];
					//	$vital_L_response = $rs["L_response"];
					//	$vital_tempreture = $rs["tempreture"];
					//	$vital_p_bp = $rs["p_bp"];
					//	$vital_r = $rs["r"];
					
						$sql2 = "
								SELECT `time`
								FROM  `Mahidol_Rama_Medicine_Surg_yp_lastest_reports` 
								WHERE `order_id` = '{$rs["order_id"]}' ;
						";
						$result2 = mysql_query($sql2);
						if($rs2 = mysql_fetch_array($result2)){
							$time[] = "Date: ".date("D, F d, Y" ,strtotime($rs2["time"]))." <br />Time: ".date("H:i:s",strtotime($rs2["time"]));							
						}
						
					}
//					print_r($vital_R_size);
*/
					
					
echo <<<HTMLBLOCK
					<script type="text/javascript">
						$(function () {
							var chart;
							$(document).ready(function() {
								chart = new Highcharts.Chart({
									chart: {
										renderTo: 'graphContainer2',
										type: 'line',
										marginRight: 130,
										marginBottom: 50
									},
									title: {
										text: 'Neurological Observation',
										x: -20 //center
									},
									subtitle: {
										text: 'Blood Pressure',
										x: -20
									},
									xAxis: {
										categories: 
										[
HTMLBLOCK;

										for($i=0; $i<count($time); $i++){
											echo "'$time[$i]'";
											if($i < count($time) - 1){
												echo ", ";
											}
										}
										
echo <<<HTMLBLOCK
										]
									},
									yAxis: {
										title: {
											text: 'Blood Pressure(mmHg)'
										},
										plotLines: [{
											value: 0,
											width: 1,
											color: '#808080'
										}]
									},
									tooltip: {
										formatter: function() {
												return '<b>'+ this.series.name +'</b><br/>'+
												this.x +': '+ this.y +'°C';
										}
									},
									legend: {
										layout: 'vertical',
										align: 'right',
										verticalAlign: 'top',
										x: -10,
										y: 100,
										borderWidth: 0
									},
									series: [{
										name: 'Blood Pressure',
										data: [
HTMLBLOCK;
										for($i=0; $i<count($vital_p_bp); $i++){
											echo $vital_p_bp[$i];
											if($i < count($vital_p_bp) - 1){
												echo ", ";
											}
										}
echo <<<HTMLBLOCK
										]
									}]

								});
							});
		
						});
					</script>
HTMLBLOCK;
?>
					<!--script src="http://code.highcharts.com/highcharts.js"></script>
					<script src="http://code.highcharts.com/modules/exporting.js"></script-->

					<div id="graphContainer2" style="min-width: 400px; height: 400px; margin: 0 auto"></div>

<?php ##########################################		3		########################################### ?>

<?php
/*
					$sql="
						SELECT `order_id`, `R_size`, `L_size`, `R_response`, `L_response`, `tempreture`, `p_bp`, `r`
						FROM  `Mahidol_Rama_Medicine_Surg_yp_vital_signs` 
						WHERE `Patient_id` = '$patient'
					;";
					$result = mysql_query($sql);
					$num=mysql_num_rows($result);
//					$vital_R_size = new SplFixedArray($num);
					while($rs = mysql_fetch_array($result)){
						$vital_R_size[] = $rs["R_size"];
						$vital_L_size[] = $rs["L_size"];
					//	$vital_R_response = $rs["R_response"];
					//	$vital_L_response = $rs["L_response"];
					//	$vital_tempreture = $rs["tempreture"];
					//	$vital_p_bp = $rs["p_bp"];
					//	$vital_r = $rs["r"];
					
						$sql2 = "
								SELECT `time`
								FROM  `Mahidol_Rama_Medicine_Surg_yp_lastest_reports` 
								WHERE `order_id` = '{$rs["order_id"]}' ;
						";
						$result2 = mysql_query($sql2);
						if($rs2 = mysql_fetch_array($result2)){
							$time[] = "Date: ".date("D, F d, Y" ,strtotime($rs2["time"]))." <br />Time: ".date("H:i:s",strtotime($rs2["time"]));							
						}
						
					}
//					print_r($vital_R_size);
*/
					
					
echo <<<HTMLBLOCK
					<script type="text/javascript">
						$(function () {
							var chart;
							$(document).ready(function() {
								chart = new Highcharts.Chart({
									chart: {
										renderTo: 'graphContainer3',
										type: 'line',
										marginRight: 130,
										marginBottom: 50
									},
									title: {
										text: 'Neurological Observation',
										x: -20 //center
									},
									subtitle: {
										text: 'Heart Rate',
										x: -20
									},
									xAxis: {
										categories: 
										[
HTMLBLOCK;

										for($i=0; $i<count($time); $i++){
											echo "'$time[$i]'";
											if($i < count($time) - 1){
												echo ", ";
											}
										}
										
echo <<<HTMLBLOCK
										]
									},
									yAxis: {
										title: {
											text: 'Heart Rate(bpm)'
										},
										plotLines: [{
											value: 0,
											width: 1,
											color: '#808080'
										}]
									},
									tooltip: {
										formatter: function() {
												return '<b>'+ this.series.name +'</b><br/>'+
												this.x +': '+ this.y +'°C';
										}
									},
									legend: {
										layout: 'vertical',
										align: 'right',
										verticalAlign: 'top',
										x: -10,
										y: 100,
										borderWidth: 0
									},
									series: [
									{
										name: 'Heart Rate',
										data: [
HTMLBLOCK;
										for($i=0; $i<count($vital_r); $i++){
											echo $vital_r[$i];
											if($i < count($vital_r) - 1){
												echo ", ";
											}
										}

echo <<<HTMLBLOCK
										]
									}]
								});
							});
		
						});
					</script><br/>
HTMLBLOCK;
?>
					<!--script src="http://code.highcharts.com/highcharts.js"></script>
					<script src="http://code.highcharts.com/modules/exporting.js"></script-->

					<div id="graphContainer3" style="min-width: 400px; height: 400px; margin: 0 auto"></div>

<?php ##########################################		end 3		########################################### ?>

				</div><!--end content -->
			</div><!--end page -->

<?php
			include($rootpath."./include/user_bottom.php");
		} //end ( $_SESSION['patient'] != "" );
	} //end ( $_SESSION["doctor"] != "" );
?>

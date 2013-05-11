<?php
if($_GET["fn"] == "cn"){
	$title_name = "Cranial Nerves Report";
}
elseif($_GET["fn"] == "neuro"){
	$title_name = "Neurological Observation Report";
}

include("./include/user_head.php");

if($_SESSION['doctor'] == ""){
	include("./include/login/login.php");
}
elseif($_SESSION['doctor'] != ""){

	//it is temp
	$patient = $_SESSION["patient"];

	if($patient == ""){
		header("location: ./search-main.php");
	}
	else{
		$fn = $_GET["fn"];
		$order_id = $_GET["id"];
/*
		$sql="
			SELECT `s_latest_reports_id`, `time`
			FROM  `Mahidol_Rama_Medicine_Surg_s_latest_reports` 
			WHERE  `s_id` = '$sid'
			AND `Patient_id` = '$patient'
		;";
		$result = mysql_query($sql);
		while($rs = mysql_fetch_array($result)){
			$s_latest_reports_id = $rs["s_latest_reports_id"];
			$time = $rs["time"];
		}
*/
?>
		<div data-role="page">
			<div data-role= "header" data-theme= "b">
				<div data-role="listview" data-type="horizontal" class="ui-btn-left">
					<a href="./result-found.php" data-role="button" data-icon="back" rel="external">Back</a>
					<a href="index.php" data-role="button" data-icon="home" rel="external">Home</a>
				</div>
				<h1>
					
<?php
					if($fn == "cn") echo "Cranial Nerves";
					elseif($fn == "neuro") echo "Neurological Observation";
?>
					Report
				</h1>
				<?php include("./include/user_head_right.php"); ?>
			</div><!--end header -->
		<div data-role="content" class="container_12">
			<div class="grid_12">
				<span class="title-cn">
				Patient ID: <?=$patient?> <br />
				 
<?php			if($fn == "cn"){
					$sql = "
						SELECT `time`
						FROM  `Mahidol_Rama_Medicine_Surg_s_latest_reports` 
						WHERE `s_latest_reports_id` = '$order_id' ;
					";
					$result = mysql_query($sql);
					if($rs = mysql_fetch_array($result)){
						$time = $rs["time"];
					}
					$time = "Date: ".date("D, F d, Y" ,strtotime($time))." <br />Time: ".date("H:i:s",strtotime($time));
					echo $time;
				}
				elseif($fn == "neuro"){
				$sql = "
						SELECT `time`
						FROM  `Mahidol_Rama_Medicine_Surg_yp_lastest_reports` 
						WHERE `order_id` = '$order_id' ;
					";
					$result = mysql_query($sql);
					if($rs = mysql_fetch_array($result)){
						$time = $rs["time"];
					}
					echo $time = "Date: ".date("D, F d, Y" ,strtotime($time))." <br />Time: ".date("H:i:s",strtotime($time));
				}
?>
				</span>
				<br/ >
				<table  style="table-layout: fixed"> 
<?php
					if($fn == "cn"){
?>
						<thead> 
							<tr> 
							<th width="12%" >CN No.</th> 
							<th width="29%" >Type</th> 
							<th width="15%" >Right</th> 
							<th width="15%" >Left</th> 
							<th width="29%" >General</th> 
							</tr> 
						</thead> 
<?php
					}//end if fn == CN
					elseif($fn == "neuro"){
?>
						<thead> 
							<tr> 
								<th width="20%" >Type</th> 
								<th width="20%" colspan="2" >Right</th> 
								<th width="20%" colspan="2" >Left</th> 
								<th width="40%" colspan="2" >General</th> 
							</tr> 
						</thead> 
<?php
					}//end if fn == neuro
					if($fn == "cn"){
?>
						<tbody>
							<tr>
<?php
								$sql="
									SELECT `R_smelling`, `L_smelling`
									FROM  `Mahidol_Rama_Medicine_Surg_cn_1` 
									WHERE `Patient_id` = '".$_SESSION['patient']."'
									AND `s_latest_reports_id` = '$order_id'
								;";
								$result = mysql_query($sql);
								if($rs = mysql_fetch_array($result)){
									$right = $rs["R_smelling"];
									$left = $rs["L_smelling"];
								}
?>
								<td><span class="title-cn">CN 1</span></td> 
								<td>Smelling</td> 
								<td>
<?php
									if($right != ""){?>
										<span class="hightlight-ans">
<?php										echo $right; ?>
										</span>
<?php								}
									else{?>
										<span class="hightlight-ans"> <?php echo "N/A";?></span> 
									<?php }
?>
								</td> 
								<td>
<?php
									if($left != ""){?>
										<span class="hightlight-ans">
<?php										echo $left; ?>
										</span>
<?php								}
									else{?>
										<span class="hightlight-ans"> <?php echo "N/A";?></span> 
									<?php }
?>
								</td>  
								<td></td> 
							</tr> 
							<tr> 
<?php
								$sql="
									SELECT `R_visualAcuity_up`, `R_visualAcuity_down`, `L_visualAcuity_up`, `L_visualAcuity_down`, `R_visualField_1`, `R_visualField_2`, `R_visualField_3`, `R_visualField_4`, `L_visualField_1`, `L_visualField_2`, `L_visualField_3`, `L_visualField_4`
									FROM  `Mahidol_Rama_Medicine_Surg_cn_2` 
									WHERE `Patient_id` = '".$_SESSION['patient']."'
									AND `s_latest_reports_id` = '$order_id'
								;";
								$result = mysql_query($sql);
								for($count = 1; $count <= 4; $count++){
									$R_visualField[$count] = "N/A";
									$L_visualField[$count] = "N/A";
								}
								if($rs = mysql_fetch_array($result)){
									$R_visualAcuity_up = $rs["R_visualAcuity_up"];
									$R_visualAcuity_down = $rs["R_visualAcuity_down"];
									$L_visualAcuity_up = $rs["L_visualAcuity_up"];
									$L_visualAcuity_down = $rs["L_visualAcuity_down"];
									for($count = 1; $count <= 4; $count++){
										if($rs[("R_visualField_".$count)] == 0){
											$R_visualField[$count] = "Not Blind";
										}
										elseif($rs[("R_visualField_".$count)] == 1){
											$R_visualField[$count] = "Blind";
										}
									}
									for($count = 1; $count <= 4; $count++){
										if($rs[("L_visualField_".$count)] == 0){
											$L_visualField[$count] = "Not Blind";
										}
										elseif($rs[("L_visualField_".$count)] == 1){
											$L_visualField[$count] = "Blind";
										}
									}
								}
?>
								<td><span class="title-cn">CN 2</span></td>  	
								<td>
									Visual <br />
									- Visual Acuity<br />
<?php								for($count = 1; $count <= 4; $count++){
?>										- Visual Field : <?php echo $count;?><br/>
<?php									}
?>									<br />
									- Visual Field (Beta):
								</td> 
								<td>
									<br />
<?php
	 								if($R_visualAcuity_up != "" || $R_visualAcuity_down != "") {
?>										<span class="hightlight-ans">
<?php										echo $R_visualAcuity_up."/".$R_visualAcuity_down; ?>
										</span>
<?php 								}else{
?>										<span class="hightlight-ans"><?php echo "N/A";?></span>
									<?php }
?>
									<br />
<?php
									for($count = 1; $count <= 4; $count++){
										if($R_visualField[$count] != ""){
?>											<span class="hightlight-ans"><?php echo $R_visualField[$count];?></span>
<?php									}
										else{
?>											<span class="hightlight-ans"><?php echo "N/A";?></span>
<?php									}
?>
										<br />
<?php
									}

									$sql="
										SELECT `VF_imagePath_R`, `VF_imagePath_L`
										FROM  `Mahidol_Rama_Medicine_Surg_cn_2_VF` 
										WHERE `Patient_id` = '".$_SESSION['patient']."'
										AND `s_latest_reports_id` = '$order_id'
									;";
									$result = mysql_query($sql);
									if($rs = mysql_fetch_array($result)){
										$VF_imagePath_R = $rs["VF_imagePath_R"];
										$VF_imagePath_L = $rs["VF_imagePath_L"];
									}
?>
									<br />

<?php								$CN3_VF_R = 253*0.5;
									$CN3_VF_L = 250*0.5;
									
									if($VF_imagePath_R != "" && $VF_imagePath_L != ""){
?>
									
									<div id="container2" style="background-image: url(<?php echo $rootpath; ?>images/visual_field_1.png); background-size: 100px; background-repeat:no-repeat; ">
										<img src="<?php echo $rootpath; ?>images/CN2/<?php echo $VF_imagePath_R; ?>.png" width="100">
									</div>
<?php								}
									else{
?>										<span class="hightlight-ans">N/A</span>
<?php								}
?>
								</td> 
								<td>
									<br />
<?php
									if($L_visualAcuity_up != "" || $L_visualAcuity_down != "") {
?>										<span class="hightlight-ans">
<?php										echo $L_visualAcuity_up."/".$L_visualAcuity_down; 
?>										</span>
<?php								}
									else{
?>										<span class="hightlight-ans">N/A</span>
<?php								}
?>
									<br />
<?php
									for($count = 1; $count <= 4; $count++){
?>
										<span class="hightlight-ans"><?=$L_visualField[$count]?></span><br />
<?php
									}
?>
									<br />
									
<?php								$CN3_VF_R = 253*0.5;
									$CN3_VF_L = 250*0.5;
									
									if($VF_imagePath_R != "" && $VF_imagePath_L != ""){
?>
									<div id="container2" style="background-image: url(<?php echo $rootpath; ?>images/visual_field_1.png); background-size: 100px; background-repeat:no-repeat; ">
										<img src="<?php echo $rootpath; ?>images/CN2/<?php echo $VF_imagePath_L; ?>.png" width="100">
									</div>
<?php								}
									else{
?>										<span class="hightlight-ans">N/A</span>
<?php								}
?>
								</td> 
								<td></td> 
							</tr> 
<?php
								$sql="
									SELECT `s_latest_reports_id`, `R_eom`, `L_eom`
									FROM  `Mahidol_Rama_Medicine_Surg_cn_3_4_6`
									WHERE `Patient_id` = '".$_SESSION['patient']."'
									AND `s_latest_reports_id` = '$order_id'
								;";
								$result = mysql_query($sql);
								if($rs = mysql_fetch_array($result)){
									$R_eom = $rs["R_smelling"];
									$L_eom = $rs["L_smelling"];
								}
?>
							<tr> 
								<td><span class="title-cn">CN 3, 4, 6</span></td>  
								<td>EOM</td> 
								<td>
<?php
									if($R_eom != ""){
?>										<span class="hightlight-ans"><?php echo $R_eom;?></span>
<?php								}
									else {
?>										<span class="hightlight-ans"><?php echo "N/A";?></span>
<?php								}
?>
								</td> 
								<td>
<?php
									if($L_eom != ""){
?>										<span class="hightlight-ans"><?php echo $L_eom;?></span>
<?php								}
									else{
?>										<span class="hightlight-ans"><?php echo "N/A";?></span>
<?php								}
?>
								</td> 
								<td></td> 
							</tr> 
<?php
								$sql="
									SELECT *
									FROM  `Mahidol_Rama_Medicine_Surg_cn_5`
									WHERE `Patient_id` = '".$_SESSION['patient']."'
									AND `s_latest_reports_id` = '$order_id'
								;";
								$result = mysql_query($sql);
								if($rs = mysql_fetch_array($result)){
									for($i = 1; $i <=6; $i++){
										$sensory[$i] = $rs["sensory_".$i];
									}
									$R_motor = $rs["R_motor"];
									$L_motor = $rs["L_motor"];
								}
?>
							<tr> 
								<td><span class="title-cn">CN 5</span></td>  
								<td>Sensory and Motor Mastication</td> 
								<td>
<?php
									for($i = 1; $i <=6; $i++){
										if($sensory[$i] != ""){
?>
											<span class="hightlight-ans">
<?php											echo $sensory[$i]."<br />";?>
											</span>
<?php									}
									}
									if($R_motor != ""){
?>										<span class="hightlight-ans"><?php echo $R_motor;?></span>
<?php								}
									else{
?>										<span class="hightlight-ans"><?php echo "N/A";?></span>
<?php								}
?>
								</td> 
								<td>
<?php
									for($i = 1; $i <=6; $i++){
										$sensory[$i] = $rs["sensory_".$i];
									}
									if($L_motor != ""){?>
										<span class="hightlight-ans"><?php echo $L_motor;?></span>
					<?php }
									else {?>
										<span class="hightlight-ans"><?php echo "N/A";?></span>
						<?php }
?>
								</td> 
								<td></td> 
							</tr> 
<?php
								$sql="
									SELECT `R_HB`, `L_HB`
									FROM  `Mahidol_Rama_Medicine_Surg_cn_7`
									WHERE `Patient_id` = '".$_SESSION['patient']."'
									AND `s_latest_reports_id` = '$order_id'
								;";
								$result = mysql_query($sql);
								if($rs = mysql_fetch_array($result)){
									$HBtext = array(
										1  => 'Good',
										'Weak Less', 
										'Weak More',
										'Can not closed the eye',
										'Almost no movement',
										'No movement'
									);
									
									
									for($i=1; $i<=6; $i++){
										if($rs["R_HB"] == "normal{$i}"){
											$R_HB = $HBtext[$i];
										}
										if($rs["L_HB"] == "normal{$i}"){
											$L_HB = $HBtext[$i];
										}
									}
								}
?>
							<tr> 
								<td><span class="title-cn">CN 7</span></td>  
								<td>Facial (Brackman Scale)</td> 
								<td>
<?php
									if($R_HB != ""){
?>										<span class="hightlight-ans"><?php echo $R_HB;?></span>
<?php								}
									else{
?>										<span class="hightlight-ans"><?php echo "N/A";?></span>
<?php								}
?>
								</td> 
								<td>
<?php
									if($L_HB != ""){
?>										<span class="hightlight-ans"><?php echo $L_HB;?></span>
<?php								}
									else{
?>										<span class="hightlight-ans"><?php echo "N/A";?></span>
<?php								}
?>
								</td> 
								<td> </td> 
							</tr> 
<?php
								$sql="
									SELECT `R_hearing`, `L_hearing`
									FROM  `Mahidol_Rama_Medicine_Surg_cn_8`
									WHERE `Patient_id` = '".$_SESSION['patient']."'
									AND `s_latest_reports_id` = '$order_id'
								;";
								$result = mysql_query($sql);
								if($rs = mysql_fetch_array($result)){
									$R_hearing = $rs["R_hearing"];
									$L_hearing = $rs["L_hearing"];
								}
?>
							<tr> 
								<td><span class="title-cn">CN 8</span></td>  
								<td>Hearing</td> 
								<td>
<?php
									if($R_hearing != ""){
?>										<span class="hightlight-ans"><?php echo $R_hearing;?></span>
<?php								}
									else{
?>										<span class="hightlight-ans"><?php echo "N/A";?></span>
<?php								}
?>
								</td> 
								<td>
<?php
									if($L_hearing != ""){
?>										<span class="hightlight-ans"><?php echo $L_hearing;?></span>
<?php								}
									else{
?>										<span class="hightlight-ans"><?php echo "N/A";?></span>
<?php								}
?>
								</td> 
								<td></td> 
							</tr> 
<?php
								$sql="
									SELECT `GagReflex`, `hoarseness_of_voice`, `dysphagia`, `dysarthria`
									FROM  `Mahidol_Rama_Medicine_Surg_cn_9_10`
									WHERE `Patient_id` = '".$_SESSION['patient']."'
									AND `s_latest_reports_id` = '$order_id'
								;";
								$result = mysql_query($sql);
								if($rs = mysql_fetch_array($result)){
									$GagReflex = $rs["GagReflex"];
									$hoarseness_of_voice = $rs["hoarseness_of_voice"];
									$dysphagia = $rs["dysphagia"];
									$dysarthria = $rs["dysarthria"];
								}
?>
							<tr> 
								<td><span class="title-cn">CN 9, 10</span></td>  
								<td>
									Throat <br />
									- GagReflex <br />
									- Hoarseness of voice <br />
									- Dysphagia <br />
									- Dysarthria <br />
								</td> 
								<td> 	</td> 
								<td> 	</td> 
								<td>
									<br />
<?php
									if($GagReflex != ""){
?>										<span class="hightlight-ans"><?php echo $GagReflex;?></span>
<?php								}
									else{
?>										<span class="hightlight-ans"><?php echo "N/A";?></span>
<?php								}
?>
									<br />
<?php
									if($hoarseness_of_voice != ""){
?>										<span class="hightlight-ans"><?php echo $hoarseness_of_voice;?></span>
<?php								}
									else{
?>										<span class="hightlight-ans"><?php echo "N/A";?></span>
<?php								}
?>
									<br />
<?php
									if($dysphagia != ""){
?>										<span class="hightlight-ans"><?php echo $dysphagia;?></span>
<?php								}
									else{
?>										<span class="hightlight-ans"><?php echo "N/A";?></span>
<?php								}
?>
									<br />
<?php
									if($dysarthria != ""){
?>										<span class="hightlight-ans"><?php echo $dysarthria;?></span>
<?php								}
									else{
?>										<span class="hightlight-ans"><?php echo "N/A";?></span>
<?php								}

?>
								</td> 
							</tr> 
<?php
								$sql="
									SELECT `sternocleidomastoid`
									FROM  `Mahidol_Rama_Medicine_Surg_cn_11`
									WHERE `Patient_id` = '".$_SESSION['patient']."'
									AND `s_latest_reports_id` = '$order_id'
								;";
								$result = mysql_query($sql);
								if($rs = mysql_fetch_array($result)){
									$sternocleidomastoid = $rs["sternocleidomastoid"];
								}
?>
							<tr> 
								<td><span class="title-cn">CN 11</span></td>  



								<td>Sternocleidomasloid	</td> 
								<td></td> 
								<td></td> 
								<td>
<?php
									if($sternocleidomastoid != ""){
?>										<span class="hightlight-ans"><?php echo $sternocleidomastoid;?></span>
<?php								}
									else{
?>										<span class="hightlight-ans"><?php echo "N/A";?></span>
<?php								}
?>
								</td> 
							</tr> 
<?php
								$sql="
									SELECT `R_tongue`, `L_tongue`
									FROM  `Mahidol_Rama_Medicine_Surg_cn_12`
									WHERE `Patient_id` = '".$_SESSION['patient']."'
									AND `s_latest_reports_id` = '$order_id'
								;";
								$result = mysql_query($sql);
								if($rs = mysql_fetch_array($result)){
									$R_tongue = $rs["R_tongue"];
									$L_tongue = $rs["L_tongue"];
								}
?>
							<tr> 
								<td><span class="title-cn">CN 12</span></td>  
								<td>Tongue</td> 
								<td> 
<?php
									if($R_tongue != ""){
?>										<span class="hightlight-ans"><?php echo $R_tongue;?></span>
<?php								}
									else{
?>										<span class="hightlight-ans"><?php echo "N/A";?></span>
<?php								}
?>
								</td> 
								<td>
<?php
									if($L_tongue != ""){
?>										<span class="hightlight-ans"><?php echo $L_tongue;?></span>
<?php								}
									else{
?>										<span class="hightlight-ans"><?php echo "N/A";?></span>
<?php								}
?>
								</td> 
								<td>  </td> 
							</tr> 
						</tbody>        
<?php
					}//end if fn == CN
					elseif($fn == "neuro"){
?>
						<tbody> 
							<tr>
<?php
								$sql="
									SELECT `c_value`, `t_value`, `mm_value`, `total_score`
									FROM  `Mahidol_Rama_Medicine_Surg_yp_coma_scale` 
									WHERE `Patient_id` = '$patient'
									AND `order_id` = '$order_id' 
								";
								$result = mysql_query($sql);
								$num=mysql_num_rows($result);
								if($rs = mysql_fetch_array($result)){
									$cv = $rs["c_value"];
									$tv = $rs["t_value"];
									$mmv = $rs["mm_value"];
									$coma_total_score = $rs["total_score"];
								}
?> 
								<td >Coma Scale</td>
								<td>  </td>
								<td>  </td>
								<td>  </td>
								<td>  </td>
								<td>
									Consciousness
									<br />
									Speech
									<br />
									Movement
									<br />
									Total Score
								</td> 
								<td>
<?php								//C Value
									if($cv != ""){
?>										<span class="hightlight-ans">
<?php
											if($cv == 0) {
												echo "No response";
											}
											elseif($cv == 1){
												echo "Open when hurt";
											}
											elseif($cv == 2){
												echo "Open when heard";
											}
											elseif($cv == 3){
												echo "Good";
											}
											echo " (".$cv.")";
?>										</span>
<?php								}
									else{
?>										<span class="hightlight-ans">
<?php										echo "N/A";
?>										</span>
<?php								}

									//t value
?>												<br />
									<span class="hightlight-ans">
<?php
										if($tv != ""){
											if($tv == 0) echo "No response";
											elseif($tv == 1) echo "Weak";
											elseif($tv == 2) echo "A few words";
											elseif($tv == 3) echo "Fair";
											elseif($tv == 4) echo "Good";
											echo " (".$tv.")";
										}
										else{
?>											<span class="hightlight-ans">
<?php											echo "N/A";
?>											</span>
<?php										}
?>									</span>
									<br />

<?php								//MM value
?>									<span class="hightlight-ans">
<?php
									if($mmv != ""){
										if($mmv == 0) echo "No movement";
										elseif($mmv == 1) echo "Arm have Ab.ext";
										elseif($mmv == 2) echo "Arm have Ab.flex";
										elseif($mmv == 3) echo "Arm-Leg twitch";

										elseif($mmv == 4) echo "Know hurt points";
										elseif($mmv == 5) echo "Good";
										echo " (".$mmv.")";
									}
									else{
										echo "N/A";
									}
?>
									<br />
<?php
									if($coma_total_score != 0){
										echo $coma_total_score;
									}
									else{
										echo "N/A";
									}
?>
								</td>
							</tr> 
<?php
								$sql="
									SELECT `R_size`, `L_size`, `R_response`, `L_response`, `tempreture`, `p_bp`, `r`
									FROM  `Mahidol_Rama_Medicine_Surg_yp_vital_signs` 
									WHERE `Patient_id` = '$patient'
									AND `order_id` = '$order_id' 
								";
								$result = mysql_query($sql);
								$num=mysql_num_rows($result);
								if($rs = mysql_fetch_array($result)){
									$vital_R_size = $rs["R_size"];
									$vital_L_size = $rs["L_size"];
									$vital_R_response = $rs["R_response"];
									$vital_L_response = $rs["L_response"];
									$vital_tempreture = $rs["tempreture"];
									$vital_p_bp = $rs["p_bp"];
									$vital_r = $rs["r"];
								}
?> 
							<tr>
								<td>
									Vital Sign
								</td>
								<td>
									Size

									<br />
									Response

								</td>
								<td>
<?php
									if($vital_R_size != ""){

?>										<span class="hightlight-ans"><?php echo $vital_R_size;?></span>
<?php								}
									else{
?>										<span class="hightlight-ans"><?php echo "N/A";?></span>
<?php								}
?>
									<br />
<?php
									if($vital_R_response != ""){
?>										<span class="hightlight-ans"><?php echo $vital_R_response;?></span>
<?php								}
									else{
?>										<span class="hightlight-ans"><?php echo "N/A"; ?></span>
<?php								}
?>
								</td>
								<td>
									Size

									<br />
									Response
			
								</td>
								<td>
<?php
									if($vital_L_size != 0){
?>										<span class="hightlight-ans"><?php echo $vital_L_size;?></span>
<?php								}
									else{
?>										<span class="hightlight-ans"><?php echo "N/A";?></span>
<?php								}
?>
									<br />
<?php
									if($vital_L_response != ""){
?>										<span class="hightlight-ans"><?php echo $vital_L_response;?></span>
<?php								}
									else{
?>										<span class="hightlight-ans">
<?php										echo "N/A";
?>										</span>
<?php								}
?>						
								</td>
								<td>
									Temperature

									<br />
									Blood Pressure

									<br />
									Respiratory

								</td>
								<td>
<?php
									if($vital_tempreture != 0){
?>										<span class="hightlight-ans"><?php echo $vital_tempreture;?></span>
<?php								}
									else{
?>										<span class="hightlight-ans"><?php echo "N/A";?>
<?php								}
?>
									<br />
<?php
									if($vital_p_bp != 0){
?>										<span class="hightlight-ans"><?php echo $vital_p_bp;?></span>
<?php								}
									else{
?>										<span class="hightlight-ans"><?php echo "N/A";?></span>
<?php								}
?>
									<br />
<?php
									if($vital_r != 0){
?>										<span class="hightlight-ans"><?php echo $vital_r;?></span>
<?php								}
									else{
?>										<span class="hightlight-ans"><?php echo "N/A";?></span>
<?php								}
?>
								</td>
							</tr>
<?php
								$sql="
									SELECT `arm_fracture`, `leg_fracture`
									FROM  `Mahidol_Rama_Medicine_Surg_yp_motor_power` 
									WHERE `Patient_id` = '$patient'
									AND `order_id` = '$order_id' 
								";
								$result = mysql_query($sql);
								$num=mysql_num_rows($result);
								if($rs = mysql_fetch_array($result)){
									$moter_arm_fracture = $rs["arm_fracture"];
									$moter_leg_fracture = $rs["leg_fracture"];
								}
?> 
							<tr>
								<td>
									Motor Power
								</td>
								<td>
									
								</td>
								<td>
									
								</td>
								<td>
									
								</td>
								<td>
									
								</td>
								<td>
									Arm Fracture

									<br />
									Leg Fracture

								</td>
								<td>
<?php
									if($moter_arm_fracture != ""){
?>									<span class="hightlight-ans"><?php echo $moter_arm_fracture;?></span>
<?php								}
									else{
?>										<span class="hightlight-ans"><?php echo "N/A";?></span>
<?php								}
?>
									<br />
<?php
									if($moter_leg_fracture != ""){
?>										<span class="hightlight-ans"><?php echo $moter_leg_fracture;?></span>
<?php								}
									else{
?>										<span class="hightlight-ans"><?php echo "N/A";?></span>
<?php								}
?>
								</td>
							</tr>
						</tbody>
<?php
					}//end elseif fn == neuro
?>
				</table>  
			</div><!--end table -->

		</div><!--end content -->
	</div><!--end page -->
<?php
		include("./include/user_bottom.php");
	} //end ( $_SESSION['patient'] != "" );
} //end ( $_SESSION["doctor"] != "" );
?>                          

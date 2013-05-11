<?php

	$title_name = "Patient Information";
	include("./include/user_head.php");

//	$_SESSION['doctor'] = "";
	if($_SESSION['doctor'] == ""){
		include("./include/login/login.php");
	}
	elseif($_SESSION['doctor'] != ""){

		//it is temp
		if($_GET["pid"] != ""){
			$_SESSION["patient"] = $_GET["pid"];
		}
		$patient = $_SESSION["patient"];

		if($patient == ""){
			header("location: ./search-main.php");
		}
		else{
			$sql = "
				SELECT * 
				FROM  `Mahidol_Rama_Medicine_Surg_s_patient_profiles`
				WHERE `Patient_id` = '$patient'
			";
			$result = mysql_query($sql);
			$num=mysql_num_rows($result);
			while($rs = mysql_fetch_array($result)){
				$patient_id = $rs["Patient_id"];
				$firstname = $rs["firstname"];
				$lastname = $rs["lastname"];
				$address = $rs["address"];
				$tel = $rs["tel"];
			}
?>
			<div data-role="page">
				<div data-role= "header" data-theme= "b">
					<div data-role="listview" data-type="horizontal" class="ui-btn-left">
						<a href="./search-main.php" data-role="button" data-icon="back">Back</a>
						<a href="index.php" data-role="button" data-icon="home" >Home</a>
					</div>
					<h1>Patient Information</h1>
					<?php include("./include/user_head_right.php"); ?>
				</div><!--end header -->
				<div data-role="content" class="container_12">
					<div class="grid_12 space-box space-bottom">
						<div class="grid_4 space-box title-color"></div>
						<div class="grid_4 space-box title-color"><p id="title-pos">Profile</p></div>
						<div class="grid_4 space-box title-color"></div>
					</div>
					<div class="grid_12  border-bottom">    
						<div class="grid_3" >
							<p class="space-text">Patient ID :</p>
						</div><!--end grid_2 -label-->
						<div class="grid_5">
							<p class="profile-pos">
								<span id="patient_id">
									<?=$patient_id?><br>&nbsp;
								</span>
							</p>
						</div><!--end grid_5-Firstname -->
						<div class="grid_4">
							<span id="btn_save_1">
								<!--a onClick="editProfile('<?=$patient_id?>', '<?=$patient_id?>', '1', 'patient_id'); " href="#" data-role="button" data-inline="true" data-theme="b" >Edit</a-->
							</span>
						</div><!--end grid_4-Edit -->
					</div><!--end-grid_12-wrapper -->  

					<div class="grid_12  border-bottom">
						<div class="grid_3" >
							<p class="space-text">First Name :</p>
						</div><!--end grid_2 -label-->
						<div class="grid_5">
							<p class="profile-pos">
								<span id="firstName">
									<?=$firstname?>
								</span>
							</p>
						</div><!--end grid_5-Firstname -->
						<div class="grid_4">
							<span id="btn_save_2">
								<a onClick="editProfile('<?=$patient_id?>', '<?=$firstname?>', '2', 'firstName'); " href="#" data-role="button" data-inline="true" data-theme="b">Edit</a>
							</span>
						</div><!--end grid_4-Edit -->
					</div><!--end-grid_12-wrapper -->    

					<div class="grid_12  border-bottom">    
						<div class="grid_3" >
							<p class="space-text">Last Name:</p>
						</div><!--end grid_2 -label-->
						<div class="grid_5">
							<p class="profile-pos">
								<span id="lastName">
									<?=$lastname?>
								</span>
							</p>
						</div><!--end grid_5-Firstname -->
						<div class="grid_4">
							<span id="btn_save_3">
								<a onClick="editProfile('<?=$patient_id?>', '<?=$lastname?>', '3', 'lastName'); " href="#" data-role="button" data-inline="true" data-theme="b" >Edit</a>
							</span>
						</div><!--end grid_4-Edit -->
					</div><!--end-grid_12-wrapper -->    

					<div class="grid_12  border-bottom">    
						<div class="grid_3" >
							<p class="space-text">Address :</p>
						</div><!--end grid_2 -label-->
						<div class="grid_5">
							<p class="profile-pos">
								<span id="address">
									<?=$address?>
								</span>
							</p>
						</div><!--end grid_5-Firstname -->
						<div class="grid_4">
							<span id="btn_save_4">
								<a onClick="editProfile('<?=$patient_id?>', '<?=$address?>', '4', 'address'); " href="#" data-role="button" data-inline="true" data-theme="b" >Edit</a>
							</span>
						</div><!--end grid_4-Edit -->
					</div><!--end-grid_12-wrapper -->   

					<div class="grid_12  border-bottom">    
						<div class="grid_3" >
							<p class="space-text">Telephone No. :</p>
						</div><!--end grid_2 -label-->
						<div class="grid_5">
							<p class="profile-pos">
								<span id="tel">
									<?=$tel?>
								</span>
							</p> 
						</div><!--end grid_5-Firstname -->
						<div class="grid_4">
							<span id="btn_save_5">
								<a onClick="editProfile('<?=$patient_id?>', '<?=$tel?>', '5', 'tel'); " href="#" data-role="button" data-inline="true" data-theme="b" >Edit</a>
							</span>
						</div><!--end grid_4-Edit -->
					</div><!--end-grid_12-wrapper -->
					<div class="grid_6">
						<a href="main-cranialNerve.php?new=1" rel="external" data-role="button" data-icon="arrow-r" data-iconpos="right" data-theme="a">New Cranial Nerves</a>
					</div>
					<div class="grid_6">
						<a href="neuro-observ.php?new=1" data-role="button" rel="external" data-icon="arrow-r" data-iconpos="right" data-theme="a">New Neurological Observation</a>
					</div>
<?php
					$sql = "
						SELECT `Mahidol_Rama_Medicine_Surg_s_latest_reports`.`time`, `Mahidol_Rama_Medicine_Surg_s_latest_reports`.`s_latest_reports_id`
						FROM 
							`Mahidol_Rama_Medicine_Surg_s_latest_reports`
						INNER JOIN 
							`Mahidol_Rama_Medicine_Surg_patient_CN` 
						WHERE 
							`Mahidol_Rama_Medicine_Surg_s_latest_reports`.`s_latest_reports_id` = `Mahidol_Rama_Medicine_Surg_patient_CN`.`order_id`
						AND 
							`Mahidol_Rama_Medicine_Surg_patient_CN`.`Patient_id` = '$patient'
						ORDER BY `Mahidol_Rama_Medicine_Surg_s_latest_reports`.`time` ASC
					";
					$result = mysql_query($sql);
					$numCN = mysql_num_rows($result);
					while($rs = mysql_fetch_array($result)){
						$lastTimeCN = $rs["time"];
						$orderCN_id = $rs["s_latest_reports_id"];
					}

					$sql = "
						SELECT `Mahidol_Rama_Medicine_Surg_yp_lastest_reports`.`time`, `Mahidol_Rama_Medicine_Surg_yp_lastest_reports`.`order_id`
						FROM  
							`Mahidol_Rama_Medicine_Surg_yp_lastest_reports`
						INNER JOIN 
							`Mahidol_Rama_Medicine_Surg_patient_YP` 
						WHERE 
							`Mahidol_Rama_Medicine_Surg_yp_lastest_reports`.`order_id` = `Mahidol_Rama_Medicine_Surg_patient_YP`.`order_id`
						AND 
							`Mahidol_Rama_Medicine_Surg_patient_YP`.`Patient_id` = '$patient'
						ORDER BY `Mahidol_Rama_Medicine_Surg_yp_lastest_reports`.`time` ASC
					";
					$result = mysql_query($sql);
					$numYP = mysql_num_rows($result);
					while($rs = mysql_fetch_array($result)){
						$lastTimeYp = $rs["time"];
						$orderYP_id = $rs["order_id"];
					}
?>
					<div class="grid_12 space-box space-height">
						<div class="grid_4 space-box title-color"></div>
						<div class="grid_4 space-box title-color"><p id="title-pos">Latest Update</p></div>
						<div class="grid_4 space-box title-color"></div>
					</div>

					<div class="grid_12">
<?php

?>
						<table id="myTable" class="tablesorter"> 
							<thead> 
								<tr> 
									<th>Type</th> 
									<th>Date</th> 
									<th>Time</th> 
									<th>Edit</th> 
									<th>View</th> 
									<th>History</th> 
								</tr> 
							</thead> 
							<tbody> 
<?php
								if($numCN != ""){
?>
									<tr> 
										<td>Cranial Nerve</td>
										<td><?=date("Y-m-d",(strtotime($lastTimeCN)))?></td>
										<td><?=date("H:i:s",(strtotime($lastTimeCN)))?></td>
										<td><a href="./main-cranialNerve.php?edit=1&id=<?=$orderCN_id?>" data-role="button" data-inline="true" data-theme="b" rel="external">Edit</a></td>
										<td><a href="./report.php?fn=cn&id=<?=$orderCN_id?>" data-role="button" data-inline="true" data-theme="b" rel="external">View</a></td>
										<td><a href="./history.php?fn=cn" data-role="button" data-inline="true" data-theme="b" rel="external">History</a></td>
									</tr> 
<?php
								}
								if($numYP != ""){
?>
									<tr> 
										<td>Neurological Observation</td> 
										<td><?=date("Y-m-d",(strtotime($lastTimeYp)))?></td> 
										<td><?=date("H:i:s",(strtotime($lastTimeYp)))?></td> 
										<td><a href="./neuro-observ.php?edit=1&id=<?=$orderYP_id?>" data-role="button" data-inline="true" data-theme="b" rel="external">Edit</a></td>
										<td>
											<a href="./report.php?fn=neuro&id=<?=$orderYP_id?>" data-role="button" data-inline="true" data-theme="b" rel="external">View</a>
											<a href="./graph/index.php?fn=neuro" data-role="button" data-inline="true" data-theme="b" rel="external">Graph</a>
										</td> 
										<td><a href="./history.php?fn=yp" data-role="button" data-inline="true" data-theme="b" rel="external">History</a></td> 
									</tr> 
<?php
								}
?>
							</tbody> 
						</table>  
					</div>       
						                                     
				</div><!--end content -->
			</div><!-- end page-->
<?php
			include("./include/user_bottom.php");
		} //end ( $_SESSION['patient'] != "" );
	} //end ( $_SESSION["doctor"] != "" );
?>                          

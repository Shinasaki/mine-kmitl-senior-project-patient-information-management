<?php

	$title_name = "Doctor Information";
	include("./include/user_head.php");

//	$_SESSION['doctor'] = "";
	if($_SESSION['doctor'] == ""){
		include("./include/login/login.php");
	}
	elseif($_SESSION['doctor'] != ""){

/*
		if($_GET["did"] != ""){
			$doctor = $_GET["did"];
		}
*/
		if(isset($_GET["did"])){
			$doctor = $_GET["did"];
		}
		$sql = "
			SELECT *
			FROM  `Mahidol_Rama_Medicine_Surg_doctor_profiles`
			WHERE `id` = '$doctor'
		";	
		$result = mysql_query($sql);
		$num=mysql_num_rows($result);
		while($rs = mysql_fetch_array($result)){
			$doctor_id = $rs["id"];
			$username = $rs["username"];
			$password = $rs["password"];
			$firstname = $rs["name"];
			$lastname = $rs["surname"];
			$address = $rs["address"];
			$tel = $rs["tel"];
		}
		$check = $_GET["check"];
		
		//########### admin ? #############
		$sql = "
			SELECT `admin`
			FROM  `Mahidol_Rama_Medicine_Surg_doctor_profiles`
			WHERE `id` = '".$_SESSION["doctor"]."'
			AND `admin` = '1'
		;";	//own user?
		$result = mysql_query($sql);
		$num = mysql_num_rows($result);
		if($rs = mysql_fetch_array($result) || $doctor == $_SESSION["doctor"] ){	//if admin == yes
?>
			<div data-role="page">
				<div data-role= "header" data-theme= "b">
					<div data-role="listview" data-type="horizontal" class="ui-btn-left">
						<a href="./doctor_list.php" data-role="button" data-icon="back">Back</a>
						<a href="index.php" data-role="button" data-icon="home" >Home</a>
					</div>
					<h1>Doctor Information</h1>
					<?php include("./include/user_head_right.php"); ?>
				</div><!--end header -->
				<div data-role="content" class="container_12">
					<div class="grid_12 space-box space-bottom">
						<div class="grid_4 space-box title-color"></div>
						<div class="grid_4 space-box title-color"><p id="title-pos">Profile</p></div>
						<div class="grid_4 space-box title-color"></div>
					</div>
				
	<?php			$sql = "
						SELECT `id`
						FROM  `Mahidol_Rama_Medicine_Surg_doctor_profiles`
						WHERE `id` = '".$_SESSION["doctor"]."'
					;";	//own user?
					$result = mysql_query($sql);
				//	$num = mysql_num_rows($result);
					if($rs = mysql_fetch_array($result)){
						if($rs["id"] == $doctor_id){
							$myself = 1;
						}
					}
					else{
						$myself = 0;
					}
				//	echo $myself;
	?>

					<?php ############################ Doctor ID ############################### ?>
					<div class="grid_12  border-bottom">    
						<div class="grid_3" >
							<p class="space-text">Doctor ID :</p>
						</div>
						<div class="grid_4">
							<p class="profile-pos-1">
								<span id="doctor_id">
									<?=$doctor_id?><br>&nbsp;
								</span>
							</p>
						</div>
						<div class="grid_5">
						
						</div><!--end grid_4-Edit -->
					</div><!--end-grid_12-wrapper -->  

					<?php ############################ Username ############################### ?>
					<div class="grid_12  border-bottom">    
						<div class="grid_3" >
							<p class="space-text">Username :</p>
						</div>
						<div class="grid_4">
							<p class="profile-pos-1">
								<span id="username">
									<?=$username?><br>&nbsp;
								</span>
							</p>
						</div>
						<div class="grid_5">

						</div><!--end grid_4-Edit -->
					</div><!--end-grid_12-wrapper -->  

					<?php ############################# Password ############################## ?>
					<div class="grid_12  border-bottom">    
						<div class="grid_3" >
							<p class="space-text">Password :</p>
						</div>
						<div class="grid_4">
							<p class="profile-pos-1">
								<span id="password">
									....<br>&nbsp;
								</span>
							</p>
						</div>
						<div class="grid_5" >
	<?php					if($myself == 1) {
	?>							<span id="btn_save_1">
									<a onClick="doctorEditProfile('<?=$doctor_id?>', '<?=$password?>', '1', 'password'); " href="#" data-role="button" data-inline="true" data-theme="b" >Edit</a>
									<?php if($check == "opw") { echo " <span style=\"color: orange ;\">Wrong old password</span>"; }
									elseif($check == "opc") { echo " <span style=\"color: orange ;\"> Password changed</span>"; } 
									elseif($check == "npw") { echo " <span style=\"color: orange ;\"> New passwords are not matched</span>"; } ?>
								</span>
	<?php					}
	?>					</div><!--end grid_4-Edit -->
					</div><!--end-grid_12-wrapper -->

					<?php ############################ Firstname ############################### ?>
					<div class="grid_12  border-bottom">
						<div class="grid_3" >
							<p class="space-text">First Name :</p>
						</div>
						<div class="grid_4">
							<p class="profile-pos-1">
								<span id="name">
									<?=$firstname?><br>&nbsp;
								</span>
							</p>
						</div>
						<div class="grid_5">
	<?php					if($myself == 1) {
	?>							<span id="btn_save_2">
									<a onClick="doctorEditProfile('<?=$doctor_id?>', '<?=$firstname?>', '2', 'name'); " href="#" data-role="button" data-inline="true" data-theme="b">Edit</a><?php //echo md5("name"); ?>
									<?php if($check == md5("name")) { echo " <span style=\"color: orange ;\">Firstname changed</span>"; } ?>
								</span>
	<?php					}
	?>					</div><!--end grid_4-Edit -->
					</div><!--end-grid_12-wrapper -->

					<?php ############################ Lastname ############################### ?>
					<div class="grid_12  border-bottom">    
						<div class="grid_3" >
							<p class="space-text">Last Name:</p>
						</div><!--end grid_2 -label-->
						<div class="grid_4">
							<p class="profile-pos-1">
								<span id="surname">
									<?=$lastname?><br>&nbsp;
								</span>
							</p>
						</div><!--end grid_5-Lastname -->
						<div class="grid_5">
	<?php					if($myself == 1) {
	?>							<span id="btn_save_3">
									<a onClick="doctorEditProfile('<?=$doctor_id?>', '<?=$lastname?>', '3', 'surname'); " href="#" data-role="button" data-inline="true" data-theme="b" >Edit</a>
									<?php if($check == md5("surname")) { echo " <span style=\"color: orange ;\">Lastname changed</span>"; } ?>
								</span>
	<?php					}
	?>					</div><!--end grid_4-Edit -->
					</div><!--end-grid_12-wrapper -->    

					<?php ############################# Address ############################## ?>
					<div class="grid_12  border-bottom">    
						<div class="grid_3" >
							<p class="space-text">Address :</p>
						</div>
						<div class="grid_4">
							<p class="profile-pos-1">
								<span id="address">
									<?=$address?><br>&nbsp;
								</span>
							</p>
						</div>
						<div class="grid_5">
	<?php					if($myself == 1) {
	?>							<span id="btn_save_4">
									<a onClick="doctorEditProfile('<?=$doctor_id?>', '<?=$address?>', '4', 'address'); " href="#" data-role="button" data-inline="true" data-theme="b" >Edit</a>
									<?php if($check == md5("address")) { echo " <span style=\"color: orange ;\">Address changed</span>"; } ?>
								</span>
	<?php					}
	?>					</div><!--end grid_4-Edit -->
					</div><!--end-grid_12-wrapper -->   

					<?php ############################# Tel ############################## ?>
					<div class="grid_12  border-bottom">    
						<div class="grid_3" >
							<p class="space-text">Telephone No. :</p>
						</div>
						<div class="grid_4">
							<p class="profile-pos-1">
								<span id="tel">
									<?=$tel?><br>&nbsp;
								</span>
							</p> 
						</div>
						<div class="grid_5">
	<?php					if($myself == 1) {
	?>							<span id="btn_save_5">
									<a onClick="doctorEditProfile('<?=$doctor_id?>', '<?=$tel?>', '5', 'tel'); " href="#" data-role="button" data-inline="true" data-theme="b" >Edit</a>
									<?php if($check == md5("tel")) { echo " <span style=\"color: orange ;\">Telephone changed</span>"; } ?>
								</span>
	<?php					}
	?>					</div><!--end grid_4-Edit -->
					</div><!--end-grid_12-wrapper -->
					<?php ########################################################### ?>
	 
							                                 
				</div><!--end content -->
			</div><!-- end page-->
<?php
		}	//end else if admin == yes
		else{	//if admin == no
?>
			<div data-role="page">
				<div data-role= "header" data-theme= "b">
					<div data-role="listview" data-type="horizontal" class="ui-btn-left">
						<a href="index.php" data-role="button" data-icon="home" >Home</a>	
					</div>

					<h1>Doctor Profile</h1>
			<?php	include("./include/user_head_right.php"); ?>
				</div><!--end header -->
				<div data-role="content" class="container_12">
					<div class="grid_12" style="text-align: center; ">
						Access Denied
						<div class="space-box"></div>
					</div>
				</div>
<?php		
		}	//end else if admin == no
		include("./include/user_bottom.php");

	} //end ( $_SESSION["doctor"] != "" );
?>                          

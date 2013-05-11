<?php
	$title_name = "Patient Information Management System";
	include("./include/user_head.php");

	if($_SESSION['doctor'] == ""){
		include("./include/login/login.php");
	}
	elseif($_SESSION['doctor'] != ""){
		$patient = $_SESSION["patient"];
?>
	<div data-role="page">
		<div data-role= "header" data-theme= "b">
			<div data-role="listview" data-type="horizontal" class="ui-btn-left">
<?php			$sql = "
					SELECT `admin`
					FROM  `Mahidol_Rama_Medicine_Surg_doctor_profiles`
					WHERE `id` = '".$_SESSION["doctor"]."'
					AND `admin` = '1'
				;";
				$result = mysql_query($sql);
				if($rs = mysql_fetch_array($result)){
					if($rs["admin"] == '1'){
?>						<a href="doctor_list.php" data-role="button" data-icon="admin" >Admin</a>
<?php				}
				}
?>		 	</div>
			<h1>Patient Information Management System</h1>
<?php		include("./include/user_head_right.php"); ?>
		</div><!--end header -->
		
		
		<div data-role="content" class="container_12">
			<div class="grid_12 space-box"></div>
		    <div class="grid_6">
				<a href="search-main.php" >
					<div class="space-4-100p ui-corner-all btn-index">
						<div class="img-pos">
							<img src="./images/search-icon_05.png" class="img-pos">
						</div>
					</div>
				</a>
			</div>
			<div class="grid_6">
				<a href="patient-form.php" rel="external">
					<div class="space-4-100p ui-corner-all btn-index ">
						<div class="img-pos">
							<img src="./images/patient-icon_10.png"  class="img-pos">
						</div>
					</div>
				</a>
			</div>
		  	
		    <div class="grid_12 text-index" >
                    <div class="grid_6 space-box text-pos-index">Search</div><!-- -->
               		<div class="grid_6 space-box text-pos-index">New Patient</div><!-- -->
   			</div>
					
		    
		<div class="grid_12 space-box"></div>
		<a href="main-cranialNerve.php?new=1" rel="external">
			<div class="grid_6">
				<div class="space-4-100p ui-corner-all btn-index">
					<div class="img-pos">
						<img src="./images/cranialNerve-icon_03.png" class="img-pos">
					</div>
				</div>
			</div>
		</a>
		<a href="neuro-observ.php" >
			<div class="grid_6">
				<div class="space-4-100p ui-corner-all btn-index ">
					<div class="img-pos">
						<img src="./images/neuro-icon_03.png" class="img-pos">
					</div>
				</div>
			</div>
		</a>
		<div class="grid_12 text-index" >
               <div class="grid_6 space-box text-pos-index ">Cranial Nerves</div>
               	<div class="grid_6 space-box text-pos-index">Neurological Observation</div>
   		</div>
	</div><!--end content -->
</div><!--end page -->

<?php
	include("./include/user_bottom.php");
	} //end ( $_SESSION["doctor"] != "" );
?>

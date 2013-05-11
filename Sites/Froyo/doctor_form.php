<?php
//	$title_name = "Neurological Observation";
	$title_name = "Add New Patient";
	include("./include/user_head.php");

	if($_SESSION['doctor'] == ""){
		include("./include/login/login.php");
	}
	elseif($_SESSION['doctor'] != ""){
?>
<!--script src="./include/js/jQueryMobile/jquery.form.js"></script-->

<style type="text/css">
	/* * { font-family: Verdana; font-size: 96%; }*/
	label { width: 10em; float: left; }
	label.error { float: none; color: red; padding-left: .5em; vertical-align: top; }
	p { clear: both; }
	.submit { margin-left: 12em; }
	/* em { font-weight: bold; padding-right: 1em; vertical-align: top; } */
</style>

<script src="./include/js/jQueryMobile/jquery.validate.js"></script>

<?php
		//########### admin ? #############
		$sql = "
			SELECT `admin`
			FROM  `Mahidol_Rama_Medicine_Surg_doctor_profiles`
			WHERE `id` = '".$_SESSION["doctor"]."'
			AND `admin` = '1'
		;";	//own user?
		$result = mysql_query($sql);
	//	$num = mysql_num_rows($result);
		if($rs = mysql_fetch_array($result)){	//if admin == yes
?>
<div data-role="page">
	<div data-role= "header" data-theme= "b">
		<div data-role="listview" data-type="horizontal" class="ui-btn-left">
			<a href="index.php" data-role="button" data-icon="home" >Home</a>
     	</div>

		<h1>Patient Information Management System in Hospital</h1>
		<?php include("./include/user_head_right.php"); ?>
	</div><!--end header -->
	<div data-role="content" class="container_12">
		<div class="grid_12 space-height"></div>
		<script src="./include/js/doctor_form.js" ></script>
		<form id="doctorForm" name="doctorForm" action="./doctor_process.php" method="POST" >
			<input type="hidden" name="fn" value="addNewDoctor">
			<!--label for="patientID">Patient ID</label>
			<input type="text" name="patientID" id="patientID" value="" />
			<div class="grid_12 space-height" ></div-->
			
			<label for="username">Username</label>
			<input type="text" name="username" id="username" value="" class="required" />
			<div class="grid_12 space-height" ></div>

			<label for="password1">Password</label>
			<input type="password" name="password1" id="password1" value="" class="required" />
			<div class="grid_12 space-height" ></div>

			<label for="password2">Retype Password</label>
			<input type="password" name="password2" id="password2" value="" class="required" />
			<div class="grid_12 space-height" ></div>

			<label for="firstName">First Name</label>
			<input type="text" name="firstName" id="firstName" value="" class="required" />
			<div class="grid_12 space-height" ></div>
				
			<label for="lastName">Last Name</label>
			<input type="text" name="lastName" id="lastName" value="" class="required" />
			<div class="grid_12 space-height" ></div>
			

			<fieldset data-role="controlgroup" data-type="horizontal">
				<legend>Gender</legend>
					<input type="radio" name="gender" id="radio-choice-1" value="M" />
					<label for="radio-choice-1">Male</label>
			
					<input type="radio" name="gender" id="radio-choice-2" value="F" />
					<label for="radio-choice-2">Female</label>
			</fieldset>
				
									
    		<fieldset data-role="controlgroup">
                <label for="b-day">Birthday</label>
				<div class="grid_12 space-height" ></div>
                <!--input type="text" name="date1" id="date1" class="mobiscroll" /-->
				<input type="text" name="date1" id="date1" class="required mobiscroll ui-input-text ui-body-c ui-corner-all ui-shadow-inset scroller" readonly="readonly" />
			</fieldset>
              
			<label for="address">Address</label>
			<input type="text" name="address" id="address" value="" class="required" />
			<div class="grid_12 space-height" ></div>
			
			<label for="telNo">Telephone No.</label>
			<input type="text" name="telNo" id="telNo" value="" class="required" />
			<div class="grid_12 space-height" ></div>

			<label for="email">E-mail</label>
			<input type="text" name="email" id="email" value="" class="required" />	

			<input name="" type="submit" value="Submit" data-theme="b" class="submit" /> 
		</form>

	</div><!--end content -->
</div><!--endpage -->  
		

<?php
		}	//end else if admin == yes
		else{	//if admin == no
?>
			<div data-role="page">
				<div data-role= "header" data-theme= "b">
					<div data-role="listview" data-type="horizontal" class="ui-btn-left">
						<a href="index.php" data-role="button" data-icon="home" >Home</a>	
					</div>

					<h1>Patient Information Management System in Hospital</h1>
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

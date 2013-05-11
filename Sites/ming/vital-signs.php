<?php

$title_name = "Vital Signs";
include("./include/user_head.php");

if($_SESSION['doctor'] == ""){

	include("./include/login/login.php");
}
elseif($_SESSION['doctor'] != ""){
	$patient = $_SESSION["patient"];
	if($patient == ""){
		header("location: ./search-main.php");
	}
	else{
		include("./include/user_YPsetTime.php");
		$yp_id = $_SESSION["yp_id"];
?>
		<form name="vitalSignsForm" action="./neuro-observ_proc.php" method="POST">
<?php
		$sql="
			SELECT * 
			FROM  `Mahidol_Rama_Medicine_Surg_yp_vital_signs`
			WHERE `Patient_id` = '$_SESSION[patient]'
			AND `order_id` = '$yp_id' 
		";
		$result = mysql_query($sql);
		$num=mysql_num_rows($result);
		if($rs = mysql_fetch_array($result)){
			$R_size = $rs["R_size"];
			$L_size = $rs["L_size"];
			$R_response = $rs["R_response"];
			$L_response = $rs["L_response"];
			$tempreture = $rs["tempreture"];
			$p_bp = $rs["p_bp"];
			$r = $rs["r"];
		}
		if($num != ""){
?>
			<input type="hidden" name="fn" value="vitalSigns_edit" />
<?php	}
		else{
?>
			<input type="hidden" name="fn" value="vitalSigns_addNew" />
<?php
		}
?>
			<input type="hidden" name="time" value="<?=$time?>" />
			<input type="hidden" name="location" id="vitalSigns_location" value="" />
			<div data-role = "page">
				<div data-role= "header" data-theme= "b">
					<div data-role="listview" data-type="horizontal" class="ui-btn-left">
						<a href="#" data-role="button" data-icon="back" onclick="vitalSignsForm_submit_back();">Back</a>
						<a href="#" data-role="button" data-icon="home" onclick="vitalSignsForm_submit_home();">Home</a>
					</div>
					<h1>Vital Signs</h1>
	<?php			include("./include/user_head_right.php"); ?>
		        </div><!--end header -->
            	<div data-role="content" class="container_12">
            		<div id="title-right-box"class="grid_5 alpha"><h1>Right</h1></div><!--end -->
					<div id="title-left-box" class="grid_5"><h1>Left</h1></div><!--end -->
					<div class="grid_12  space-top">
						<div class="grid_6">
							<div id="wrapper-right-eye">
								<img src="images/eye-right.png" width="121" height="69" alt="Right Eye">
							</div>
						</div><!--end wrapper-right eye -->    
						<div class="grid_6">
							<div id="wrapper-left-eye">
								<img src="images/eye-left.png" width="125" height="69" alt="Left Eye">
							</div>
						</div><!--end wrapper-left eye -->
						<div class="grid_12">
							<div class="grid_6">
	<div data-role="fieldcontain" class="slider-bar">
								<!--<label for="slider-1">Size: </label> -->
								<input type="range" name="R_size" id="slider2" value="<?=$R_size?>" min="1" max="8"  data-theme="a" data-track-theme="b"   />
							</div>
						</div><!--end slider left -->
						<div class="grid_6">                          
							<div data-role="fieldcontain" class="slider-bar">
								<!--<label for="slider-0">Size: </label>  -->
								<input type="range" name="L_size" id="slider2" value="<?=$L_size?>" min="1" max="8"  data-theme="a" data-track-theme="b"   />
							</div>
						</div><!--end slider left -->
					</div><!--end eye pupil -->
                    <div class="grid_6">
						<div data-role="fieldcontain"  class="slider-bar">
							<fieldset data-role="controlgroup"  data-type="horizontal">
								<!--<legend>Response :</legend>   --> 
								<input type="radio" name="R_response" id="R_response1" value="Good" <?php if($R_response == "Good"){ ?>checked="checked"<?php } ?> />
								<label for="R_response1">Good</label>

								<input type="radio" name="R_response" id="R_response2" value="Medium" <?php if($R_response == "Medium"){ ?>checked="checked"<?php } ?> />
								<label for="R_response2">Medium</label>

								<input type="radio" name="R_response" id="R_response3" value="Bad" <?php if($R_response == "Bad"){ ?>checked="checked"<?php } ?> />
								<label for="R_response3">Bad</label>
							</fieldset>
						</div>
					</div><!--end response right -->    
					<div class="grid_6">
						<div data-role="fieldcontain"  class="slider-bar">
							<fieldset data-role="controlgroup"  data-type="horizontal">
								<!--<legend>Response :</legend>   --> 
								<input type="radio" name="L_response" id="L_response1" value="Good" <?php if($L_response == "Good"){ ?>checked="checked"<?php } ?> />
								<label for="L_response1">Good</label>
								<input type="radio" name="L_response" id="L_response2" value="Medium" <?php if($L_response == "Medium"){ ?>checked="checked"<?php } ?> />
								<label for="L_response2">Medium</label>
								<input type="radio" name="L_response" id="L_response3" value="Bad" <?php if($L_response == "Bad"){ ?>checked="checked"<?php } ?> />
								<label for="L_response3">Bad</label>
							</fieldset>
						</div>
					</div><!--end response left -->    
					<div class="grid_12 margin-btm"><h1 id="title-right-box-full-2">Temperature</h1></div><!--end -->                                        
					<div class="grid_12">
						<div data-role="fieldcontain" >
							<!--<label for="slider-1">Size: </label> -->
							<input type="range" name="tempreture" id="tempreture" value="<?=$tempreture?>" min="0" max="100"  data-theme="a" data-track-theme="b" />
						</div><!--end slide Temperature -->
					</div>

					<div class="grid_12 margin-btm"><h1  id="title-right-box-full-2">P.BP</h1></div><!--end --> 
					<div class="grid_12">
						<div data-role="fieldcontain" >
							<!--<label for="slider-1">Size: </label> -->
							<input type="range" name="p_bp" id="p_bp" value="<?=$p_bp?>" min="0" max="100"  data-theme="a" data-track-theme="b" />
						</div><!--end slide P.BP -->
					</div>
                             
					<div class="grid_12 margin-btm"><h1  id="title-right-box-full-2">Respiratory</h1></div><!--end --> 
					<div class="grid_12">
						<div data-role="fieldcontain" >
							<!--<label for="slider-1">Size: </label> -->
							<input type="range" name="r" id="r" value="<?=$r?>" min="0" max="100"  data-theme="a" data-track-theme="b" />
						</div><!--end slide R-->                               
					</div>
				</div><!--end content -->
			</div><!--end page -->
		</form>
<?php
		include("./include/user_bottom.php");
	} //end ( $_SESSION['patient'] != "" );
} //end ( $_SESSION["doctor"] != "" );
?>

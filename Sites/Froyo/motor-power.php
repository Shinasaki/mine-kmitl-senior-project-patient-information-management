<?php
$title_name = "Motor power";
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
		<form name="motorPowerForm" action="./neuro-observ_proc.php" method="POST">
			<input type="hidden" name="time" value="<?=$time?>" />
			<input type="hidden" name="location" value="" />
			<div data-role = "page">
				<div data-role= "header" data-theme= "b">
					<div data-role="listview" data-type="horizontal" class="ui-btn-left">
						<a href="#" data-role="button" data-icon="back" onclick="motorPower_submit('back');">Back</a>
						<a href="#" data-role="button" data-icon="home" onclick="motorPower_submit('home');">Home</a>
		         	</div>
	   	 		 <h1>Motor power</h1>
<?php			include("./include/user_head_right.php"); ?>
		    	</div><!--end header -->

<?php			$sql="
					SELECT `arm_fracture`, `leg_fracture`
					FROM  `Mahidol_Rama_Medicine_Surg_yp_motor_power` 
					WHERE `Patient_id` = '$patient'
					AND `order_id` = '$yp_id'
				";
				$result = mysql_query($sql);
				$num=mysql_num_rows($result);
				if($rs = mysql_fetch_array($result)){
					$arm = $rs["arm_fracture"];
					$leg = $rs["leg_fracture"];
				}
				if($num == "1"){
?>					<input type="hidden" name="fn" value="motorPower_edit">
<?php			}
				else{
?>					<input type="hidden" name="fn" value="motorPower_addNew">
<?php			}
?>
		        <div data-role="content" class="container_12">
		    		<div class="grid_12">
						<div id="wrapper-arm">
							<img src="images/arm-mp.png" width="200" height="245" alt="arm">
						</div>
					</div><!--pic -->
		            <div class="grid_12">
		        		<div class="padding-choice-center">	
		                	<fieldset data-role="controlgroup"  data-type="horizontal" >
								<!-- <legend>Choose a symptom:</legend> -->
								<input type="radio" name="arm_fracture" id="arm_fracture1" value="Good" <?php if($arm == "Good"){ ?>checked="checked"<?php } ?>/>
								<label for="arm_fracture1">Good</label>    
                                      
								<input type="radio" name="arm_fracture" id="arm_fracture2" value="Weak" <?php if($arm == "Weak"){ ?>checked="checked"<?php } ?> />
								<label for="arm_fracture2">Weak</label>

								<input type="radio" name="arm_fracture" id="arm_fracture3" value="Weak more" <?php if($arm == "Weak more"){ ?>checked="checked"<?php } ?> />
								<label for="arm_fracture3">Weak more</label>

								<input type="radio" name="arm_fracture" id="arm_fracture4" value="Ab. flexion" <?php if($arm == "Ab. flexion"){ ?>checked="checked"<?php } ?> />
								<label for="arm_fracture4">Ab. flexion</label>

								<input type="radio" name="arm_fracture" id="arm_fracture5" value="Ab. extension" <?php if($arm == "Ab. extension"){ ?>checked="checked"<?php } ?> />
								<label for="arm_fracture5">Ab. extension</label>

								<input type="radio" name="arm_fracture" id="arm_fracture6" value="No movement" <?php if($arm == "No movement"){ ?>checked="checked"<?php } ?> />
								<label for="arm_fracture6">No movement</label>

		             		</fieldset>
		        		</div>
					</div><!--end choice -->
					<div class="grid_12 space-height"></div>
					<div class="grid_12">
						<div id="wrapper-leg">
							<img src="images/leg-mp.png" width="200" height="245" alt="leg">
						</div>
					</div><!--pic -->
					<div class="grid_12">
						<div class="padding-choice-center">	
							<fieldset data-role="controlgroup"  data-type="horizontal" >
								<!-- <legend>Choose a symptom:</legend> -->
								<input type="radio" name="leg_fracture" id="leg_fracture1" value="Good" <?php if($leg == "Good"){ ?>checked="checked"<?php } ?>/>
								<label for="leg_fracture1">Good</label>          
                                
								<input type="radio" name="leg_fracture" id="leg_fracture2" value="Weak" <?php if($leg == "Weak"){ ?>checked="checked"<?php } ?> />
								<label for="leg_fracture2">Weak</label>

								<input type="radio" name="leg_fracture" id="leg_fracture3" value="Weak more" <?php if($leg == "Weak more"){ ?>checked="checked"<?php } ?> />
								<label for="leg_fracture3">Weak more</label>

								<input type="radio" name="leg_fracture" id="leg_fracture4" value="Ab. extension" <?php if($leg == "Ab. extension"){ ?>checked="checked"<?php } ?> />
								<label for="leg_fracture4">Ab. extension</label>

								<input type="radio" name="leg_fracture" id="leg_fracture5" value="No movement" <?php if($leg == "No movement"){ ?>checked="checked"<?php } ?> />
								<label for="leg_fracture5">No movement</label>

					 		</fieldset>
						</div>
					</div><!--end choice -->
				</div><!--end content -->
			</div><!--end page -->
		</form>
<?php
		include("./include/user_bottom.php");
	} //end ( $_SESSION['patient'] != "" );
} //end ( $_SESSION["doctor"] != "" );
?>

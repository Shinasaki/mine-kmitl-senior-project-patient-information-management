<?php
	$title_name = "CN7: Facial (Brackman Scale)";
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
			include("./include/user_CNsetTime.php");
			$s_latest_reports_id = $_SESSION["s_latest_reports_id"];

	//###########################################

	$sql="
	SELECT *
	FROM `Mahidol_Rama_Medicine_Surg_cn_7`
	WHERE `Patient_id` = '$_SESSION[patient]'
	AND `s_latest_reports_id` = '$s_latest_reports_id'
	";

	//when `CN_id` is `patient_id` in the future...
	$result = mysql_query($sql);
	$num = mysql_num_rows($result);
	$R_HB = "";
	$L_HB = "";
	$chkR=1;
	$chkL=1;
	while($rs = mysql_fetch_array($result)){
		$R_HB = $rs["R_HB"];
		$L_HB = $rs["L_HB"];
	}
echo $R_HB;
?>


	<div data-role="page">
		<div data-role= "header" data-theme= "b">
			<div data-role="listview" data-type="horizontal" class="ui-btn-left">
				<a href="#" data-role="button" data-icon="back" onclick="CN7_submit_back();">Back</a>
				<a href="#" data-role="button" data-icon="home" onclick="CN7_submit_home();">Home</a>	
         	</div>

	 		<h1>CN7: Facial (Brackman Scale)</h1>
<?php		include("./include/user_head_right.php"); ?>
		</div><!--end header -->
		<div data-role="content" class="container_12">
			<div class="grid_12 margin-btm"><h1  id="title-right-box-full-2">Facial (Brackman Scale)</h1></div><!--end -->  
			<div id="title-right-box"class="grid_5 "><h1>Right</h1></div><!--end -->  
		    <div id="title-left-box" class="grid_5"><h1>Left</h1></div><!--end -->
		        
		    <div class="grid_6">
				 <div class="padding-choice-right-1">
					<fieldset data-role="controlgroup" data-type="vertical" >
						<div id="CN7zoneRU">
		                <!--<legend>Choose a symptom:</legend> -->
<?php					if($R_HB == "normal1" || $R_HB == "normal2" || $R_HB == "normal3"){
?>			                <input type="radio" name="eyeR" id="eyeR1" value="choice-1" checked="checked" disabled="disabled"/>
				            <label for="eyeR1">Can closed the eye</label>
				            <input type="radio" name="eyeR" id="eyeR2" value="choice-2" disabled="disabled"/>
				            <label for="eyeR2">Can not closed the eye</label>
<?php					}
						elseif($R_HB == "normal4" || $R_HB == "normal5" || $R_HB == "normal6"){
?>	
		                	<input type="radio" name="eyeR" id="eyeR1" value="choice-1" disabled="disabled"/>
				            <label for="eyeR1">Can closed the eye</label>
				            <input type="radio" name="eyeR" id="eyeR2" value="choice-2" checked="checked" disabled="disabled"/>
				            <label for="eyeR2">Can not closed the eye</label>
<?php					}
						else{
?>			                <input type="radio" name="eyeR" id="eyeR1" value="choice-1" disabled="disabled"/>
				            <label for="eyeR1">Can closed the eye</label>   
				            <input type="radio" name="eyeR" id="eyeR2" value="choice-2" disabled="disabled"/>
				            <label for="eyeR2">Can not closed the eye</label>
<?php					}
?>						</div>
					</fieldset>
				</div>
			</div>
			<div class="grid_6">
				<div class="padding-choice-left-1">
					<fieldset data-role="controlgroup" data-type="vertical" >
						<div id="CN7zoneLU">
		            	<!--<legend>Choose a symptom:</legend> -->
<?php					if($L_HB == "normal1" || $L_HB == "normal2" || $L_HB == "normal3"){
?>							<input type="radio" name="eyeL" id="eyeL1" value="choice-1" checked="checked" disabled="disabled"/>
							<label for="eyeL1">Can closed the eye</label>                             
							<input type="radio" name="eyeL" id="eyeL2" value="choice-2" disabled="disabled"/>
							<label for="eyeL2">Can not closed the eye</label>
<?php					}
						elseif($L_HB == "normal4" || $L_HB == "normal5" || $L_HB == "normal6"){
?>							<input type="radio" name="eyeL" id="eyeL1" value="choice-1" disabled="disabled" />
							<label for="eyeL1">Can closed the eye</label>                           
							<input type="radio" name="eyeL" id="eyeL2" value="choice-2" checked="checked" disabled="disabled"/>
							<label for="eyeL2">Can not closed the eye</label>
<?php					}
						else{
?>							<input type="radio" name="eyeL" id="eyeL1" value="choice-1" disabled="disabled"/>
							<label for="eyeL1">Can closed the eye</label>                             
							<input type="radio" name="eyeL" id="eyeL2" value="choice-2" disabled="disabled"/>
							<label for="eyeL2">Can not closed the eye</label>
<?php					}
?>					</div>
					</fieldset>
				</div>                
			</div>               
			<form name="CN7Form" action="cn1-smelling_proc.php" method="POST">     
<?php			if($R_HB != ""){	
?>					<input type="hidden" name="fn" value="CN7_edit">
<?php			}
				elseif($R_HB == ""){	
?>					<input type="hidden" name="fn" value="CN7_addNew">
<?php			}
?>				<input type="hidden" name="location" value="">
				<span id="CN7zoneRD">
					<!--div class="grid_6" data-type="horizontal" style="">
						<fieldset data-role="controlgroup" >
							<input type="button" name="choiceL" id="selectFirst" value="Select upper First"  />
						</fieldset>
					</div-->
					<div class="grid_6" >
						<fieldset data-role="controlgroup" data-type="Vertical" class="ui-corner-all ui-controlgroup ui-controlgroup-vertical">
<?php						if($R_HB == "normal1"){
?>								<input type="radio" name="choiceR" id="choice1R" value="normal1" onclick="CN7zoneRU('1');" checked="checked"/>
								<label for="choice1R">Good</label>
<?php						}
							else{
?>								<input type="radio" name="choiceR" id="choice1R" value="normal1" onclick="CN7zoneRU('1');"/>
								<label for="choice1R">Good</label>
<?php						}
							if($R_HB == "normal2"){
?>								<input type="radio" name="choiceR" id="choice2R" value="normal2" onclick="CN7zoneRU('1');" checked="checked"/>
								<label for="choice2R">Weak Less</label>
<?php						}
							else{
?>								<input type="radio" name="choiceR" id="choice2R" value="normal2" onclick="CN7zoneRU('1');" />
								<label for="choice2R">Weak Less</label>
<?php						}
							if($R_HB == "normal3"){
?>								<input type="radio" name="choiceR" id="choice3R" value="normal3" onclick="CN7zoneRU('1');" checked="checked"/>
								<label for="choice3R">Weak More</label>
<?php						}
							else{
?>								<input type="radio" name="choiceR" id="choice3R" value="normal3" onclick="CN7zoneRU('1');" />
								<label for="choice3R">Weak More</label>
<?php						}
							if($R_HB == "normal4"){
?>								<input type="radio" name="choiceR" id="choice4R" value="normal4" onclick="CN7zoneRU('2');" />
								<label for="choice4R">Can not closed the eye</label>
<?php						}
							else{
?>								<input type="radio" name="choiceR" id="choice4R" value="normal4" onclick="CN7zoneRU('2');" />
								<label for="choice4R">Can not closed the eye</label>
<?php						}
?>							<input type="radio" name="choiceR" id="choice5R" value="normal5" onclick="CN7zoneRU('2');" <?php if($R_HB == "normal5") echo "checked=\"checked\""; ?>/>
							<label for="choice5R">Almost no movement</label>

							<input type="radio" name="choiceR" id="choice6R" value="normal6" onclick="CN7zoneRU('2');" <?php if($R_HB == "normal6") echo "checked=\"checked\""; ?>/>
							<label for="choice6R">No movement</label>
						</fieldset>
					</div>
				</span>
				<div id="CN7zoneLD">
					<div class="grid_6" style="">
						<!--fieldset data-role="controlgroup" >
							<input type="button" name="choiceL" id="selectFirst" value="Select upper First"  />
						</fieldset-->
						<fieldset data-role="controlgroup" >
							<input type="radio" name="choiceL" id="choice1L" value="normal1" onclick="CN7zoneLU('1'); " <?php if($L_HB == "normal1") echo "checked=\"checked\""; ?>/>
							<label for="choice1L">Good</label>

							<input type="radio" name="choiceL" id="choice2L" value="normal2" onclick="CN7zoneLU('1'); " <?php if($L_HB == "normal2") echo "checked=\"checked\""; ?>/>
							<label for="choice2L">Weak Less</label>

							<input type="radio" name="choiceL" id="choice3L" value="normal3" onclick="CN7zoneLU('1'); " <?php if($L_HB == "normal3") echo "checked=\"checked\""; ?>/>
							<label for="choice3L">Weak More</label>

							<input type="radio" name="choiceL" id="choice4L" value="normal4" onclick="CN7zoneLU('2'); " <?php if($L_HB == "normal4") echo "checked=\"checked\""; ?>/>
							<label for="choice4L">Can not closed the eye</label>

							<input type="radio" name="choiceL" id="choice5L" value="normal5" onclick="CN7zoneLU('2'); " <?php if($L_HB == "normal5") echo "checked=\"checked\""; ?>/>
							<label for="choice5L">Almost no movement</label>

							<input type="radio" name="choiceL" id="choice6L" value="normal6" onclick="CN7zoneLU('2'); " <?php if($L_HB == "normal6") echo "checked=\"checked\""; ?>/>
							<label for="choice6L">No movement</label>
						</fieldset>
					</div>
				</div>
			</form>
		</div><!--end content -->
	</div><!--end page -->



<?php
			include("./include/user_bottom.php");
		} //end ( $_SESSION['patient'] != "" );
	} //end ( $_SESSION["doctor"] != "" );
?>

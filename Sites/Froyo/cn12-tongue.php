<?php
	$title_name = "CN12: Tongue";
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
?>
	<div data-role="page">
		<div data-role= "header" data-theme= "b">
			<div data-role="listview" data-type="horizontal" class="ui-btn-left">
				<a href="#" data-role="button" data-icon="back" onclick="CN12_submit('back'); ">Back</a>
				<a href="#" data-role="button" data-icon="home" onclick="CN12_submit('home'); ">Home</a>	
			</div>
			<h1>CN12: Tongue</h1>
<?php		include("./include/user_head_right.php"); ?>
		</div><!--end header -->
		<div data-role="content" class="container_12">
			<div id="title-right-box"class="grid_5 alpha"><h1>Right</h1></div><!--end -->  
			<div id="title-left-box" class="grid_5"><h1>Left</h1></div><!--end -->
			<div class="grid_6">
				<div id="wrapper-tongue-right">
<?php				$sql = "
						SELECT `R_tongue`
						FROM `Mahidol_Rama_Medicine_Surg_cn_12`
						WHERE `Patient_id` = '$_SESSION[patient]'
						AND `s_latest_reports_id` = '$s_latest_reports_id'
					";
					$result = mysql_query($sql);
					if($rs = mysql_fetch_array($result)){
						if($rs["R_tongue"] == "Good"){
?>							<img src="images/cn12-normal.png" alt="Tongue">
<?php					}
						elseif($rs["R_tongue"] == "Atrophy"){
?>							<img src="images/cn12-atrophy.png" alt="Tongue">
<?php					}
					}
					else{
?>						<img src="images/tongue_blank.png" alt="Tongue">
<?php				}
?>
				</div>
			</div><!--end wrapper-tongue-right -->    
			<div class="grid_6">
				<div id="wrapper-tongue-left">
<?php				$sql = "
						SELECT `L_tongue`
						FROM `Mahidol_Rama_Medicine_Surg_cn_12`
						WHERE `Patient_id` = '$_SESSION[patient]'
						AND `s_latest_reports_id` = '$s_latest_reports_id'
					";
					$result = mysql_query($sql);
					if($rs = mysql_fetch_array($result)){
						if($rs["L_tongue"] == "Good"){
?>							<img src="images/cn12-normal.png" alt="Tongue">
<?php					}
						elseif($rs["L_tongue"] == "Atrophy"){
?>							<img src="images/cn12-atrophy.png" alt="Tongue">
<?php					}
					}
					else{
?>						<img src="images/tongue_blank.png" alt="Tongue">
<?php				}
?>
				</div>
			</div><!--end wrapper-tongue-left -->  

			<div class="grid_12 space-height" >

<?php			$sql="
				SELECT *
				FROM `Mahidol_Rama_Medicine_Surg_cn_12`
				WHERE `Patient_id` = '$_SESSION[patient]'
				AND `s_latest_reports_id` = '$s_latest_reports_id'
				";

				//when `CN_id` is `patient_id` in the future...

				$result = mysql_query($sql);
				$num=mysql_num_rows($result);
				if($rs = mysql_fetch_array($result)){
					if($num == 1) { //edit
?>	                    <form name="CN12formEdit" id="CN12form" action="cn1-smelling_proc.php" method="POST">
							<input type="hidden" name="fn" value="CN12_edit" />
							<input type="hidden" name="location" id="location" value="" />
<?php						if($rs[R_tongue] == "Good"){
?>								
								<div class="grid_6">
									<div class="padding-choice-right">
										<fieldset data-role="controlgroup" data-type="horizontal" >
											<!--<legend>Choose a symptom:</legend> -->
<?php										/*
											<input type="radio" name="sliderR" id="radio-choice-1" value="Good" onclick="check_rightTongue(1); document.forms['CN12formEdit'].submit();" checked="checked" />
											<label for="radio-choice-1">Good</label>                 
											<input type="radio" name="sliderR" id="radio-choice-2" value="Atrophy" onclick="check_rightTongue(2); document.forms['CN12formEdit'].submit();" />
											<label for="radio-choice-2">Atrophy</label>
											*/
?>
											<input type="radio" name="sliderR" id="radio-choice-1" value="Good" onclick="check_rightTongue(1); " checked="checked" />
											<label for="radio-choice-1">Good</label>                 
											<input type="radio" name="sliderR" id="radio-choice-2" value="Atrophy" onclick="check_rightTongue(2); " />
											<label for="radio-choice-2">Atrophy</label>
										</fieldset>
									</div>
								</div>
<?php						}
							elseif($rs[R_tongue] == "Atrophy"){
?>								
								<div class="grid_6">
									<div class="padding-choice-right">
										<fieldset data-role="controlgroup" data-type="horizontal" >
											<!--<legend>Choose a symptom:</legend> -->
<?php										/*
											<input type="radio" name="sliderR" id="radio-choice-1" value="Good" onclick="check_rightTongue(1); document.forms['CN12formEdit'].submit();" />

											<label for="radio-choice-1">Good</label>                 
											<input type="radio" name="sliderR" id="radio-choice-2" value="Atrophy" onclick="check_rightTongue(2); document.forms['CN12formEdit'].submit();" checked="checked"/>
											<label for="radio-choice-2">Atrophy</label>
											*/
?>
											<input type="radio" name="sliderR" id="radio-choice-1" value="Good" onclick="check_rightTongue(1); "/>

											<label for="radio-choice-1">Good</label>                 
											<input type="radio" name="sliderR" id="radio-choice-2" value="Atrophy" onclick="check_rightTongue(2); " checked="checked"/>
											<label for="radio-choice-2">Atrophy</label>
										</fieldset>
									</div>
								</div>
<?php						}
							if($rs[L_tongue] == "Good"){
?>								
								<div class="grid_6">
									<div class="padding-choice-left">
										<fieldset data-role="controlgroup" data-type="horizontal" >
											<!--<legend>Choose a symptom:</legend> -->
<?php										/*
											<input type="radio" name="sliderL" id="radio-choice-1" value="Good" onclick="check_leftTongue(1); document.forms['CN12formEdit'].submit();" checked="checked" />
											<label for="radio-choice-1">Good</label>                 
											<input type="radio" name="sliderL" id="radio-choice-2" value="Atrophy" onclick="check_leftTongue(2); document.forms['CN12formEdit'].submit();" />
											<label for="radio-choice-2">Atrophy</label>
											*/
?>
											<input type="radio" name="sliderL" id="radio-choice-1" value="Good" onclick="check_leftTongue(1); " checked="checked" />
											<label for="radio-choice-1">Good</label>                 
											<input type="radio" name="sliderL" id="radio-choice-2" value="Atrophy" onclick="check_leftTongue(2); " />
											<label for="radio-choice-2">Atrophy</label>											
										</fieldset>
									</div>
								</div>
<?php						}
							elseif($rs[L_tongue] == "Atrophy"){
?>								
								<div class="grid_6">
									<div class="padding-choice-left">
										<fieldset data-role="controlgroup" data-type="horizontal" >
											<!--<legend>Choose a symptom:</legend> -->
<?php										/*
											<input type="radio" name="sliderL" id="radio-choice-1" value="Good" onclick="check_leftTongue(1); document.forms['CN12formEdit'].submit();" />
											<label for="radio-choice-1">Good</label>                 
											<input type="radio" name="sliderL" id="radio-choice-2" value="Atrophy" onclick="check_leftTongue(2); document.forms['CN12formEdit'].submit();" checked="checked" />
											<label for="radio-choice-2">Atrophy</label>
											*/
?>
											<input type="radio" name="sliderL" id="radio-choice-1" value="Good" onclick="check_leftTongue(1); " />
											<label for="radio-choice-1">Good</label>                 
											<input type="radio" name="sliderL" id="radio-choice-2" value="Atrophy" onclick="check_leftTongue(2); " checked="checked" />
											<label for="radio-choice-2">Atrophy</label>
										</fieldset>
									</div>
								</div>
<?php						}
?>						</form>
<?php				}
				}
				elseif($num != 1) //add new
				{
?>				    <form name="CN12formNew" id="CN12form" action="cn1-smelling_proc.php" method="POST">
						<input type="hidden" name="fn" id="fn_id" value="CN12_addNew" />
						<input type="hidden" name="location" id="location" value="" />
						<div class="grid_6">
							<div class="padding-choice-right">
								<fieldset data-role="controlgroup" data-type="horizontal" >
									<!--<legend>Choose a symptom:</legend> -->
									<input type="radio" name="sliderR" id="R_tongue_Good" value="Good" onclick="check_rightTongue(1); " />
									<label for="R_tongue_Good">Good</label>
									<input type="radio" name="sliderR" id="R_tongue_Atrophy" value="Atrophy" onclick="check_rightTongue(2); " />
									<label for="R_tongue_Atrophy">Atrophy</label>
								</fieldset>
							</div>
						</div>

						<div class="grid_6">
							<div class="padding-choice-left">
								<fieldset data-role="controlgroup" data-type="horizontal" >
									<!--<legend>Choose a symptom:</legend> -->
									<input type="radio" name="sliderL" id="L_tongue_Good" value="Good" onclick="check_leftTongue(1); " />
									<label for="L_tongue_Good">Good</label>                 
									<input type="radio" name="sliderL" id="L_tongue_Atrophy" value="Atrophy" onclick="check_leftTongue(2); " />
									<label for="L_tongue_Atrophy">Atrophy</label>
								</fieldset>
							</div>
						</div>

	                </form>
<?php			}
							
?>
                </div><!--end content -->
			</div><!--end page -->
<?php
			include("./include/user_bottom.php");
		} //end ( $_SESSION['patient'] != "" );
	} //end ( $_SESSION["doctor"] != "" );
?>

<?php
	$title_name = "CN1: Smelling";
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
						<a href="./main-cranialNerve.php" data-role="button" data-icon="back" >Back</a>
						<a href="./index.php" data-role="button" data-icon="home" >Home</a>	
					</div>
					<h1>CN1: Smelling
<?php
//echo $s_latest_reports_id;
//echo $_SESSION["s_latest_reports_id"];
/*echo	$sql="
		SELECT `s_latest_reports_id`
		FROM `Mahidol_Rama_Medicine_Surg_s_latest_reports`
		WHERE `time` = '$time'
	";
*/
?>
</h1>
<?php			include("./include/user_head_right.php"); ?>
            	</div><!--end header -->
                
                <div data-role="content" class="container_12">
                 		<div id="title-right-box"class="grid_5"><h1>Right</h1></div><!--end -->
                        <div id="title-left-box" class="grid_5"><h1>Left</h1></div><!--end -->
                <div class="grid_6">
                            <div id="wrapper-nose-right">
<?php							$sqlR = "
									SELECT `R_smelling`
									FROM `Mahidol_Rama_Medicine_Surg_cn_1`
									WHERE `Patient_id` = '$_SESSION[patient]'
									AND `s_latest_reports_id` = '$s_latest_reports_id'
								";
								$resultR = mysql_query($sqlR);
								$numR=mysql_num_rows($resultR);
								if($rs = mysql_fetch_array($resultR)){
									if($rs[R_smelling] == "Good" ){
?>										<img src="images/cn1-good.png">
<?php								}
									elseif($rs[R_smelling] == "Anosmia" ){
?>										<img src="images/cn1-anosmia.png">
<?php								}
								}
								if($numR == ""){
?>									<img src="images/nose-blank.png"  alt="Nose">
<?php							}
?>							</div>
                </div><!--end  wrapper-nose-right-->

				<div class="grid_6">
					<div  id="wrapper-nose-left" >
<?php							$sqlL = "
									SELECT `L_smelling`
									FROM `Mahidol_Rama_Medicine_Surg_cn_1`
									WHERE `Patient_id` = '$_SESSION[patient]'
									AND `s_latest_reports_id` = '$s_latest_reports_id'
								";
								$resultL = mysql_query($sqlL);
								$numL=mysql_num_rows($resultL);
								if($rs = mysql_fetch_array($resultL)){
									if($rs[L_smelling] == "Good" ){
?>										<img src="images/cn1-good.png">
<?php								}
									elseif($rs[L_smelling] == "Anosmia" ){
?>										<img src="images/cn1-anosmia.png">
<?php								}
								}
								if($numL == ""){
?>									<img src="images/nose-blank.png"  alt="Nose">
<?php							}
?>					</div>
				</div>

				<form name="hidden">
					<input type="hidden" name="R_good" />
					<input type="hidden" name="R_anosmio" />
					<input type="hidden" name="L_good" />
					<input type="hidden" name="L_anosmio" />
				</form>

				<div id="smelling-choice-right" class="grid_6">
					<div class="padding-choice-right">
						<fieldset data-role="controlgroup" data-type="horizontal" >
                                    	<!--<legend>Select symptom :</legend> -->
										<form name="CN1Rform" action="cn1-smelling_proc.php" method="POST" >
<?php										$sql="
											SELECT *
											FROM `Mahidol_Rama_Medicine_Surg_cn_1`
											WHERE `Patient_id` = '$_SESSION[patient]'
											AND `s_latest_reports_id` = '$s_latest_reports_id'
											";

											//when `CN_id` is `patient_id` in the future...

											$result = mysql_query($sql);
											$num=mysql_num_rows($result);
											$imageR="";
											while($rs = mysql_fetch_array($result)){
												if($num == 1) //edit
												{
													if($rs[R_smelling] == "Good"){
?>                                               		<input type="radio" name="smellingRight" id="smelling-R-choice-1" value="choice-1" checked="checked" onclick="document.forms['CN1Rform'].submit(); "/>
                                                	    	<label for="smelling-R-choice-1">Good</label>
                                              			<input type="radio" name="smellingRight" id="smelling-R-choice-2" value="choice-2" onclick="document.forms['CN1Rform'].submit(); " />
                                                    		<label for="smelling-R-choice-2">Anosmia</label>
<?php													$imageR = "good";
													}
													elseif($rs[R_smelling] == "Anosmia"){
?>														<input type="radio" name="smellingRight" id="smelling-R-choice-1" value="choice-1" onclick="document.forms['CN1Rform'].submit(); " />
                                                	    	<label for="smelling-R-choice-1">Good</label>
                                               			<input type="radio" name="smellingRight" id="smelling-R-choice-2" value="choice-2" checked="checked" onclick="document.forms['CN1Rform'].submit(); "/>
                                                    		<label for="smelling-R-choice-2">Anosmia</label>
<?php													$imageR = "anosmio";
													}
?>															<input type="hidden" name="fn" value="CN1_edit_R">
<?php											}
											}//############## end select ############
?>										</form>
<?php									if($num != 1){	//add
?>											<form name="CN1RformNew" id="CN1Rform_new" action="cn1-smelling.php" method="POST">
                                         		<input type="radio" name="smellingRight" id="smelling-R-choice-1" value="choice-1" onclick="CN1_add(); check_rightNose(1); " />
                                            		<label for="smelling-R-choice-1">Good</label>
                                           		<input type="radio" name="smellingRight" id="smelling-R-choice-2" value="choice-2" onclick="CN1_add(); check_rightNose(2); " />	
                                                	<label for="smelling-R-choice-2">Anosmia</label>
											<input type="hidden" name="fn" id="fn_id" value="CN1_addNew">
                                        	  	<input type="hidden" name="smellingLeft" value="" />
											</form>
											<?php	// <input type="button" value="send new." onclick="CN1_add()"> 
													// for check click button before code the js	?>
<?php									}
?>										<script>
											//CN1_test();
											//for check value
										</script>
							</fieldset>
						</div>                
					</div>
                         
					<div id="smelling-choice-left" class="grid_6">
						<div class="padding-choice-left">
							<fieldset data-role="controlgroup" data-type="horizontal" >
<?php											//	if(){
?>													<form id="CN1Lform" name="CN1Lform" action="cn1-smelling_proc.php" method="POST" >
                                                    <?php // <legend>Select symptom :</legend> ?>
<?php													//select button1
														$sql="
														SELECT *
														FROM `Mahidol_Rama_Medicine_Surg_cn_1`
														WHERE `patient_id` = '$_SESSION[patient]'

														AND `s_latest_reports_id` = '$s_latest_reports_id'
														";
														$result = mysql_query($sql);
														$num=mysql_num_rows($result);
														$imageL = "";
														while($rs = mysql_fetch_array($result)){
															if($num == 1)
															{
																if($rs[L_smelling] == "Good"){
?>						                                            <input type="radio" name="smellingLeft" id="smelling-L-choice-1" value="choice-1" checked="checked" onclick="document.forms['CN1Lform'].submit();"/>
						                                                <label for="smelling-L-choice-1">Good</label>
						                                            <input type="radio" name="smellingLeft" id="smelling-L-choice-2" value="choice-2" onclick="document.forms['CN1Lform'].submit();" />
						                                                <label for="smelling-L-choice-2">Anosmia</label>
<?php																$imageL = "good";
																}
																elseif($rs[L_smelling] == "Anosmia"){
?>						                                            <input type="radio" name="smellingLeft" id="smelling-L-choice-1" value="choice-1" onclick="document.forms['CN1Lform'].submit();" />
						                                                <label for="smelling-L-choice-1">Good</label>
						                                            <input type="radio" name="smellingLeft" id="smelling-L-choice-2" value="choice-2" checked="checked" onclick="document.forms['CN1Lform'].submit();" />
						                                                <label for="smelling-L-choice-2">Anosmia</label>
<?php																$imageL = "anosmio";
																}
?>																<input type="hidden" name="fn" value="CN1_edit_L">
<?php															
															}
														}//end while select

?>													</form>
													<form name="CN1LformNew" action="cn1-smelling.php" method="POST"><?// onsubmit="CN1_add(this);"?>
<?php													if($num != 1){
?>                                                      	<input type="radio" name="smellingLeft" id="smelling-L-choice-1" value="choice-1" onclick="CN1_add(); check_leftNose(1);" />
				                                                <label for="smelling-L-choice-1">Good</label>
				                                            <input type="radio" name="smellingLeft" id="smelling-L-choice-2" value="choice-2" onclick="CN1_add(); check_leftNose(1);" />
				                                                <label for="smelling-L-choice-2">Anosmia</label>
															<input type="hidden" name="fn" value="CN1_addNew">
<?php														// some problem when submit first add "smelling"	
															// now OK ==> 2012-01-07	?>
<?php													}
?>													</form>
							</fieldset>
						</div>
					</div>
<?php				/*
					if($imageR == "good"){
?>						<script>
						//	check_rightNose('1');
						$(document).ready(function() {
							check_rightNose("1");
						});
						</script>
<?php				}
					elseif($imageR == "anosmio"){
?>						<script>
						//	check_rightNose('1');
						$(document).ready(function() {
							check_rightNose("2");
						});
						</script>
<?php				}
					if($imageL == "good"){
?>						<script>
						//	check_leftNose('1');
						$(document).ready(function() {
							check_leftNose("1");
						});
						</script>
<?php				}
					elseif($imageL == "anosmio"){
?>						<script>
						//	check_leftNose('1');
						$(document).ready(function() {
							check_leftNose("2");
						});
						</script>
<?php				}
					*/
?>
					
                 
                      
				</div><!--end content -->

			</div><!--end page -->
			
<?php
/*
<div id="test">
</div>
<a href="#" onclick="test()">aaaaa</a>
<=$title_name?>
*/
?>

<?php
			include("./include/user_bottom.php");
		} //end ( $_SESSION['patient'] != "" );
	} //end ( $_SESSION["doctor"] != "" );
?>

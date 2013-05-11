<?php
	$title_name = "CN8: Hearing";
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
//##############

?>
		<div data-role="page">
        	<div data-role= "header" data-theme= "b">
			<div data-role="listview" data-type="
			" class="ui-btn-left">
				<a href="main-cranialNerve.php" data-role="button" data-icon="back" rel="external">Back</a>
				<a href="index.php" data-role="button" data-icon="home" rel="external" >Home</a>
		 	</div>
			<h1>CN8: Hearing</h1>
<?php		include("./include/user_head_right.php"); ?>




			</div><!--end header -->
			<div data-role="content" class="container_12">
					<div id="title-right-box"class="grid_5"><h1>Right</h1></div><!--end -->  
                    <div id="title-left-box" class="grid_5"><h1>Left</h1></div><!--end -->
				<div class="grid_6">   
					<div id="wrapper-ear-right" >
<?php					$sql = "
							SELECT `R_hearing`
							FROM `Mahidol_Rama_Medicine_Surg_cn_8`
							WHERE `Patient_id` = '$_SESSION[patient]'
							AND `s_latest_reports_id` = '$s_latest_reports_id'
						";
						$result = mysql_query($sql);
						if($rs = mysql_fetch_array($result)){
							if($rs["R_hearing"] == "Good"){
?>								<img src="images/cn8-good-r.png" >
<?php						}
							elseif($rs["R_hearing"] == "Serviceable"){
?>								<img src="images/cn8-serviceable-r.png" >
<?php						}
							elseif($rs["R_hearing"] == "Non-Serviceable"){
?>								<img src="images/cn8-non-serviceable-r.png" >
<?php						}
						}
						else{
?>							<img src="images/hearing-blank-r.png" >
<?php					}
?>					</div>
				</div><!--end wrapper-ear-right -->
				<div class="grid_6">
					<div id="wrapper-ear-left" >
<?php					$sql = "
							SELECT `L_hearing`
							FROM `Mahidol_Rama_Medicine_Surg_cn_8`
							WHERE `Patient_id` = '$_SESSION[patient]'
							AND `s_latest_reports_id` = '$s_latest_reports_id'
						";
						$result = mysql_query($sql);
						if($rs = mysql_fetch_array($result)){
							if($rs["L_hearing"] == "Good"){
?>								<img src="images/cn8-good-l.png" >
<?php						}
							elseif($rs["L_hearing"] == "Serviceable"){
?>								<img src="images/cn8-serviceable-l.png" >
<?php						}
							elseif($rs["L_hearing"] == "Non-Serviceable"){
?>								<img src="images/cn8-non-serviceable-l.png" >
<?php						}
						}
						else{
?>							<img src="images/hearing-blank-l.png" >
<?php					}
?>						
					</div>
				</div><!--end wrapper-ear-left -->

                        <form name="CN8form" action="cn1-smelling_proc.php" method="POST">
<?php						$sql="
							SELECT *
							FROM `Mahidol_Rama_Medicine_Surg_cn_8`
							WHERE `Patient_id` = '$_SESSION[patient]'
							AND `s_latest_reports_id` = '$s_latest_reports_id'
							";
							$result = mysql_query($sql);
							$num=mysql_num_rows($result);
							while($rs = mysql_fetch_array($result)){
								if($num == 1) //edit
								{
?>								<input type="hidden" name="fn" id="fn_id" value="CN8_edit">
			                	  <div class="grid_6">
									<div id="hearing-choice-right">
						            	<fieldset data-role="controlgroup" data-type="vertical" class="padding-choice">
						                    <!--<legend>Choose a symptom:</legend> -->
<?php											if($rs[R_hearing] == "Good"){
?>													
							                        <input type="radio" name="radio-choice-R" id="radio-choice-R-1" value="Good" checked="checked" onclick="document.forms['CN8form'].submit();"/>
<?php											}else{
?>							                        <input type="radio" name="radio-choice-R" id="radio-choice-R-1" value="Good" onclick="document.forms['CN8form'].submit();"/>
<?php											}
?>						                        <label for="radio-choice-R-1">Good</label>

<?php											if($rs[R_hearing] == "Serviceable"){
?>													
													<input type="radio" name="radio-choice-R" id="radio-choice-R-2" value="Serviceable" checked="checked" onclick="document.forms['CN8form'].submit();"/>
<?php											}else{
?>							                        <input type="radio" name="radio-choice-R" id="radio-choice-R-2" value="Serviceable" onclick="document.forms['CN8form'].submit();"/>
<?php											}
?>						                        <label for="radio-choice-R-2">Serviceable</label>

<?php											if($rs[R_hearing] == "Non-Serviceable"){
?>													
							                        <input type="radio" name="radio-choice-R" id="radio-choice-R-3" value="Non-Serviceable" checked="checked" onclick="document.forms['CN8form'].submit();"/>
<?php											}else{
?>							                        <input type="radio" name="radio-choice-R" id="radio-choice-R-3" value="Non-Serviceable" onclick="document.forms['CN8form'].submit();"/>
<?php											}
?>						                        <label for="radio-choice-R-3">Non-Serviceable</label>
						                
						                     </fieldset>
									</div><!--end slider right -->
								  </div>
						            
									<div class="grid_6">
									  <div id="hearing-choice-right">
						            	<fieldset data-role="controlgroup" data-type="vertical" class="padding-choice">
											<!--<legend>Choose a symptom:</legend> -->
<?php										if($rs[L_hearing] == "Good"){
?>												
				    	                        <input type="radio" name="radio-choice-L" id="radio-choice-L-1" value="Good" checked="checked" onclick="document.forms['CN8form'].submit();"/>
<?php										}else{
?>											<input type="radio" name="radio-choice-L" id="radio-choice-L-1" value="Good" onclick="document.forms['CN8form'].submit();"/>
<?php										}
?>				                            <label for="radio-choice-L-1">Good</label>

<?php										if($rs[L_hearing] == "Serviceable"){
?>												
					                            <input type="radio" name="radio-choice-L" id="radio-choice-L-2" value="Serviceable" checked="checked" onclick="document.forms['CN8form'].submit();"/>
<?php										}else{
?>					                            <input type="radio" name="radio-choice-L" id="radio-choice-L-2" value="Serviceable" onclick="document.forms['CN8form'].submit();" />
<?php										}
?>				                            <label for="radio-choice-L-2">Serviceable</label>
				                    
<?php										if($rs[L_hearing] == "Non-Serviceable"){
?>												
					                            <input type="radio" name="radio-choice-L" id="radio-choice-L-3" value="Non-Serviceable" checked="checked" onclick="document.forms['CN8form'].submit();"/>
<?php										}else{
?>					                            <input type="radio" name="radio-choice-L" id="radio-choice-L-3" value="Non-Serviceable" onclick="document.forms['CN8form'].submit();"/>
<?php										}
?>				                            <label for="radio-choice-L-3">Non-Serviceable</label>
										</fieldset>
						            </div><!--end slider left -->
								  </div>
<?php							}
							} //end while
?>						</form>
				                    
<?php                   if($num != 1){ //add new
?>                      	<form name="CN8formNew" id="CN8formNew" action="cn1-smelling_proc.php" method="POST" >
								<input type="hidden" name="fn" id="fn_id" value="CN8_addNew" />
								<div id="" class="grid_6">
								  <div id="hearing-choice-right">
					            	<fieldset data-role="controlgroup" data-type="vertical" class="padding-choice">
										<!--<legend>Choose a symptom:</legend> -->
			                            <input type="radio" name="radio-choice-R" id="radio-choice-R-1" value="Good" onclick="CN8_add(); check_rightEar(1);"/>
			                            <label for="radio-choice-R-1">Good</label>
			                    
			                            <input type="radio" name="radio-choice-R" id="radio-choice-R-2" value="Serviceable" onclick="CN8_add(); check_rightEar(2);" />
			                            <label for="radio-choice-R-2">Serviceable</label>
			                    
			                            <input type="radio" name="radio-choice-R" id="radio-choice-R-3" value="Non-Serviceable" onclick="CN8_add(); check_rightEar(3);" />
			                            <label for="radio-choice-R-3">Non-Serviceable</label>
									</fieldset>
					              </div><!--end slider left -->
								</div>
								<div id="" class="grid_6">
								  <div id="hearing-choice-left">
					            	<fieldset data-role="controlgroup" data-type="vertical" class="padding-choice">
										<!--<legend>Choose a symptom:</legend> -->
			                            <input type="radio" name="radio-choice-L" id="radio-choice-L-1" value="Good" onclick="CN8_add(); check_leftEar(1)"/>
			                            	<label for="radio-choice-L-1">Good</label>
			                    
			                            <input type="radio" name="radio-choice-L" id="radio-choice-L-2" value="Serviceable" onclick="CN8_add(); check_leftEar(2); " />
			                            	<label for="radio-choice-L-2">Serviceable</label>
			                    
			                            <input type="radio" name="radio-choice-L" id="radio-choice-L-3" value="Non-Serviceable" onclick="CN8_add(); check_leftEar(3);" />
			                            	<label for="radio-choice-L-3">Non-Serviceable</label>
									</fieldset>
					              </div><!--end slider left -->                        
								</div>
	                		</form>
<?php					}
?>
                
				</div><!--end content-->

		</div><!--end page -->


<?php
			include("./include/user_bottom.php");
		} //end ( $_SESSION['patient'] != "" );
	} //end ( $_SESSION["doctor"] != "" );
?>

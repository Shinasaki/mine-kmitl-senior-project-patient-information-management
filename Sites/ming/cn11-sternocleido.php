<?php
	$title_name = "CN11: Sternocleidomasloid";
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
					<a href="#" data-role="button" data-icon="back" onclick="CN11_submit('back'); " >Back</a>
					<a href="#" data-role="button" data-icon="home" onclick="CN11_submit('home'); " >Home</a>
				</div>
				<h1>CN11: Sternocleidomastoid</h1>
<?php			include("./include/user_head_right.php"); ?>
				</div><!--end header -->
				<div data-role="content" class="container_12">
                	<div id="wrapper-sternovleido" class="grid_12">
	<?php				$sql = "
							SELECT `sternocleidomastoid`
							FROM `Mahidol_Rama_Medicine_Surg_cn_11`

							WHERE `Patient_id` = '$_SESSION[patient]'
							AND `s_latest_reports_id` = '$s_latest_reports_id'
						";
						$result = mysql_query($sql);
						if($rs = mysql_fetch_array($result)){
							if($rs["sternocleidomastoid"] == "Good"){
	?>							<img src="images/cn11-good.png" alt="Tongue">
	<?php					}
							elseif($rs["sternocleidomastoid"] == "weak"){
	?>							<img src="images/cn11-weak.png" alt="Tongue">
	<?php					}
						}
						else{
	?>						<img src="images/face_blank.png">
	<?php				}
	?>
                    </div>
                 
					<div class="grid_12 space-height">
						<div class="grid_4 ">
							<div class="space-box"></div>
						</div>
						<div class="grid_8 ">
							<div class="space-box padding-center-4">
								<fieldset data-role="controlgroup"  data-type="horizontal" >
					    		    <form name="CN11form" action="cn1-smelling_proc.php" method="POST">
										<input type="hidden" name="location" value="" />
			                        	<!-- <legend>Choose a symptom:</legend> -->
					<?php				$sql=
										"SELECT *
										FROM `Mahidol_Rama_Medicine_Surg_cn_11`
										WHERE `Patient_id` = '$_SESSION[patient]'
										AND `s_latest_reports_id` = '$s_latest_reports_id'
										";

										//when `CN_id` is `patient_id` in the future...

										$result = mysql_query($sql);
										$num=mysql_num_rows($result);
										while($rs = mysql_fetch_array($result)){
											if($num == 1) { //edit
?>											<input type="hidden" name="fn" value="CN11_edit">
<?php											if($rs[sternocleidomastoid] == "good"){
?>													
			                                        <input type="radio" name="radio-choice" id="radio-choice-R" value="Good" checked="checked" onclick="CN11_check_sterno(1);" />
				                                    <label for="radio-choice-R">Good</label>
				                            
				                                    <input type="radio" name="radio-choice" id="radio-choice-L" value="Weak" onclick="CN11_check_sterno(2);" />
				                                    <label for="radio-choice-L">Weak</label>
<?php											}
												elseif($rs[sternocleidomastoid] == "weak"){
?>			                                        <input type="radio" name="radio-choice" id="radio-choice-R" value="Good" onclick="CN11_check_sterno(1);" />
				                                    <label for="radio-choice-R">Good</label>
				                            
				                                    <input type="radio" name="radio-choice" id="radio-choice-L" value="Weak" checked="checked" onclick="CN11_check_sterno(2);" />
				                                    <label for="radio-choice-L">Weak</label>
<?php											}
											}
										}
										if($num != 1){
?>											<input type="hidden" name="fn" value="CN11_addNew">
											<input type="radio" name="radio-choice" id="radio-choice-R" value="Good" onclick="CN11_check_sterno(1)"/>
					                            <label for="radio-choice-R">Good</label>
				                            <input type="radio" name="radio-choice" id="radio-choice-L" value="Weak" onclick="CN11_check_sterno(2)"/>
					                            <label for="radio-choice-L">Weak</label>
<?php									}
?>									</form>
		                 		</fieldset>
	            			</div>
						</div>
						<div class="grid_4"><div class="space-box"></div></div>
			        </div><!--end slider right -->


                 </div><!--end content -->       
           </div><!--end page -->
                
<?php
			include("./include/user_bottom.php");
		} //end ( $_SESSION['patient'] != "" );
	} //end ( $_SESSION["doctor"] != "" );
?>

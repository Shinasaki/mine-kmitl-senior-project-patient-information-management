<?php
	$title_name = "CN5: Sensory and Motor Mastication";
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
			<form name="CN5Form" id="CN5Form" action="cn1-smelling_proc.php" method="POST">
				<input type="hidden" name="location" id="locationPath" value="">
				<div data-role="page">
					<div data-role= "header" data-theme= "b">
						<div data-role="listview" data-type="horizontal" class="ui-btn-left">
							<a href="#" data-role="button" data-icon="back" onclick="CN5_submit_back(); ">Back</a>
							<a href="#" data-role="button" data-icon="home" onclick="CN5_submit_home(); ">Home</a>	
                     	</div>

						<h1>CN5: Sensory and Motor Mastication</h1>
<?php					include("./include/user_head_right.php"); ?>
					</div><!--end header -->
					<div data-role="content" class="container_12">
	             		<div class="grid_5 margin-btm margin-right-title"><h1  id="title-right-box-full">Sensory</h1></div><!--end -->
	                    <div class="grid_5 margin-btm"><h1  id="title-right-box-full">Motor Mastication</h1></div><!--end -->
	                    <div class="grid_12">
	           				<div class="grid_6">
<?php
								$sql="SELECT ";
								for($i=1; $i<=3; $i++){
									$sql .= "`sensory_".$i."R` , `sensory_".$i."L` ";
									if($i != 3)
										$sql .= ", ";
								}
								$sql .=	"FROM `Mahidol_Rama_Medicine_Surg_cn_5`
									WHERE `Patient_id` = '{$_SESSION["patient"]}'
									AND `s_latest_reports_id` = '$s_latest_reports_id' ;
								";
								//echo $sql;

								$result = mysql_query($sql);
								$num=mysql_num_rows($result);
								if($rs = mysql_fetch_array($result)){
									for($i = 1; $i <= 3; $i++){
										$sensoryR[$i] = $rs["sensory_".$i."R"];
										$sensoryL[$i] = $rs["sensory_".$i."L"];
									}
								}
								elseif($num == 0){
									for($i = 1; $i <= 3; $i++){
										$sensoryR[$i] = 0;
										$sensoryL[$i] = 0;
									}
								}

//								$sensoryR['1'] = 1;
								for($i = 1; $i <= 3; $i++)
								{
?>
									<input type="hidden" id="CN5_sensoryR<?=$i?>" name="CN5_sensoryR<?=$i?>" value="<?=$sensoryR[$i]?>" />
									<input type="hidden" id="CN5_sensoryL<?=$i?>" name="CN5_sensoryL<?=$i?>" value="<?=$sensoryL[$i]?>" />
<?php
								}
?>			
                    			<div id="wrapper-sensory">
		                    		<div id="wrapper-face-upper">
										<span id="CN5_sensory_R1"><?php
											?><a href="#" onclick="CN5_sensory('sensoryR1', '<?=$sensoryR[1]?>'); "><img src="images/cn5-v1-r<?php if($sensoryR['1'] == 0) echo '-blank'; ?>.png"></a><?php
										?></span><?php
										?><span id="CN5_sensory_L1"><?php
											?><a href="#" onclick="CN5_sensory('sensoryL1', '<?=$sensoryL[1]?>'); "><img src="images/cn5-v1-l<?php if($sensoryL['1'] == 0) echo '-blank'; ?>.png" ></a>
										</span><?php
		                            ?></div>	
		                            <div id="wrapper-face-middle">
										<span id="CN5_sensory_R2"><?php
											?><a href="#" onclick="CN5_sensory('sensoryR2', '<?=$sensoryR[2]?>'); "><img src="images/cn5-v2-r<?php if($sensoryR['2'] == 0) echo '-blank'; ?>.png"></a><?php
										?></span><?php
										?><span id="CN5_sensory_L2"><?php
											?><a href="#" onclick="CN5_sensory('sensoryL2', '<?=$sensoryL[2]?>'); "><img src="images/cn5-v2-l<?php if($sensoryL['2'] == 0) echo '-blank'; ?>.png"></a><?php
										?></span>
		                           	</div><?php
		                          	?><div id="wrapper-face-lower"><?php
										?><span id="CN5_sensory_R3"><?php
											?><a href="#" onclick="CN5_sensory('sensoryR3', '<?=$sensoryR[3]?>'); "><img src="images/cn5-v3-r<?php if($sensoryR['3'] == 0) echo '-blank'; ?>.png"></a><?php
										?></span><?php
										?><span id="CN5_sensory_L3"><?php
											?><a href="#" onclick="CN5_sensory('sensoryL3', '<?=$sensoryL[3]?>'); "><img src="images/cn5-v3-l<?php if($sensoryL['3'] == 0) echo '-blank'; ?>.png"></a>
										</span>
		                           	</div>
								</div>

							</div><!--end sensory -->

<?php					$sql="
						SELECT `R_motor`, `L_motor`
						FROM `Mahidol_Rama_Medicine_Surg_cn_5`
						WHERE `Patient_id` = '$_SESSION[patient]'
						AND `s_latest_reports_id` = '$s_latest_reports_id'
						";

						//when `CN_id` is `patient_id` in the future...

						$result = mysql_query($sql);
						$num=mysql_num_rows($result);
						if($rs = mysql_fetch_array($result)){
/*						
							if($num == 0) //update
							{
*/							

?>								<input type="hidden" name="fn" value="CN5_edit">
				              	<div class="grid_6">
				                	<div id="" class="grid_4"><div class="space-box"></div></div><!--end -->  
									<div id="center-title-2" class="grid_4"><div><h1>Right</h1></div></div><!--end -->  
				                    <div id="" class="grid_4"><div class="space-box"></div></div><!--end -->  
				                </div>
<?php							if($rs[R_motor] == "good"){
?>						            <div class="grid_6">
						 				<div class="padding-choice-right">
						                    <fieldset data-role="controlgroup" data-type="horizontal" >
						                        <!--<legend>Choose a symptom:</legend> -->
						                            <input type="radio" name="sliderR" id="radio-choice-1" value="good" checked="checked" />
						                            <label for="radio-choice-1">Good</label>
						                    
						                            <input type="radio" name="sliderR" id="radio-choice-2" value="weak"  />
						                            <label for="radio-choice-2">Weak</label>
						                   </fieldset>
										</div>                
						      		</div><!--end slider right -->
<?php							}
								elseif($rs[R_motor] == "weak"){
?>						            <div class="grid_6">
						 				<div class="padding-choice-right">
						                    <fieldset data-role="controlgroup" data-type="horizontal" >
						                        <!--<legend>Choose a symptom:</legend> -->
						                            <input type="radio" name="sliderR" id="radio-choice-1" value="good"  />
						                            <label for="radio-choice-1">Good</label>
						                    
						                            <input type="radio" name="sliderR" id="radio-choice-2" value="weak" checked="checked" />
						                            <label for="radio-choice-2">Weak</label>
						                   </fieldset>
										</div>                
						      		</div><!--end slider right -->
<?php							}
								elseif($rs["R_motor"] == "")
								{
?>								
									<input type="hidden" name="fn" value="CN5_addNew">
								    <div class="grid_6">
						 				<div class="padding-choice-right">
								            <fieldset data-role="controlgroup" data-type="horizontal" >
								                <!--<legend>Choose a symptom:</legend> -->
								                    <input type="radio" name="sliderR" id="radio-choice-1" value="good"  />
								                    <label for="radio-choice-1">Good</label>
								            
								                    <input type="radio" name="sliderR" id="radio-choice-2" value="weak"  />
								                    <label for="radio-choice-2">Weak</label>
								           </fieldset>
										</div>                
							  		</div><!--end slider right -->
<?php				  			
								}	
	
?>								<div class="grid_6">
				                	<div id="" class="grid_4"><div class="space-box"></div></div><!--end -->  
									<div id="center-title-2" class="grid_4"><div><h1>Left</h1></div></div><!--end -->  
				                    <div id="" class="grid_4"><div class="space-box"></div></div><!--end -->  
				                </div>
<?php							if($rs[L_motor] == "good"){
?>									<div class="grid_6">
								        <div class="padding-choice-right">
								            <fieldset data-role="controlgroup" data-type="horizontal" >
								                <!--<legend>Choose a symptom:</legend> -->
								                    <input type="radio" name="sliderL" id="radio-choice-1" value="good" checked="checked" />
								                    <label for="radio-choice-1">Good</label>
								            
								                    <input type="radio" name="sliderL" id="radio-choice-2" value="weak"  />
								                    <label for="radio-choice-2">Weak</label>
								             </fieldset>
						                </div>
						  			</div><!--end slider left-->

<?php							}
								elseif($rs[L_motor] == "weak"){
?>									<div class="grid_6">
									    <div class="padding-choice-right">
									        <fieldset data-role="controlgroup" data-type="horizontal" >
									            <!--<legend>Choose a symptom:</legend> -->
									                <input type="radio" name="sliderL" id="radio-choice-1" value="good"  />
									                <label for="radio-choice-1">Good</label>
									        
									                <input type="radio" name="sliderL" id="radio-choice-2" value="weak" checked="checked" />
									                <label for="radio-choice-2">Weak</label>
									         </fieldset>
							            </div>
						  			</div><!--end slider left-->
<?php							}
								elseif($rs["L_motor"] == "") //when no data for L motor
								{
?>								
									<input type="hidden" name="fn" value="CN5_addNew">
									<div class="grid_6">
										<div class="padding-choice-right">
										    <fieldset data-role="controlgroup" data-type="horizontal" >
										        <!--<legend>Choose a symptom:</legend> -->
										            <input type="radio" name="sliderL" id="radio-choice-1" value="good" />
										            <label for="radio-choice-1">Good</label>
										    
										            <input type="radio" name="sliderL" id="radio-choice-2" value="weak"  />
										            <label for="radio-choice-2">Weak</label>
										     </fieldset>
								        </div>
						  			</div><!--end slider left-->
<?php				  			
								}
//							}
						}
						elseif($num == "") { //no value, add new
?>							<input type="hidden" name="fn" value="CN5_addNew">
			              	<div class="grid_6">
			                	<div id="" class="grid_4"><div class="space-box"></div></div><!--end -->  
								<div id="center-title-2" class="grid_4"><div><h1>Right</h1></div></div><!--end -->  
			                    <div id="" class="grid_4"><div class="space-box"></div></div><!--end -->  
			                </div>
				            <div class="grid_6">
				 				<div class="padding-choice-right">
				                    <fieldset data-role="controlgroup" data-type="horizontal" >
				                        <!--<legend>Choose a symptom:</legend> -->
				                            <input type="radio" name="sliderR" id="radio-choice-1" value="good"  />
				                            <label for="radio-choice-1">Good</label>
				                    
				                            <input type="radio" name="sliderR" id="radio-choice-2" value="weak"  />
				                            <label for="radio-choice-2">Weak</label>
				                   </fieldset>
								</div>                
				      		</div><!--end slider right -->
		                    <div class="grid_6">
		                    	<div id="" class="grid_4"><div class="space-box"></div></div><!--end -->  
								<div id="center-title-2" class="grid_4"><div><h1>Left</h1></div></div><!--end -->  
		                        <div id="" class="grid_4"><div class="space-box"></div></div><!--end -->  
		                    </div>
							<div class="grid_6">
						        <div class="padding-choice-right">
						            <fieldset data-role="controlgroup" data-type="horizontal" >
						                <!--<legend>Choose a symptom:</legend> -->
						                    <input type="radio" name="sliderL" id="radio-choice-1" value="good" />
						                    <label for="radio-choice-1">Good</label>
						            
						                    <input type="radio" name="sliderL" id="radio-choice-2" value="weak"  />
						                    <label for="radio-choice-2">Weak</label>
						             </fieldset>
				                </div>
				  			</div><!--end slider left-->
<?php					}
?>               </div><!--end content -->
                </div><!--end page -->
			</form>
<?php
			include("./include/user_bottom.php");
		} //end ( $_SESSION['patient'] != "" );
	} //end ( $_SESSION["doctor"] != "" );
?>

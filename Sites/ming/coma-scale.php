<?php
	$title_name = "Coma Scale";
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
		<form name="comaScaleForm" action="./neuro-observ_proc.php" method="POST">
			<input type="text" name="time" value="<?=$time?>" />
			<input type="hidden" name="location" value="" />
			<div data-role="page">
        		<div data-role= "header" data-theme= "b">
					<div data-role="listview" data-type="horizontal" class="ui-btn-left">
						<a href="#" data-role="button" data-icon="back" onclick="comaScale_submit('back');">Back</a>
						<a href="#" data-role="button" data-icon="home" onclick="comaScale_submit('home');">Home</a>
                	</div>
           	 		<h1>Coma Scale</h1>
<?php				include("./include/user_head_right.php"); ?>
            	</div><!--end header -->

<?php			$sql="
					SELECT * 
					FROM  `Mahidol_Rama_Medicine_Surg_yp_coma_scale` 
					WHERE `Patient_id` = '$patient'
					AND `order_id` = '$yp_id' 
				";
				$result = mysql_query($sql);
				$num=mysql_num_rows($result);
				if($rs = mysql_fetch_array($result)){
					$cv = $rs["c_value"];
					$tv = $rs["t_value"];
					$mmv = $rs["mm_value"];
				}
				if($num == "1"){
?>					<input type="hidden" name="fn" value="comaScale_edit">
<?php			}
				else{
?>					<input type="hidden" name="fn" value="comaScale_addNew">
<?php			}
?>
				<div data-role="content" class="container_12">
					<div id="wrapper-eye-full" class="grid_12">
						<div id="eye-wrapper-box">
							<img src="images/eye-cm.png" alt="Eye">
						</div>
					</div>
					<div class="grid_12"></div>
					<div class="grid_12">	
                            	<div data-role="fieldcontain" class="padding-choice-cm">
							
                                    <fieldset data-role="controlgroup" data-type="horizontal">
                                    	<!--<legend>Choose a pet:</legend>  -->
                                        <input type="radio" name="c_value" id="c_value1" value="0" <?php if($cv == "0"){ ?>checked="checked"<?php } ?> />
                                        <label for="c_value1">No response</label>
                            
                                        <input type="radio" name="c_value" id="c_value2" value="1" <?php if($cv == "1"){ ?>checked="checked"<?php } ?>/>
                                        <label for="c_value2">Open when hurt</label>
                            
                                        <input type="radio" name="c_value" id="c_value3" value="2" <?php if($cv == "2"){ ?>checked="checked"<?php } ?> />
                                        <label for="c_value3">Open when heard</label>
                            
                                        <input type="radio" name="c_value" id="c_value4" value="3" <?php if($cv == "3"){ ?>checked="checked"<?php } ?> />
                                        <label for="c_value4">Good</label>
                                    </fieldset>
                                </div><!--end choice -->
                             </div><!--end grid_12 -->  
                           <div class="grid_12">
                           	<div id="lip-wrapper">
                           <img src="images/lip-cm.png"alt="Lip">
                           </div>
                           
                           
                           </div><!--end lip -->
                           
                           <div class="grid_12">
                        		<div data-role="fieldcontain"  class="padding-choice-cm-2">
                                    <fieldset data-role="controlgroup" data-type="horizontal">
                                    	<!--<legend>Choose a pet:</legend>  -->
                                        <input type="radio" name="t_value" id="t_value1" value="0"<?php if($tv == "0"){ ?>checked="checked"<?php } ?> />
                                        <label for="t_value1">No response</label>
                            
                                        <input type="radio" name="t_value" id="t_value2" value="1"<?php if($tv == "1"){ ?>checked="checked"<?php } ?>  />
                                        <label for="t_value2">Weak</label>
                            
                                        <input type="radio" name="t_value" id="t_value3" value="2"<?php if($tv == "2"){ ?>checked="checked"<?php } ?>  />
                                        <label for="t_value3">A few words</label>
                            
                                        <input type="radio" name="t_value" id="t_value4" value="3"<?php if($tv == "3"){ ?>checked="checked"<?php } ?>  />
                                        <label for="t_value4">Fair</label>

                                        <input type="radio" name="t_value" id="t_value5" value="4"<?php if($tv == "3"){ ?>checked="checked"<?php } ?>  />
                                        <label for="t_value5">Good</label>
                                    </fieldset>
                                </div><!--end choice -->
                           </div><!--end lip--> 
                           
                           <div class="grid_12"></div>
                           <div class="grid_12 ">
                           		<div id="coma-movement"><img src="images/movement-cm.png" alt="Movement"></div>
                           </div>
                			
                            <div class="grid_12">
                        		<div data-role="fieldcontain" class="padding-choice-cm-2">
                        			<fieldset data-role="controlgroup" data-type="horizontal">
                                    	<!--<legend>Choose a pet:</legend>  -->
                                        <input type="radio" name="mm_value" id="mm_value1" value="0"<?php if($mmv == "0"){ ?>checked="checked"<?php } ?> />
                                        <label for="mm_value1">No movement</label>
                            
                                        <input type="radio" name="mm_value" id="mm_value2" value="1"<?php if($mmv == "1"){ ?>checked="checked"<?php } ?>  />
                                        <label for="mm_value2">Arm have Ab.ext</label>
                            
                                        <input type="radio" name="mm_value" id="mm_value3" value="2"<?php if($mmv == "2"){ ?>checked="checked"<?php } ?>  />
                                        <label for="mm_value3">Arm have Ab.flex</label>
                            
                                        <input type="radio" name="mm_value" id="mm_value4" value="3"<?php if($mmv == "3"){ ?>checked="checked"<?php } ?>  />
                                        <label for="mm_value4">Arm-Leg twitch</label>
                            
                                        <input type="radio" name="mm_value" id="mm_value5" value="4"<?php if($mmv == "4"){ ?>checked="checked"<?php } ?>  />
                                        <label for="mm_value5">Know hurt points</label>
                            
                                        <input type="radio" name="mm_value" id="mm_value6" value="5"<?php if($mmv == "5"){ ?>checked="checked"<?php } ?>  />
                                        <label for="mm_value6">Good</label>
                                    </fieldset>
                                </div><!--end choice -->
                           </div><!--end movement--> 
                			
                            
                            <div class="grid_12 space-box"></div>
<?php
/*
                            <div class="grid_12">
                            		<div data-role="footer" data-theme="b" class="ui-bar ui-grid-c">
										<div class="ui-block-a"><h3>Total</h3></div>
										<div class="ui-block-c"><input id="value" value="5,000"></div>	 
										<div id="btn-submit" class="ui-block-d"><div><button type="submit" data-theme="b">Submit</button></div></div>  
	    							</div><!-- /footer -->
                            </div>		
*/
?>		
                          
                            
                              
                </div><!--end content -->
               </div><!--end page -->
			</form>
<?php
			include("./include/user_bottom.php");
		} //end ( $_SESSION['patient'] != "" );
	} //end ( $_SESSION["doctor"] != "" );
?>

<?php
	$title_name = "CN2: Visualization";
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
			<a href="#" data-role="button" data-icon="back" onclick="CN2_submit_back();">Back</a>
			<a href="#" data-role="button" data-icon="home" onclick="CN2_submit_home();">Home</a>
		</div>

		<h1>CN2: Visualization</h1>
		<?php include("./include/user_head_right.php"); ?>
	</div><?php //end header ?>
    
<?php
	$sql="
	SELECT 
	`R_visualAcuity_up`, `R_visualAcuity_down`, `L_visualAcuity_up`, `L_visualAcuity_down`, 
	`R_visualField_1`, `R_visualField_2`, `R_visualField_3`, `R_visualField_4`, 
	`L_visualField_1`, `L_visualField_2`, `L_visualField_3`, `L_visualField_4`
	FROM  `Mahidol_Rama_Medicine_Surg_cn_2`
	WHERE `Patient_id` = '$_SESSION[patient]'
	AND `s_latest_reports_id` = '$s_latest_reports_id'
	";
	$result = mysql_query($sql);
	$num=mysql_num_rows($result);
	for($count = 1; $count <= 4; $count++){
		$R_visualField[$count] = "0";
		$L_visualField[$count] = "0";
	}
	while($rs = mysql_fetch_array($result)){
		$R_visualAcuity_up = $rs["R_visualAcuity_up"];
		$R_visualAcuity_down = $rs["R_visualAcuity_down"];
		$L_visualAcuity_up = $rs["L_visualAcuity_up"];
		$L_visualAcuity_down = $rs["L_visualAcuity_down"];
		for($count = 1; $count <= 4; $count++){
			if($rs[("R_visualField_".$count)] == 0){
				$R_visualField[$count] = "0";
			}
			elseif($rs[("R_visualField_".$count)] == 1){
				$R_visualField[$count] = "1";
			}
		}
		for($count = 1; $count <= 4; $count++){
			if($rs[("L_visualField_".$count)] == 0){
				$L_visualField[$count] = "0";
			}
			elseif($rs[("L_visualField_".$count)] == 1){
				$L_visualField[$count] = "1";
			}
		}
	}
?>


	<div data-role="content" class="container_12">
		<form id="CN2Form" action="./cn1-smelling_proc.php" method="POST">
			<input type="hidden" name="location" id="locationPath" value=""> <?//next page is back or home ??>
<?php		for($count = 1; $count <= 4; $count++){
?>				<input type="hidden" id="valueR<?=$count?>" name="valueR<?=$count?>" value="<?=$R_visualField[$count]?>">
				<input type="hidden" id="valueL<?=$count?>" name="valueL<?=$count?>" value="<?=$L_visualField[$count]?>">
<?php		}
			if($num == 1){	//send function
?>				<input type="hidden" name="fn" value="CN2_edit">
<?php		}else{
?>				<input type="hidden" name="fn" value="CN2_addNew">
<?php		}
?>			<div class="grid_12 margin-btm_CN_2"><h1 id="title-right-box-full-2">Visual Acuity</h1></div><?php //end ?>
				<div id="title-right-box"class="grid_5 alpha"><h1>Right</h1></div><?php //end ?>  
				<div id="title-left-box" class="grid_5"><h1>Left</h1></div><?php //end ?>

				<div id="wrapper-eye" class="grid_6 margin-btm_negative">
		   			<img src="images/eye-right.png" width="121" height="68" alt="Right-Eye">
				</div>
				<div id="wrapper-eye" class="grid_6 margin-btm_negative">
					<img src="images/eye-left.png" width="125" height="68" alt="Left-Eye">
				</div>
			<div class="grid_6">
				<label for="slider-1"></label>
				<?php //start slider right ?>
				<div data-role="fieldcontain" class="slider-bar ">
<?php				if($num == 1){
?>						<input type="range" name="R_visualAcuity_up" id="slider2" value="<?=$R_visualAcuity_up?>" min="0" max="100"  data-theme="a" data-track-theme="b"/>
<?php				}else{
?>						<input type="range" name="R_visualAcuity_up" id="slider2" value="0" min="0" max="100"  data-theme="a" data-track-theme="b"/>
<?php				}
?>				</div>
			</div><?php //end slider right ?>
		          
			<div class="grid_6">
				<label for="slider-2"></label>
				<div data-role="fieldcontain" class="slider-bar">
<?php				if($num == 1){
?>						<input type="range" name="L_visualAcuity_up" id="slider" value="<?=$L_visualAcuity_up?>" min="0" max="100"  data-theme="a" data-track-theme="b"  />
<?php				}else{
?>						<input type="range" name="L_visualAcuity_up" id="slider" value="0" min="0" max="100"  data-theme="a" data-track-theme="b"  />
<?php				}
?>				</div>
			</div><?php //end slider left ?>
			<div class="grid_6">
				<label for="slider-3"></label>
				<div data-role="fieldcontain" class="slider-bar">
<?php				if($num == 1){
?>						<input type="range" name="R_visualAcuity_down" id="slider" value="<?=$R_visualAcuity_down?>" min="0" max="100"  data-theme="a" data-track-theme="b" />
<?php				}else{
?>						<input type="range" name="R_visualAcuity_down" id="slider" value="0" min="0" max="100"  data-theme="a" data-track-theme="b" />
<?php				}
?>				</div>
			</div><?php //end slider right ?>
			<div class="grid_6">
				<label for="slider-4"></label>
				<div data-role="fieldcontain" class="slider-bar">
<?php				if($num == 1){
?>						<input type="range" name="L_visualAcuity_down" id="slider" value="<?=$L_visualAcuity_down?>" min="0" max="100"  data-theme="a" data-track-theme="b" />
<?php				}else{
?>						<input type="range" name="L_visualAcuity_down" id="slider" value="0" min="0" max="100"  data-theme="a" data-track-theme="b" />
<?php				}
?>				</div>
			</div><?php //end slider left ?>
		</form>
             
		<div class="grid_12">
			<div class="space-box"></div>
		</div>

<?php
		//####### Visual Field #######
?>
		<div class="grid_12 margin-btm">
			<h1  id="title-right-box-full-2">Visual Field</h1></div><?php //end ?>
			<div id="title-right-box"class="grid_5 alpha"><h1>Right</h1></div><?php //end ?>  
			<div id="title-left-box" class="grid_5"><h1>Left</h1></div><?php //end ?>

			<!--span id="test"></span>
			<a href="#" onclick="test()">aaa</a-->

			<div class="grid_6"><?php // ?>
			 	<div id="wrapper-visualField-acuity-1">
			 		<div id="visual-upper-right">
						<span id="R1"><?php
							if($R_visualField[1] == 0){
?>
								<a href="#" onclick="visualField('R1', '<?=$R_visualField[1]?>' ); "><img src="images/cn2-visual-upper-blank-r.png"></a><?php
							}
							elseif($R_visualField[1] == 1){
?>
						   		<a href="#" onclick="visualField('R1', '<?=$R_visualField[1]?>' ); "><img src="images/cn2-visual-upper-r.png" ></a><?php
							}
						?></span><?php //end id = R1
						?><span id="R2"><?php
							if($R_visualField[2] == 0){
								?><a href="#" onclick="visualField('R2', '<?=$R_visualField[2]?>');"><img src="images/cn2-visual-upper-blank-l.png"></a><?php
							}
							elseif($R_visualField[2] == 1){
								?><a href="#" onclick="visualField('R2', '<?=$R_visualField[2]?>');"><img src="images/cn2-visual-upper-l.png"></a><?php
							}
						?></span>
					</div><?php //end visual-upper-right ?>
					<div id="visual-lower-right">
						<span id="R3">
<?php
							if($R_visualField[3] == 0){
?>
							   	<a href="#" onclick="visualField('R3', '<?=$R_visualField[3]?>' );"><img src="images/cn2-visual-lower-blank-r.png"></a><?php
							}
							elseif($R_visualField[3] == 1){
?>
							   	<a href="#" onclick="visualField('R3', '<?=$R_visualField[3]?>' );"><img src="images/cn2-visual-lower-r.png"></a><?php
							}
						?></span><?php //end id = R3
						?><span id="R4"><?php
							if($R_visualField[4] == 0){
								?><a href="#" onclick="visualField('R4', '<?=$R_visualField[4]?>' );"><img src="images/cn2-visual-lower-blank-l.png" ></a>
<?php						}
							elseif($R_visualField[4] == 1){
								?><a href="#" onclick="visualField('R4', '<?=$R_visualField[4]?>' );"><img src="images/cn2-visual-lower-l.png" ></a>
<?php						}
?>
						</span>
					</div><?php //end visual-lower-right ?>

				</div><?php //end wrapper-visualField-acuity ?>
			</div><?php //end grid_6 ?>
			<div class="grid_6">
				<div id="wrapper-visualField-acuity-2">
					<div id="visual-upper-right">
						<span id="L1"><?php
							if($L_visualField[1] == 0){
								?><a href="#" onclick="visualField('L1', '<?=$L_visualField[1]?>' ); "><img src="images/cn2-visual-upper-blank-r.png"></a><?php
							}
							elseif($L_visualField[1] == 1){
								?><a href="#" onclick="visualField('L1', '<?=$L_visualField[1]?>' ); "><img src="images/cn2-visual-upper-r.png"></a><?php
							}
						?></span><?php
						?><span id="L2"><?php
							if($L_visualField[2] == 0){
								?><a href="#" onclick="visualField('L2', '<?=$L_visualField[2]?>' ); "><img src="images/cn2-visual-upper-blank-l.png"></a><?php
							}
							elseif($L_visualField[2] == 1){
								?><a href="#" onclick="visualField('L2', '<?=$L_visualField[2]?>' ); "><img src="images/cn2-visual-upper-l.png"></a><?php
							}
						?></span><?php
					?></div><?php //end visual-upper-right ?>
					<div id="visual-lower-right">
						<span id="L3"><?php
							if($L_visualField[3] == 0){
								?><a href="#" onclick="visualField('L3', '<?=$L_visualField[3]?>' ); "><img src="images/cn2-visual-lower-blank-r.png"></a><?php
							}
							elseif($L_visualField[3] == 1){
								?><a href="#" onclick="visualField('L3', '<?=$L_visualField[3]?>' ); "><img src="images/cn2-visual-lower-r.png"></a><?php
							}
						?></span><?php
						?><span id="L4"><?php
							if($L_visualField[4] == 0){
								?><a href="#" onclick="visualField('L4', '<?=$L_visualField[4]?>' ); "><img src="images/cn2-visual-lower-blank-l.png"></a><?php
							}
							elseif($L_visualField[4] == 1){
								?><a href="#" onclick="visualField('L4', '<?=$L_visualField[4]?>' ); "><img src="images/cn2-visual-lower-l.png"></a>
	<?php					}
						?></span>
					</div><?php //end visual-lower-right ?>
				</div><?php //end wrapper-visualField-acuity ?>
		</div>	<?php //end grid_6 ?>


	</div><?php //end content ?>
</div><?php //end page ?>

<script src="include/js/canvas/canvas2image.js" charset="utf-8"></script>
<script src="include/js/canvas/base64.js" charset="utf-8"></script>
<script src="include/js/canvas/CN2_R.js" charset="utf-8"></script>
<script src="include/js/canvas/CN2_L.js" charset="utf-8"></script>

<?php
			include("./include/user_bottom.php");
		} //end ( $_SESSION['patient'] != "" );
	} //end ( $_SESSION["doctor"] != "" );
?>

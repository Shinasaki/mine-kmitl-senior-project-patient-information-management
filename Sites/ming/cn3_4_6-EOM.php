<?php
	$title_name = "CN3, 4, 6: EOM";
	include("./include/user_head.php");

	if($_SESSION['doctor'] == ""){
		include("./include/login/login.php");
	}
	elseif($_SESSION['doctor'] != ""){
			include("./include/user_CNsetTime.php");
			$s_latest_reports_id = $_SESSION["s_latest_reports_id"];
?>


<?php	//################################################### start page id=1 ####################################################	?>

<div data-role="page">
	<div data-role= "header" data-theme= "b">
		<div data-role="listview" data-type="horizontal" class="ui-btn-left">
			<a href="./main-cranialNerve.php" data-role="button" data-icon="back" >Back</a>
			<a href="./main-cranialNerve.php" data-role="button" data-icon="home" >Home</a>
		</div>
		<h1>CN3, 4, 6: EOM</h1>
<?php	include("./include/user_head_right.php"); ?>
	</div><!--end header -->

<form name="CN3FormRHS" action="./cn1-smelling_proc.php" method="POST">
<input type="hidden" name="location" value="" />

<?php
	$sql="
	SELECT `R_eom`, `L_eom`
	FROM `Mahidol_Rama_Medicine_Surg_cn_3_4_6`
	WHERE `Patient_id` = '$_SESSION[patient]'
	AND `s_latest_reports_id` = '$s_latest_reports_id'
	";
	$result = mysql_query($sql);
	$num=mysql_num_rows($result);
	while($rs = mysql_fetch_array($result)){
		$R_oem = $rs["R_eom"];
		$L_oem = $rs["L_eom"];
	}
	if($num == 1){	//send function
?>		<input type="hidden" name="fn" value="CN3_edit_RHS"><?php
	}else{
?>		<input type="hidden" name="fn" value="CN3_addNew_RHS"><?php
	}
?>
	<div data-role="content" class="container_12">
	
		<div data-role="navbar" data-iconpos="top" class="grid_12 space-height">
			<ul>
				<li>
					<a href="cn3_4_6-EOM.php" data-theme="" data-icon="arrow-l" rel="external" class="ui-btn-active" data-transition="none">
						Right EOM
					</a>
				</li>
				<li>
					<a href="cn3_4_6-EOM_LHS.php" data-theme="" data-icon="arrow-r" rel="external" data-transition="none">
						Left EOM
					</a>
				</li>
			</ul>
		</div>

		<div id="title-right-box"class="grid_5 alpha space-height"><h1>Right</h1></div><!--end -->
		<div id="title-left-box" class="grid_5 alpha space-height"><h1>Left</h1></div><!--end -->
		
		<div class="grid_6">
			<div id="wrapper-eye-right" >
<?php	//		<a href="#" onClick="CN3_eye_part2R() ;" style="Display: blocked; ">
?>					<div id="imageEyeR" style="background-image: url(./images/eye-bg.png); width: 235px; height: 162px; ">
						<img src="images/cn3-4-6-pupil-right.png" <?php echo "style=\"position:relative; top: 50px; right: ".(-85+(-1*$R_oem))."px;\" ";?> alt="pupil">
					</div>
<?php	//		</a>
?>			</div>
		</div><!--end  wrapper-eye-right-->

		<div class="grid_6">
			<div id="wrapper-eye-left">
<?php	//		<a href="#" onClick="CN3_eye_part2L() ;" style="Display: blocked; ">
?>					<div id="imageEyeL" style="background-image: url(./images/eye-bg.png); width: 235px; height: 162px; ">
						<img src="images/cn3-4-6-pupil-left.png" <?php echo "style=\"position:relative; top: 50px; right: ".(-85+(-1*$L_oem))."px;\" ";?> alt="pupil">
					</div>
<?php	//		</a>
?>			</div><!--end  wrapper-eye-left-->
		</div>
		
		<?php //################## part 1 ################# ?>
		<span id="CN3_part1">
			<div class="grid_12 space-height">
				<div  id="eom-eye-value-right">
					<div data-role="fieldcontain" >
						<input type="range" name="oem" id="oem" onChange="CN3_eye(); " value="<?=$R_oem?>" min="-50" max="50"  data-theme="a" data-track-theme="b" />
					</div>
				</div>
			</div>
			<div class="grid_6">
				<!--input type="" /-->
			</div>
			<div class="grid_6">
				
			</div>
		</span>
		<?php //################## part 2 ################# ?>
<?php

?>
		<span id="CN3_part2">
			<div class="grid_6">

				<div  id="eom-eye-value-right">
					<div data-role="fieldcontain" >
						<input type="range" name="R_oem" id="R_oem" onChange="CN3_eyeR(); " value="<?=$R_oem?>" min="-50" max="50"  data-theme="a" data-track-theme="b" />
					</div>	<!--end eye-value-right -->
				</div>

			</div>	<!-- end grid 6-->
		
			<div class="grid_6">
				<div  id="eom-eye-value-left">
					<div data-role="fieldcontain" >
						<input type="range" name="L_oem" id="L_oem" onChange="CN3_eyeL(); " value="<?=$L_oem?>" min="-50" max="50"  data-theme="a" data-track-theme="b" />
					</div>
				</div>
			</div>	<!-- end grid 6-->
		</span>
		<div class="grid_12 space-height">
			<a href="#" data-role="button" onclick="CN3_submit('RHS') ;" class="ui-btn-active" rel="external">Update</a>
		</div>
	</div> <?php //end content ?>
	</form>
</div>

<?php	//################################################### end page id=1 ####################################################	?>



<?php
	include("./include/user_bottom.php");
	} //end ( $_SESSION["doctor"] != "" );
?>

<?php
	$title_name = "CN2: Visualization (Beta)";
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

<?php /*
<script src="include/js/canvas/canvas2image2.js" charset="utf-8"></script>
<script src="include/js/canvas/base642.js" charset="utf-8"></script>
<script src="include/js/canvas/CN2_R.js" charset="utf-8"></script>
<script src="include/js/canvas/CN2_L.js" charset="utf-8"></script>
*/ ?>

<script src="include/js/canvas/canvas2image2.js" ></script>
<script src="include/js/canvas/base642.js" ></script>
<script src="include/js/canvas/CN2_R.js" ></script>
<script src="include/js/canvas/CN2_L.js" ></script>


<div data-role="page">
	<div data-role= "header" data-theme= "b">
		<div data-role="listview" data-type="horizontal" class="ui-btn-left">
			<a href="./cn2-visual-pad.php" data-role="button" data-icon="back" >Back</a>
			<a href="./" data-role="button" data-icon="home" >Home</a>
		</div>

		<h1>CN2: Visualization (Beta)</h1>
		<?php include("./include/user_head_right.php"); ?>
	</div><?php //end header ?>
	<div data-role="content" class="container_12">
		<div class="grid_12 margin-btm">
			<h1  id="title-right-box-full-2">Visual Field (Beta)</h1>
		</div>
		<div id="title-right-box"class="grid_5 alpha">
			<h1>Right</h1>
		</div>
		<div id="title-left-box" class="grid_5">
			<h1>Left</h1>
		</div>

		<div class="grid_6">
			<div id="container1">
				<canvas id="sketchpad" width="253" height="250"> <?php // width="332" height="324"?>
					Sorry, your browser is not supported.
				</canvas>			
			</div>
		</div>
		<div class="grid_6">
			<div id="container2">
				<canvas id="sketchpadL" width="253" height="250">
					Sorry, your browser is not supported.
				</canvas>
			</div>
		</div>
		
		<?php //CN2_R_savePic(); CN2_L_savePic(); ?>
		<div class="grid_12">
			<a href="#" onclick="CN2_VF_submit(); " data-role="button" rel="external" >Save</a>
		</div>
		
		<form id="CN2VFform" action="cn2-visual-pad_proc.php" method="POST">
			<input type="hidden" name="imageR" id="imageR" value="" />
			<input type="hidden" name="imageL" id="imageL" value="" />
		</form>
		
	</div><?php //end content ?>
</div><?php //end page ?>

<?php
			include("./include/user_bottom.php");
		} //end ( $_SESSION['patient'] != "" );
	} //end ( $_SESSION["doctor"] != "" );
?>

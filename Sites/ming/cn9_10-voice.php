<?php
	$title_name = "CN9, 10: Throat";
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

<form name="CN9form" action="cn1-smelling_proc.php" method="POST">
<?php
	$sql="
	SELECT *
	FROM `Mahidol_Rama_Medicine_Surg_cn_9_10`
	WHERE `Patient_id` = '$_SESSION[patient]'
	AND `s_latest_reports_id` = '$s_latest_reports_id'
	";
	$result = mysql_query($sql);
	$num=mysql_num_rows($result);
	while($rs = mysql_fetch_array($result)){
		$choice1 = $rs["GagReflex"];
		$choice2 = $rs["hoarseness_of_voice"];
		$choice3 = $rs["dysphagia"];
		$choice4 = $rs["dysarthria"];
?>		<input type="hidden" name="fn" value="CN9_edit"> <?php
	}
	if($num != 1){ ?>
		<input type="hidden" name="fn" value="CN9_addNew"> <?php
	}
?>
	<input type="hidden" name="location" value="">
	<div data-role="page">
		<div data-role= "header" data-theme= "b">
		<div data-role="listview" data-type="horizontal" class="ui-btn-left">
			<a href="#" data-role="button" data-icon="back" onclick="CN9_submit_back();">Back</a>
			<a href="#" data-role="button" data-icon="home" onclick="CN9_submit_home();">Home</a>	
		</div>
		<h1>CN9, 10: Throat</h1>
<?php	include("./include/user_head_right.php"); ?>

		</div><!--end header -->
		<div data-role="content" class="container_12">
			<div id="title-right-box"class="grid_5 "><h1>Gag Reflex</h1></div><!--end -->  
			<div id="title-left-box-2" class="grid_5"><h1>Hoarseness of voice</h1></div><!--end -->
			<div class="grid_6">
				<div class="padding-choice-right">
					<fieldset data-role="controlgroup" data-type="horizontal" >
					    <!--<legend>Choose a symptom:</legend> -->
					    <input type="radio" name="radio-choice-1" id="radio-choice-1-1" value="Good" 
<?php						if($choice1 == "Good"){
								echo "checked=\"checked\"";
							}?> />
					    <label for="radio-choice-1-1">Good</label>                 
					    <input type="radio" name="radio-choice-1" id="radio-choice-1-2" value="NoGag"  
<?php						if($choice1 == "NoGag"){?> 
								checked="checked"
<?php						}?> />
					    <label for="radio-choice-1-2">No Gag</label>
					</fieldset>
				</div>
			</div><!--end slider right - .... -->
			<div class="grid_6">
				<div class="padding-choice-left">
					<fieldset data-role="controlgroup" data-type="horizontal" >
				        <!--<legend>Choose a symptom:</legend> -->
				        <input type="radio" name="radio-choice-2" id="radio-choice-2-1" value="Good" 
<?php						if($choice2 == "Good"){?> 
								checked="checked"
<?php						}?> />
				        <label for="radio-choice-2-1">Good</label>
				        <input type="radio" name="radio-choice-2" id="radio-choice-2-2" value="Weak" 
<?php						if($choice2 == "Weak"){?> 
								checked="checked"
<?php						}?> />
						<label for="radio-choice-2-2">Weak</label>
					</fieldset>
				</div>
			</div><!--end slider right - Hoarseness of voice -->           		
			<div id="title-right-box"class="grid_5 space-top"><h1>Dysphagia</h1></div><!-- end -->
			<div id="title-left-box-2" class="grid_5 space-top"><h1>Dysarthria</h1></div><!-- end -->
			<div id="dysphagia" class="grid_6 ">
				<div class="padding-choice-right">
					<fieldset data-role="controlgroup" data-type="horizontal" >
				        <!--<legend>Choose a symptom:</legend> -->
		    	        <input type="radio" name="radio-choice-3" id="radio-choice-3-1" value="Good" 
<?php						if($choice3 == "Good"){?> 
								checked="checked"
<?php						}?> />
		    	        <label for="radio-choice-3-1">Good</label>
		    	        <input type="radio" name="radio-choice-3" id="radio-choice-3-2" value="Weak" 
<?php						if($choice3 == "Weak"){?> 
								checked="checked"
<?php						}?> />
						<label for="radio-choice-3-2">Weak</label>
					</fieldset>
				</div>
			</div><!--end slider right - .... -->
			<div id="diasarthsia" class="grid_6 ">
				<div class="padding-choice-left">
					<fieldset data-role="controlgroup" data-type="horizontal" >
				        <!--<legend>Choose a symptom:</legend> -->
			            <input type="radio" name="radio-choice-4" id="radio-choice-4-1" value="Good" 
<?php						if($choice4 == "Good"){?> 
								checked="checked"
<?php						}?> />
		    	        <label for="radio-choice-4-1">Good</label>            
		    	        <input type="radio" name="radio-choice-4" id="radio-choice-4-2" value="Weak" 
<?php						if($choice4 == "Weak"){?> 
								checked="checked"
<?php						}?> />
						<label for="radio-choice-4-2">Weak</label>
					</fieldset>
				</div>
			</div><!--end slider right - Hoarseness of voice -->           		
		</div><!--content -->
	</div><!--end page -->



<?php
			include("./include/user_bottom.php");
		} //end ( $_SESSION['patient'] != "" );
	} //end ( $_SESSION["doctor"] != "" );
?>

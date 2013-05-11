<?php
	$title_name = "Search Doctor";
	include("./include/user_head.php");

	if($_SESSION['doctor'] == ""){
		include("./include/login/login.php");
	}
	elseif($_SESSION['doctor'] != ""){

	?>
		<?php /* ?>
		<!DOCTYPE html> 
		<html> 
		<head> 
		<title>Patient Information Management System in Hospital</title> 
		 <meta name="viewport" content="width=device-width, initial-scale=1"> 
		 <link rel="stylesheet" href="http://code.jquery.com/mobile/1.0/jquery.mobile-1.0.min.css" />
		 <script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
		<script src="http://code.jquery.com/mobile/1.0/jquery.mobile-1.0.min.js"></script>
		<script type="text/javascript" src="js/jquery.mobile.actionsheet.js"></script><!-- -->
		<link href="css/jquery-mobile-fluid960.css" rel="stylesheet" type="text/css"> 
		<link href="css/reset.css" rel="stylesheet" type="text/css">
		<link href="css/main.css" rel="stylesheet" type="text/css">
		<link href="css/jquery.mobile.actionsheet.css" rel="stylesheet" type="text/css">
		</head>
		<?php */ ?>

		<?php			
		$sql = "
			SELECT `id`, `name`, `surname`
			FROM  `Mahidol_Rama_Medicine_Surg_doctor_profiles` 
			ORDER BY `id` ASC
		";
		$result = mysql_query($sql);
		$num = mysql_num_rows($result);
		$i = 0;
		while($rs = mysql_fetch_array($result)){
			$doctor_id[$i] = $rs["id"];
			$doctorName[$i] = $rs["name"];
			$doctorLastname[$i] = $rs["surname"];
			$i++;
		}

		//########### admin ? #############
		$sql = "
			SELECT `admin`
			FROM  `Mahidol_Rama_Medicine_Surg_doctor_profiles`
			WHERE `id` = '".$_SESSION["doctor"]."'
			AND `admin` = '1'
		;";	//own user?
		$result = mysql_query($sql);
	//	$num = mysql_num_rows($result);
		if($rs = mysql_fetch_array($result)){	//if admin == yes
			
?>
			<div data-role="page">
				<div data-role= "header" data-theme= "b">
					<div data-role="listview" data-type="horizontal" class="ui-btn-left">
						<a href="index.php" data-role="button" data-icon="home" >Home</a>	
					</div>
					<h1>Search Doctor</h1>
			<?php	include("./include/user_head_right.php"); ?>
				</div><!--end header -->
				<div data-role="content" class="container_12">
					<div class="grid_12">
						<div class="space-box"></div>
					</div>
					<div class="grid_2">
						<div class="space-box"></div>
					</div>
					<div class="grid_8">
						<ul data-role="listview" data-filter="true" data-filter-theme="f" data-theme="c">
							<li data-role="list-divider">List of Doctor</li>
<?php						
							/*
							print_r($doctorName); echo "<br />";
							print_r($doctor_lastname);
							*/
							//$doctor_lastname = new array();
							/*
							$sql = "
								SELECT `surname`
								FROM  `Mahidol_Rama_Medicine_Surg_doctor_profiles` 
								ORDER BY `id` ASC
							";
							$result = mysql_query($sql);
							$num = mysql_num_rows($result);
							$ii = 0;
							
							while($rs = mysql_fetch_array($result)){
								$doctor_lastname[] = $rs["surname"];
								$ii++;
							}
							*/

							for($j = 0; $j < $i; $j++){
?>								<li><a href="./doctor_profile.php?did=<?=$doctor_id[$j]?>" rel="external"><?php	echo $doctorName[$j]." {$doctorLastname["$j"]} "; ?></a></li>
<?php						}
?>
						</ul>
					</div><!--end search -->
					<div class="grid_2">
						<div class="space-box"></div>
					</div>
						       
					<div class="grid_12 "><div class="space-box "></div></div>
					<div class="grid_2 "><div class="space-box"></div></div>
					<div class="grid_8 ">	
						<div class="space-box" >
							<a href="./doctor_form.php" data-role="button" data-icon="plus" data-theme="b" rel="external">Add New Doctor</a>
						</div>
					</div>	
					<div class="grid_2"><div class="space-box"></div></div>     
				</div>
			</div>
<?php
		}	//end else if admin == yes
		else{	//if admin == no
?>
			<div data-role="page">
				<div data-role= "header" data-theme= "b">
					<div data-role="listview" data-type="horizontal" class="ui-btn-left">
						<a href="index.php" data-role="button" data-icon="home" >Home</a>	
					</div>

					<h1>Search Doctor</h1>
			<?php	include("./include/user_head_right.php"); ?>
				</div><!--end header -->
				<div data-role="content" class="container_12">
					<div class="grid_12" style="text-align: center; ">
						Access Denied
						<div class="space-box"></div>
					</div>
				</div>
<?php		
		}	//end else if admin == no
				
		include("./include/user_bottom.php");
	} //end ( $_SESSION["doctor"] != "" );
?>

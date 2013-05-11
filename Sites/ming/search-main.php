<?php
	$title_name = "Search Patient";
	include("./include/user_head.php");

	if($_SESSION['doctor'] == ""){
		include("./include/login/login.php");
	}
	elseif($_SESSION['doctor'] != ""){
		$sql = "
			SELECT `Patient_id`, `firstname`, `lastname`
			FROM  `Mahidol_Rama_Medicine_Surg_s_patient_profiles` 
			ORDER BY `Patient_id` ASC
		";
		$result = mysql_query($sql);
		$num = mysql_num_rows($result);
		$i = 0;
		while($rs = mysql_fetch_array($result)){
			$patient_id[$i] = $rs["Patient_id"];
			$patientName[$i] = $rs["firstname"];
			$patientLastname[$i] = $rs["lastname"];
			$i++;
		}
?>
		<div data-role="page">
			<div data-role= "header" data-theme= "b">
				<div data-role="listview" data-type="horizontal" class="ui-btn-left">
					<a href="index.php" data-role="button" data-icon="home" >Home</a>	
				</div>

				<h1>Search Patient</h1>
		<?php	include("./include/user_head_right.php"); ?>
			</div><!--end header -->
			
			<div data-role="content" class="container_12">

				<div class="grid_12">
					<div class="space-box"></div>
				</div>
				<div class="grid_2">
					<div class="space-box"></div>
				</div>
				<div class="grid_8 ">
					<ul data-role="listview" data-filter="true" data-filter-placeholder="Filter by Name" data-filter-theme="f" data-theme="c" >
						<li data-role="list-divider">List of Patient</li>
<?php					for($j = 0; $j < $i; $j++){
?>							<li><a href="./result-found.php?pid=<?=$patient_id[$j]?>" rel="external"><?php echo $patientName[$j]." ".$patientLastname[$j]; ?></a></li>
<?php					}
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
						<a href="./patient-form.php" data-role="button" data-icon="plus" data-theme="b" rel="external">Add New Patient</a>
					</div>
				</div>	
				<div class="grid_2"><div class="space-box"></div></div>     
			</div>
		</div>

<?php
		include("./include/user_bottom.php");
	} //end ( $_SESSION["doctor"] != "" );
?>

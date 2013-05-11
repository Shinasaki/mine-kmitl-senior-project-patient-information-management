<?php
	$title_name = "Cranial Nerves";
	include("./include/user_head.php");

	if($_SESSION['doctor'] == ""){
		include("./include/login/login.php");
	}
	elseif($_SESSION['doctor'] != ""){
		$patient = $_SESSION["patient"];
		if($_GET["new"] == 1){ //new CN
			unset($_SESSION["date3"]);
		}
		if($_GET["edit"] == 1){ //edit CN
			unset($_SESSION["date3"]);
			$sql = "
			SELECT `time`
			FROM  `Mahidol_Rama_Medicine_Surg_s_latest_reports`
			WHERE `s_latest_reports_id` = '".$_GET['id']."' ;
			";
			$result = mysql_query($sql);
			while($rs = mysql_fetch_array($result)){
				$timeRecord = $rs["time"];
			}
		}
		if($timeRecord == ""){
			$timeRecord = $_SESSION["date3"];
		}
		if($patient == ""){
			header("location: ./search-main.php");
		}
		else{
			$sql = "
				SELECT `R_smelling`
				FROM `Mahidol_Rama_Medicine_Surg_cn_1`
				WHERE `Patient_id` = '$_SESSION[patient]'
				AND `s_latest_reports_id` = '$s_latest_reports_id'
			";
?>
			<div data-role="page">
        		<div data-role= "header" data-theme= "b">
					<div data-role="listview" data-type="horizontal" class="ui-btn-left">
						<a href="index.php" data-role="button" data-icon="home" >Home</a>	
                 	</div>
					<h1>Cranial Nerves</h1>
<?php				include("./include/user_head_right.php"); ?>
				</div><!--end header -->
				<div data-role="content" class="container_12">
					<form name="mainCNTimeForm" action="" method="POST">
						<div data-role="fieldcontain">
								<label for="date3">Date and Time</label>
								<input type="text" name="date3" id="date3" class="mobiscroll" value="<?=$timeRecord?>"/>
						</div>
					</form>
				
                	<div id="main-cranialNerves">
                   		
                    		<div id="wrapper-cn-3-4-6-2">
								<a href="#" onclick="mainCN_sendTime('./cn3_4_6-EOM.php'); " rel="external">
                            		<div id="cn3-pos" class="ui-corner-all opacity btn-color btn-cn left"><h4>CN3, 4, 6</h4></div>
								</a>
								<a href="#" onclick="mainCN_sendTime('./cn2-visual.php'); ">
	                        		<div id="cn2-pos" class="ui-corner-all opacity btn-color btn-cn left"><h4>CN2:1</h4></div>
								</a>
	                       		<a href="#" onclick="mainCN_sendTime('./cn2-visual-pad.php'); ">
		                       		<div id="cn2-pos-1" class="ui-corner-all opacity btn-color btn-cn left"><h4>CN2:2</h4></div>
								</a>             
                    		</div><!--end cn-3-4-6 -->   
							                	
        					<div id="wrapper-cn-8-5-1">							
								<a href="#" onclick="mainCN_sendTime('./cn8-hearing.php'); ">
									<div id="cn8-pos" class="ui-corner-all opacity btn-color btn-cn left"><h4>CN8</h4></div>
								</a>
								<a href="#" onclick="mainCN_sendTime('./cn5-sensory.php'); ">
                            	<div id="cn2-pos" class="ui-corner-all opacity btn-color btn-cn left"><h4>CN5</h4></div>
								</a>
							<a href="#" onclick="mainCN_sendTime('./cn1-smelling.php'); ">
                       		  	<div id="cn1-pos" class="ui-corner-all opacity btn-color btn-cn left"><h4>CN1</h4></div>
							</a>

					</div><!--end cn8-cn5-cn1 -->
                      
                   <div id="wrapper-cn-7">
							<a href="#" onclick="mainCN_sendTime('./cn7-facial.php'); ">
                            	<div id="cn7-pos" class="ui-corner-all opacity btn-color btn-cn left"><h4>CN7</h4></div>
							</a>
							<a href="#" onclick="mainCN_sendTime('./cn9_10-voice.php'); ">
                               <div id="cn9-pos" class="ui-corner-all opacity btn-color btn-cn left"><h4>CN9,10</h4></div>
							</a>
                  	</div><!--end cn7-cn9-10 -->
           
                      
					<div id="wrapper-cn-12">
							<a href="#" onclick="mainCN_sendTime('./cn12-tongue.php'); ">
                        		<div id="cn12-pos" class="ui-corner-all opacity btn-color btn-cn left"><h4>CN12</h4></div>
							</a>
                  	</div><!--end cn7-cn9-10 -->

                      
                    <div id="wrapper-cn-11">
							<a href="#" onclick="mainCN_sendTime('./cn11-sternocleido.php'); ">
                        		<div id="cn11-pos" class="ui-corner-all opacity btn-color btn-cn left"><h4>CN11</h4></div>
							</a>
                  	</div><!--end cn7-cn9-10 -->
					
				</div><!--end main-cranialNerves -->
				
				</div><!--end content -->
			</div><!--end page -->
<?php
			include("./include/user_bottom.php");
		} //end ( $_SESSION['patient'] != "" );
	} //end ( $_SESSION["doctor"] != "" );
?>

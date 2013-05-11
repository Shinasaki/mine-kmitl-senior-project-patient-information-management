<?php
include("./include/user_head.php");

if($_SESSION['doctor'] == ""){
	include("./include/login/login.php");
}
elseif($_SESSION['doctor'] != ""){

	//it is temp
	$patient = $_SESSION["patient"];

	if($patient == ""){
		header("location: ./search-main.php");
	}
	else{
		$fn = $_GET["fn"];
?>
		<div data-role="page">
    		<div data-role= "header" data-theme= "b">
				<div data-role="listview" data-type="horizontal" class="ui-btn-left">
					<a href="result-found.php?pid=<?=$patient?>" data-role="button" data-icon="back" rel="external">Back</a>
					<a href="index.php" data-role="button" data-icon="home" >Home</a>	
				</div>
				<h1>History of 
<?php				if($fn == "yp") echo "Neurological Observation";
						elseif($fn == "cn") echo "Cranial Nerve";
?>				</h1>
<?php			include("./include/user_head_right.php"); ?>
            </div><!--end header -->
            <div data-role="content" class="container_12">
<?php
				$i = 0;
				if($fn == "cn"){
					for($i=0; $i<$num; $i++){
						$time[$i] = "";
					}
					$i=0;
					$sql = "
						SELECT `Mahidol_Rama_Medicine_Surg_s_latest_reports`.`time`, `Mahidol_Rama_Medicine_Surg_s_latest_reports`.`s_latest_reports_id`
						FROM 
							`Mahidol_Rama_Medicine_Surg_s_latest_reports`
						INNER JOIN 
							`Mahidol_Rama_Medicine_Surg_patient_CN` 
						WHERE 
							`Mahidol_Rama_Medicine_Surg_s_latest_reports`.`s_latest_reports_id` = `Mahidol_Rama_Medicine_Surg_patient_CN`.`order_id`
						AND 
							`Mahidol_Rama_Medicine_Surg_patient_CN`.`Patient_id` = '$patient'
						GROUP BY `Mahidol_Rama_Medicine_Surg_s_latest_reports`.`time`
						ORDER BY `Mahidol_Rama_Medicine_Surg_s_latest_reports`.`time` DESC
					";
					//	ORDER BY `s_id` DESC;
					//";
					$result = mysql_query($sql);
					$num=mysql_num_rows($result);
					while($rs = mysql_fetch_array($result)){
						$orderCN_id[$i] = $rs["s_latest_reports_id"];
						$time[$i] = $rs["time"];
						$i++;
					}
				}
				elseif($fn == "yp"){
					for($i=0; $i<$num; $i++){
						$time[$i] = "";
					}
					$i=0;
					$sql = "
						SELECT `Mahidol_Rama_Medicine_Surg_yp_lastest_reports`.`time`, `Mahidol_Rama_Medicine_Surg_yp_lastest_reports`.`order_id`
						FROM  
							`Mahidol_Rama_Medicine_Surg_yp_lastest_reports`
						INNER JOIN 
							`Mahidol_Rama_Medicine_Surg_patient_YP` 
						WHERE 
							`Mahidol_Rama_Medicine_Surg_yp_lastest_reports`.`order_id` = `Mahidol_Rama_Medicine_Surg_patient_YP`.`order_id`
						AND 
							`Mahidol_Rama_Medicine_Surg_patient_YP`.`Patient_id` = '$patient'
						GROUP BY `Mahidol_Rama_Medicine_Surg_yp_lastest_reports`.`time`
						ORDER BY `Mahidol_Rama_Medicine_Surg_yp_lastest_reports`.`time` DESC
					";
					//	ORDER BY `yp_id` DESC;
					//";
					$result = mysql_query($sql);
					$num=mysql_num_rows($result);
					while($rs = mysql_fetch_array($result)){
						$orderYP_id[$i] = $rs["order_id"];
						$time[$i] = $rs["time"];
						$i++;
					}
				}

?>
                <div class="grid_12">
					<span class="btn-id">Patient ID : <?=$patient?></span> <br />
					<table id="myTable" class="tablesorter">
						<thead> 
							<tr> 
								<th>Times</th> 
								<th>Date</th> 
								<th>Report</th> 
							</tr>
						</thead>
						<tbody>
<?php
							if($fn == "cn"){
								for($i=0; $i < $num; $i++){
?>
									<tr> 
										<td><?=date("Y-m-d",(strtotime($time[$i])))?></td>
										<td><?=date("H:i:s",(strtotime($time[$i])))?></td>
										<td><a href="./report.php?fn=cn&id=<?=$orderCN_id[$i]?>" data-role="button" data-inline="true" data-theme="b" rel="external">Report</a></td> 
									</tr>
<?php
								}
							}
							elseif($fn == "yp"){
								for($i=0; $i < $num; $i++){
?>
									<tr> 
										<td><?=date("Y-m-d",(strtotime($time[$i])))?></td> 
										<td><?=date("H:i:s",(strtotime($time[$i])))?></td> 
										<td><a href="./report.php?fn=neuro&id=<?=$orderYP_id[$i]?>" data-role="button" data-inline="true" data-theme="b" rel="external">Report</a></td> 
									</tr>
<?php
								}
							}
?>
						</tbody>        
					</table>  
				</div><!--end table -->
			</div><!--end content -->
		</div><!--end page -->
<?php
			include("./include/user_bottom.php");
		} //end ( $_SESSION['patient'] != "" );
	} //end ( $_SESSION["doctor"] != "" );
?>

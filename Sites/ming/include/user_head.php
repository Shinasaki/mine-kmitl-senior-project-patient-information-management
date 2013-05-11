<?php
session_start();
require_once($rootpath."lib/func_date.php");
require_once($rootpath."lib/DB.php");
require_once($rootpath."lib/conn.inc.php");
if (!$db->open()){
	die($db->error());
}
mysql_query("SET NAMES 'utf8'");
$patient="";
?>
<!DOCTYPE html> 
<html> 
<head> 
	<title>
	<?php
		if($title_name != "") echo $title_name;
		else echo "CN";
	?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8;" />


	<script src="<?=$rootpath?>include/js/jQueryMobile/jquery-1.6.4.min.js"></script>

	<script src="<?=$rootpath?>./include/js/func.js"></script>

<?php
		for($i = 1; $i<=3; $i++){
?>			<script src="<?=$rootpath?>./include/js/funcCN<?=$i?>.js"></script>
<?php	}
		for($i = 7; $i<=12; $i++){
			if($i != 10){
?>				<script src="<?=$rootpath?>./include/js/funcCN<?=$i?>.js"></script>
<?php		}
		}
?>
		<script src="<?=$rootpath?>./include/js/funcCN5.js"></script>

	<script src="<?=$rootpath?>./include/js/neuro-observ.js"></script>

	<link rel="stylesheet" href="<?=$rootpath?>./include/js/jQueryMobile/jquery.mobile-1.0.1.css" />

<?php
/*
	<script type="text/javascript" src="js/jquery.tablesorter.min.js"></script>
*/
?>

	<script src="<?=$rootpath?>./include/js/search_result.js" language='JavaScript' type='text/javascript'></script>


	<script src="<?=$rootpath?>include/js/doctor_search_result.js"></script>
	
	<script src="<?=$rootpath?>./include/js/jQueryMobile/jquery.validate.js"></script>

<?php
		if($title_name == "Add New Patient" ){
?>
			<script src="./include/js/patient_form.js"></script>
<?php
		}
?>

	<script src="<?=$rootpath?>include/js/jQueryMobile/jquery.mobile-1.0.1.js"></script>
	<link href="<?=$rootpath?>css/jquery-mobile-960.min.css" />
	<link href="<?=$rootpath?>css/jquery-mobile-fluid960.css" rel="stylesheet" type="text/css">
	<link href="<?=$rootpath?>css/reset.css" rel="stylesheet" type="text/css">
	<link href="<?=$rootpath?>css/main.css" rel="stylesheet" type="text/css">
	
	<script type="text/javascript" src="<?=$rootpath?>js/jquery.mobile.actionsheet.js" language='JavaScript' type='text/javascript'></script>
	<link href="<?=$rootpath?>css/jquery.mobile.actionsheet.css" rel="stylesheet" type="text/css">

	<script src="<?=$rootpath?>js/mobiscroll-1.5.js" type="text/javascript"></script><!--time picker -->
	<script src="<?=$rootpath?>./include/js/mobiscorll.js" language='JavaScript' type='text/javascript'></script><!--time picker -->
	<link href="<?=$rootpath?>css/mobiscroll-1.5.css" rel="stylesheet" type="text/css" /><!--time picker -->

	<link href="<?=$rootpath?>./tableB/style.css" rel="stylesheet" type="text/css">
<?php
		if($_SESSION[doctor] == ""){
?>
			<script>
			  $(document).ready(function(){
				$("#checkForm").validate();
			  });
			</script>
<?php
		} //end ( $_SESSION[doctor] == "" );
?>

<script type="text/javascript">
/* 2012-03-22 */
/*
$(document).ready(function() 
    { 
        $("#myTable").tablesorter(); 
    } 
); 
$(document).ready(function() 
    { 
        $("#myTable").tablesorter( {sortList: [[0,0], [1,0]]} ); 
    } 
); 
*/

/*
	$(document).ready(function(){
		$("tr:odd").addClass("odd");
		$("tr:even").addClass("even");
	});
*/
	$(document).ready(function(){
		$("tr:odd").addClass("odd");
		$("tr:even").addClass("even");
	});

</script>

</head>

<body>


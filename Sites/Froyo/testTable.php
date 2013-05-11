<!DOCTYPE html> 
<html> 
<head> 
<title>Cranial Nerves</title> 
 <meta name="viewport" content="width=device-width, initial-scale=1"> 
 <link rel="stylesheet" href="./include/js/jQueryMobile/jquery.mobile-1.0.min.css" />
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/jquery.tablesorter.min.js"></script>
<script src="./include/js/jQueryMobile/jquery.mobile-1.0.min.js"></script>
 <link href="http://jeromeetienne.github.com/jquery-mobile-960/css/jquery-mobile-960.min.css" />
<link href="css/jquery-mobile-fluid960.css" rel="stylesheet" type="text/css">
<link href="css/reset.css" rel="stylesheet" type="text/css">
<link href="css/main.css" rel="stylesheet" type="text/css">




<script type="text/javascript">
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
    
</script>

<link href="tableB/style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div data-role="page">
        		<div data-role= "header" data-theme= "b">
                	 <div data-role="listview" data-type="horizontal" class="ui-btn-left">
                 		<a href="#" data-role="button" data-icon="back" data-iconpos="notext"></a>
           
                        <a href="#" data-role="button" data-icon="home" data-iconpos="notext"></a>
                     </div>
           	 		 <h1>Smelling</h1>
                     <div data-role="listview" data-type="horizontal" class="ui-btn-right">
                 		<a href="#" data-role="button" data-icon="grid" data-iconpos="notext"></a>
                        <a href="#" data-role="button" data-icon="gear" data-iconpos="notext"></a>
                     </div>    
            	</div><!--end header -->
                <div data-role="content" class="container_12">
                           <table id="myTable" class="tablesorter"> 
<thead> 
<tr> 
    <th>Last Name</th> 
    <th>First Name</th> 
    <th>Email</th> 
    <th>Due</th> 
    <th>Web Site</th> 
</tr> 
</thead> 
<tbody> 
<tr> 
    <td>Smith</td> 
    <td>John</td> 
    <td>jsmith@gmail.com</td> 
    <td>$50.00</td> 
    <td>http://www.jsmith.com</td> 
</tr> 
<tr> 
    <td>Bach</td> 
    <td>Frank</td> 
    <td>fbach@yahoo.com</td> 
    <td>$50.00</td> 
    <td>http://www.frank.com</td> 
</tr> 
<tr> 
    <td>Doe</td> 
    <td>Jason</td> 
    <td>jdoe@hotmail.com</td> 
    <td>$100.00</td> 
    <td>http://www.jdoe.com</td> 
</tr> 
<tr> 
    <td>Conway</td> 
    <td>Tim</td> 
    <td>tconway@earthlink.net</td> 
    <td>$50.00</td> 
    <td>http://www.timconway.com</td> 
</tr> 
</tbody> 
</table> 
                </div><!--end content -->
            </div><!--end page -->
</body>
</html>
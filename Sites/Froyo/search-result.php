<?php
	$title_name = "search-result";
	include("./include/user_head.php");

	//it is temp
	$_SESSION[patient] = 100;
	$_SESSION[CN_id] = 10;
?>
			<div data-role="page">
        		<div data-role= "header" data-theme= "b">
						<div data-role="listview" data-type="horizontal" class="ui-btn-left">
							<a href="index.php" data-role="button" data-icon="home" >Home</a>	
                     	</div>
           	 		 <h1>No search found</h1>
<?php		include("./include/user_head_right.php"); ?>
            	</div><!--end header -->
                
                 <div data-role="content" class="container_12">
                    
                      		<div class="grid_12">
                            	<div class="space-box"></div>
                            </div>
                            
          					<div id="space-box-2" class="grid_12" data-theme= "b">
                            	<div class="ui-body-b ui-corner-all space-box-2">
                                <p>No result</p>
                                <div class="grid_12"><div class="space-box"></div></div>
                                 <div class="grid_3 "><div class="space-box"></div></div>
                      			 <div class="grid_6 ">	
                      			 <div class="space-box" >
                      				<a href="#" data-role="button" data-icon="plus" data-theme="b" >Add New Patient</a>
                      			 </div><!--end add new button -->
                     			 </div>	
                       			<div class="grid_3"><div class="space-box "></div></div>
                     
                            	
                                
                                </div>
                            </div>
                            
                            
                            
                            
                            
                 </div><!--end content -->           
           </div><!--end page -->
</body>
</html>

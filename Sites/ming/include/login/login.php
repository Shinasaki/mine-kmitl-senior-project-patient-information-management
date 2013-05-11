
<div data-role="page">
	<div data-role= "header" data-theme= "b">

		<h1>Patient Information Management System</h1>
	
	</div><!--end header -->
	<div data-role="content" class="container_12">
		<div class="grid_12 space-height"></div>
		<div class="grid_12">
			<div class="grid_12 space-height">
				<form id="frmLogin" action="<?=$rootpath?>./include/login/check.php" method="POST">
					<label for="username">Username</label>
					<div class="grid_12 space-height" ></div>
					<input type="text" name="username" id="username" value="" placeholder="Enter your username" />
					<div class="grid_12 space-height" ></div>
					<label for="password">Password</label>
					<div class="grid_12 space-height" ></div>
					<input type="password" name="password" id="password" value="" placeholder="Enter your password" />			
					<input name="" type="submit" value="Login"  data-theme="b">
		
				</form>
				</div><!--end login-wrapper-box-input -->
			</div><!--end grid_12 -->
			

	</div><!--end content -->
</div><!--endpage -->  
		
<?php
	include($rootpath."./include/user_bottom.php");
?>


<!DOCTYPE html> 
<html> 
<head> 
<title>Patient Information Management System in Hospital</title> 
 <meta name="viewport" content="width=device-width, initial-scale=1"> 
 <link rel="stylesheet" href="http://code.jquery.com/mobile/1.0/jquery.mobile-1.0.min.css" />
 <script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
<script src="http://code.jquery.com/mobile/1.0/jquery.mobile-1.0.min.js"></script>
<script type="text/javascript" src="js/jquery.mobile.actionsheet.js"></script><!-- -->
<script src="./include/js/canvas/canvas2image.js"></script>
<script src="./include/js/canvas/base64.js"></script>
<link href="css/jquery-mobile-fluid960.css" rel="stylesheet" type="text/css"> 
<link href="css/reset.css" rel="stylesheet" type="text/css">
<link href="css/main.css" rel="stylesheet" type="text/css">
<link href="css/jquery.mobile.actionsheet.css" rel="stylesheet" type="text/css">
<script type="text/javascript" charset="utf-8"> 	
	window.addEventListener('load',function(){
		// get the canvas element and its context
		var canvas = document.getElementById('sketchpad');
		var context = canvas.getContext('2d');
		
		// create a drawer which tracks touch movements
		var drawer = {
			isDrawing: false,
			touchstart: function(coors){
				context.beginPath();
				context.moveTo(coors.x, coors.y);
				this.isDrawing = true;
			},
			touchmove: function(coors){
				if (this.isDrawing) {
			        context.lineTo(coors.x, coors.y);
			        context.stroke();
				}
			},
			touchend: function(coors){
				if (this.isDrawing) {
			        this.touchmove(coors);
			        this.isDrawing = false;
				}
			}
		};
		// create a function to pass touch events and coordinates to drawer
		function draw(event){
			// get the touch coordinates
			var coors = {
				x: event.targetTouches[0].pageX,
				y: event.targetTouches[0].pageY
			};
			// pass the coordinates to the appropriate handler
			drawer[event.type](coors);
		}
		
		// attach the touchstart, touchmove, touchend event listeners.
	    canvas.addEventListener('touchstart',draw, false);
	    canvas.addEventListener('touchmove',draw, false);
	    canvas.addEventListener('touchend',draw, false);
		
		// prevent elastic scrolling
		document.body.addEventListener('touchmove',function(event){
			event.preventDefault();
		},false);	// end body.onTouchMove
	},false);	// end window.onLoad

	// show picture by change div
	function showPic(){
		var canvas = document.getElementById('sketchpad');
		var img    = canvas.toDataURL("image/png");
		var str = "<img src=\""+img+"\"/ >";
		document.getElementById("imgs").innerHTML = str;
	}

	// save picture (cannot set the file name, generate file name)
	function savePic()
	{
		var canvas = document.getElementById('sketchpad');
		Canvas2Image.saveAsPNG(canvas);
	}
</script>

</head>

<body>

<div data-role="page">
        		<div data-role= "header" data-theme= "b">

					<div data-role="listview" data-type="horizontal" class="ui-btn-left">
						<a href="main-cranialNerve.php" data-role="button" data-icon="back" >Back</a>
						<a href="index.php" data-role="button" data-icon="home" >Home</a>	
					</div>
           	 		 <h1>CN2 : Visual</h1>
 					  			<a data-role="actionsheet" data-icon="grid" class="ui-btn-right" >Setting</a>
								<div>							
									<a  data-role="button" href="#">	[<?php echo $_SESSION['username'] ?>]</a> 
								<br />
									<a data-role="button" href="logout.php" data-theme="b">Log Out</a>
								</div>

            	</div><!--end header -->
              
                 <div data-role="content" class="container_12">
				
			 
                 		<div class="grid_12 margin-btm"><h1  id="title-right-box-full-2">Visual Acuity</h1></div><!--end -->
                        <div id="title-right-box"class="grid_5 alpha"><h1>Right</h1></div><!--end -->  
                        <div id="title-left-box" class="grid_5"><h1>Left</h1></div><!--end -->
    
                        <div id="wrapper-eye" class="grid_6">
                   		  <img src="images/eye-right.png" width="121" height="68" alt="Right-Eye">
                       	</div>
           		   <div id="wrapper-eye" class="grid_6">
                        		<img src="images/eye-left.png" width="125" height="68" alt="Left-Eye">
                   </div>
			<div class="grid_6">
                            <label for="slider-1"></label>
                            <div data-role="fieldcontain" class="slider-bar">
                              <input type="range" name="slider2" id="slider2" value="20" min="0" max="100"  data-theme="a" data-track-theme="b"   />
							</div>
          </div><!--end slider left -->
                          
			<div class="grid_6">
                            <label for="slider-2"></label>
                            <div data-role="fieldcontain" class="slider-bar">
                              <input type="range" name="slider" id="slider" value="20" min="0" max="100"  data-theme="a" data-track-theme="b"   />
                            </div>
                     </div><!--end slider left -->
<div class="grid_6">
                            <label for="slider-3"></label>
                            <div data-role="fieldcontain" class="slider-bar">
                              <input type="range" name="slider" id="slider" value=20 min="0" max="100"  data-theme="a" data-track-theme="b"   />
                            </div>
                     </div><!--end slider right-->
			<div class="grid_6">
                            <label for="slider-4"></label>
                            <div data-role="fieldcontain" class="slider-bar">
                              <input type="range" name="slider" id="slider" value="20" min="0" max="100"  data-theme="a" data-track-theme="b"   />
                            </div>
             </div><!--end slider left -->
                         
                     <div class="grid_12">
                     		<div class="space-box"></div>                    
                     </div>    
					    
                  		<div class="grid_12 margin-btm">
                  		  <h1  id="title-right-box-full-2">Visual Field</h1></div><!--end -->
                        <div id="title-right-box"class="grid_5 alpha"><h1>Right</h1></div><!--end -->  
                        <div id="title-left-box" class="grid_5"><h1>Left</h1></div><!--end -->
						


                         <div class="grid_12"><!-- -->
						 <div id="container" >
                         	<canvas id="sketchpad" width="600" height="400">
									Sorry, your browser is not supported.
							</canvas>		
							<div>
								<a href="#" onclick="showPic(); " style="size: 10;">showPic</a>
							</div>
							<div>
								<a href="#" onclick="savePic(); ">savePic</a>
							</div>
							<div id="imgs"></div>
						</div>
						 </div>
    </div>	<!--end grid_6 -->
                         
	                     
         </div><!--end content -->
  </div><!--end page -->

<?php
/*
?> 
<?php
*/
?> 	

</body>
</html>

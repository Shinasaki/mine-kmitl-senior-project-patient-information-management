
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
					context.strokeStyle = "#09F";
					//context.fillStyle = "#333";
					context.lineWidth = 1;
			        context.stroke();
					
					//context.fillStyle = "#09F";
					//context.fill();
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
	function showPic(){
		var canvas = document.getElementById("sketchpad");
		var img    = canvas.toDataURL("image/png");
		document.write('<img src="'+img+'"/>');
		canvas2Image.saveAsPNG(canvas);
	}

	/*
	window.addEventListener('load',function(){
		// get the canvas element and its context
		var canvas1 = document.getElementById('sketchpad1');
		var context1 = canvas.getContext('2d');
		
		// create a drawer which tracks touch movements
		var drawer1 = {
			isDrawing: false,
			touchstart: function(coors1){
				context1.beginPath();
				context1.moveTo(coors1.x, coors1.y);
				this.isDrawing = true;
			},
			touchmove: function(coors1){
				if (this.isDrawing) {
			        context1.lineTo(coors1.x, coors1.y);
					context1.strokeStyle = "#09F";
					//context.fillStyle = "#333";
					context1.lineWidth = 20;
			        context1.stroke();
					
					//context.fillStyle = "#09F";
					//context.fill();
				}
			},
			touchend: function(coors1){
				if (this.isDrawing) {
			        this.touchmove(coors1);
			        this.isDrawing = false;
				}
			}
		};
		// create a function to pass touch events and coordinates to drawer
		function draw1(event){
			// get the touch coordinates
			var coors1 = {
				x: event.targetTouches[0].pageX,
				y: event.targetTouches[0].pageY
			};
			// pass the coordinates to the appropriate handler
			drawer1[event.type](coors1);
		}
		
		// attach the touchstart, touchmove, touchend event listeners.
	    canvas1.addEventListener('touchstart',draw1, false);
	    canvas1.addEventListener('touchmove',draw1, false);
	    canvas1.addEventListener('touchend',draw1, false);
		
		// prevent elastic scrolling
		document.body.addEventListener('touchmove',function(event){
			event.preventDefault();
		},false);	// end body.onTouchMove

//###################################

		// get the canvas element and its context
		var canvas2 = document.getElementById('sketchpad2');
		var context2 = canvas.getContext('2d');
		
		// create a drawer which tracks touch movements
		var drawer2 = {
			isDrawing: false,
			touchstart: function(coors2){
				context2.beginPath();
				context2.moveTo(coors2.x, coors2.y);
				this.isDrawing = true;
			},
			touchmove: function(coors2){
				if (this.isDrawing) {
			        context2.lineTo(coors2.x, coors2.y);
					context2.strokeStyle = "#09F";
					//context.fillStyle = "#333";
					context2.lineWidth = 20;
			        context2.stroke();
					
					//context.fillStyle = "#09F";
					//context.fill();
				}
			},
			touchend: function(coors2){
				if (this.isDrawing) {
			        this.touchmove(coors2);
			        this.isDrawing = false;
				}
			}
		};
		// create a function to pass touch events and coordinates to drawer
		function draw2(event){
			// get the touch coordinates
			var coors2 = {
				x: event.targetTouches[0].pageX,
				y: event.targetTouches[0].pageY
			};
			// pass the coordinates to the appropriate handler
			drawer2[event.type](coors2);
		}
		
		// attach the touchstart, touchmove, touchend event listeners.
	    canvas2.addEventListener('touchstart',draw2, false);
	    canvas2.addEventListener('touchmove',draw2, false);
	    canvas2.addEventListener('touchend',draw2, false);
		
		// prevent elastic scrolling
		document.body.addEventListener('touchmove',function(event){
			event.preventDefault();
		},false);	// end body.onTouchMove


	},false);	// end window.onLoad
//#################
	function showPic1(){
		var canvas1 = document.getElementById("sketchpad1");
		var img1    = canvas1.toDataURL("image/png");
		document.write('<img src="'+img1+'"/>');
		canvas2Image.saveAsPNG(canvas1);
	}
//###############################
	function showPic2(){
		var canvas2 = document.getElementById("sketchpad2");
		var img2    = canvas2.toDataURL("image/png");
		document.write('<img src="'+img2+'"/>');
		canvas2Image.saveAsPNG(canvas2);
	}
	*/
	
</script>

    <style type="text/css">
   
		
	#container{position:relative;}
		#sketchpad{ border: 1px solid #000;}
    </style> 

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
									<a  data-role="button" href="#">	[<?PHP echo $_SESSION['username'] ?>]</a> 
								<br />
									<a data-role="button" href="logout.php" data-theme="b">Log Out</a>
								</div>

            	</div><!--end header -->
               
                 <div data-role="content" class="container_12">
				
<?php

?>
				 
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
                         
<?php

?> 	
                     <div class="grid_12">
                     		<div class="space-box"></div>                    
                     </div>    
					    
                  		<div class="grid_12 margin-btm">
                  		  <h1  id="title-right-box-full-2">Visual Field</h1></div><!--end -->
                        <div id="title-right-box"class="grid_5 alpha"><h1>Right</h1></div><!--end -->  
                        <div id="title-left-box" class="grid_5"><h1>Left</h1></div><!--end -->
						


                         <div class="grid_12"><!-- -->
						 <div id="container" >
                         	<canvas id="sketchpad" width="2000" height="3000">
									Sorry, your browser is not supported.
							</canvas>		
							<a href="#" onClick="showPic(); ">click</a>
						</div>
						 </div>
                         <!--div class="grid_6">
						 <div id="container2">
                         	<canvas id="sketchpad2" width="332" height="324">
									Sorry, your browser is not supported.
							</canvas>		
							<a href="#" onClick="showPic2(); ">click</a>
						</div>
						 </div-->
    </div>	<!--end grid_6 -->
                          
                     
         </div><!--end content -->
  </div><!--end page -->
</body>
</html>

	window.addEventListener('load',function(){
		// get the canvas element and its context
		var canvas = document.getElementById('sketchpad');
		var context = canvas.getContext('2d');
		
		// create a drawer which tracks touch movements
		var drawer = {
			isDrawing: false,
			touchstart: function(coors){
				context.beginPath();
				context.moveTo(coors.x - 28 -35, coors.y - 135 + 45 -58 + 50);
				this.isDrawing = true;
			},
			touchmove: function(coors){
				if (this.isDrawing) {
			        context.lineTo(coors.x -28 -35 , coors.y - 135 + 45 -58 +50);
				//	context.strokeStyle = "#09F";
				//	context.lineWidth = 10;
				//	context.stroke();

					context.fillStyle = "#09F";
					context.fill();
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
	function CN2_R_showPic()
	{
		var canvas	= document.getElementById('sketchpad');
		var img		= canvas.toDataURL("image/png");
	//		img		= img.replace('data:image/png;base64,', '');
		var str		= "<img src=\""+img+"\"/ >";
		document.getElementById("imgs").innerHTML = str;
		
		//var oImgPNG = Canvas2Image.saveAsPNG(canvas, true);
		//document.getElementById("imgs").innerHTML = oImgPNG;
	}

	// save picture (cannot set the file name, generate file name)
	function CN2_R_savePic()
	{
		var canvas = document.getElementById('sketchpad');
//		window.location("include/js/canvas/save.php");
//		image = Canvas2Image.saveAsPNG(canvas);
//		document.getElementById("image").innerHTML = image;

		//Canvas2Image.saveAsPNG(canvas);
		//Canvas2Image.saveAsPNG(canvas);
		
		
		//## new version
		var imgR    = canvas.toDataURL("image/png");
		document.getElementById("imageR").value = imgR;
//		document.getElementById("CN2VFform").submit();
	}

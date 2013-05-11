	window.addEventListener('load',function(){
		// get the canvasL element and its contextL
		var canvasL = document.getElementById('sketchpadL');
		var contextL = canvasL.getContext('2d');
		
		// create a drawer which tracks touch movements
		var drawer = {
			isDrawing: false,
			touchstart: function(coors){
				contextL.beginPath();
				contextL.moveTo(coors.x - 23 - 39 - 365 + 44 -100 +15, coors.y - 135 + 45 - 50 +50);
				this.isDrawing = true;
			},
			touchmove: function(coors){
				if (this.isDrawing) {
			        contextL.lineTo(coors.x - 23 - 39 - 365 + 44 -100 +15, coors.y - 135 + 45 -50 +50);
				//	contextL.strokeStyle = "#09F";
				//	contextL.lineWidth = 10;
				//	contextL.stroke();

					contextL.fillStyle = "#09F";
					contextL.fill();
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
	    canvasL.addEventListener('touchstart',draw, false);
	    canvasL.addEventListener('touchmove',draw, false);
	    canvasL.addEventListener('touchend',draw, false);
		
		// prevent elastic scrolling
		document.body.addEventListener('touchmove',function(event){
			event.preventDefault();
		},false);	// end body.onTouchMove
	},false);	// end window.onLoad

	// show picture by change div
	function CN2_L_showPic()
	{
		var canvasL = document.getElementById('sketchpadL');
		var img    = canvasL.toDataURL("image/png");
		var str = "<img src=\""+img+"\"/>";
		
		document.getElementById("imgs").innerHTML = str;
	}

	// save picture (cannot set the file name, generate file name)
	function CN2_L_savePic()
	{
		var canvasL = document.getElementById('sketchpadL');
		//return canvasL.toDataURL("image/png");
		//canvas2Image.saveAsPNG(canvasL);
		
		//## new version
		var imgL    = canvasL.toDataURL("image/png");
		document.getElementById("imageL").value = imgL;
//		document.getElementById("CN2VFform").submit();
	}
	
	function CN2_VF_submit_oldVersion()
	{
		CN2_R_savePic(); 
		CN2_L_savePic();
		document.getElementById("CN2VFform").submit();
	}
	function CN2_VF_submit()
	{
		var canvas = document.getElementById('sketchpad');
		var imgR    = canvas.toDataURL("image/png");
		document.getElementById("imageR").value = imgR;
		
		var canvasL = document.getElementById('sketchpadL');
		var imgL    = canvasL.toDataURL("image/png");
		document.getElementById("imageL").value = imgL;
		
		document.getElementById("CN2VFform").submit();
	}

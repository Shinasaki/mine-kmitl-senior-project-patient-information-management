function CN2_submit_back(){
	document.getElementById("locationPath").value = "./main-cranialNerve.php";
	document.getElementById("CN2Form").submit();
}
function CN2_submit_home(){
	document.getElementById("locationPath").value = "./";
	document.getElementById("CN2Form").submit();
}
function visualField(zone, value)
{
	var str = "";			//zone is means where is clicked
	var str2 = "";
	var valueR2 = "";
	var valueL2 = "";

	var imgSrcR = new Array();

	imgSrcR[0] = "images/cn2-visual-upper-r.png";
	imgSrcR[1] = "images/cn2-visual-upper-l.png";
	imgSrcR[2] = "images/cn2-visual-lower-r.png";
	imgSrcR[3] = "images/cn2-visual-lower-l.png";

	var imgSrcR2 = new Array();

	imgSrcR2[0] = "images/cn2-visual-upper-blank-r.png";
	imgSrcR2[1] = "images/cn2-visual-upper-blank-l.png";
	imgSrcR2[2] = "images/cn2-visual-lower-blank-r.png";
	imgSrcR2[3] = "images/cn2-visual-lower-blank-l.png";

	var imgSrcL = new Array();

	imgSrcL[0] = "images/cn2-visual-upper-r.png";
	imgSrcL[1] = "images/cn2-visual-upper-l.png";
	imgSrcL[2] = "images/cn2-visual-lower-r.png";
	imgSrcL[3] = "images/cn2-visual-lower-l.png";

	var imgSrcL2 = new Array();

	imgSrcL2[0] = "images/cn2-visual-upper-blank-r.png";
	imgSrcL2[1] = "images/cn2-visual-upper-blank-l.png";
	imgSrcL2[2] = "images/cn2-visual-lower-blank-r.png";
	imgSrcL2[3] = "images/cn2-visual-lower-blank-l.png";


	for(i=1; i<=4; i++) {
		if(zone == ("R"+i)){
			if(value == 0){
				value2R = 1;
				str = "<a href=\"#\" onclick=\"visualField('R"+i+"', '"+value2R+"' ); \"><img src=\""+imgSrcR[i-1]+"\"></a>";

			}
			else if(value == 1){
				value2R = 0;
				str = "<a href=\"#\" onclick=\"visualField('R"+i+"', '"+value2R+"' ); \"><img src=\""+imgSrcR2[i-1]+"\" ></a>";
			}
			document.getElementById("valueR"+i).value=value2R;
			document.getElementById("R"+i).innerHTML = str;
		}
		else if(zone == ("L"+i)){
			if(value == 0){
				value2L = 1;
				str2 = "<a href=\"#\" onclick=\"visualField('L"+i+"', '"+value2L+"' ); \"><img src=\""+imgSrcL[i-1]+"\"></a>";
			}
			else if(value == 1){
				value2L = 0;
				str2 = "<a href=\"#\" onclick=\"visualField('L"+i+"', '"+value2L+"' ); \"><img src=\""+imgSrcL2[i-1]+"\" ></a>";
			}
			document.getElementById("valueL"+i).value=value2L;
			document.getElementById("L"+i).innerHTML = str2;
		}
	}

//	eyeChange(zone, value);
/*	
	str += "";

	for(i=1; i<=4; i++) {
		if(zone == ("R"+i)){
			document.getElementById("R"+i).innerHTML = str;
		}
		else if(zone == ("L"+i)){
			document.getElementById("L"+i).innerHTML = str;
		}
	}
*/
}


function eyeChange(zone, value)
{
	var i;
	for(i=1; i<=4; i++) {
		if(zone == ("R"+i)){
			if(value == 0){
				document.getElementById("valueR"+i).value="1";
			}
			else if(value == 1){
				document.getElementById("valueR"+i).value="0";
			}
		}
		if(zone == ("L"+i)){
			if(value == 0){
				document.getElementById("valueL"+i).value="1";
			}
			else if(value == 1){
				document.getElementById("valueL"+i).value="0";
			}
		}
	}
}

function test(){
	document.getElementById("test").innerHTML = "test";
}

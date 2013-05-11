function CN5_submit_back(){
	document.getElementById("locationPath").value = "./main-cranialNerve.php";
	document.getElementById("CN5Form").submit();
}
function CN5_submit_home(){
	document.getElementById("locationPath").value = "./";
	document.getElementById("CN5Form").submit();
}

function CN5_sensory(zone, value)
{
	var value2R = "";
	var value2L = "";
	var str = "";
	for(i=1; i<=3; i++) {
		if(zone == "sensoryR"+i)
		{
			if(value == 0){
				value2R = 1;
				str = "<a href=\"#\" onclick=\"CN5_sensory('sensoryR"+i+"', '"+value2R+"'); \"><img src=\"images/cn5-v"+i+"-r.png\"></a>";
			}
			if(value == 1){
				value2R = 0;
				str = "<a href=\"#\" onclick=\"CN5_sensory('sensoryR"+i+"', '"+value2R+"'); \"><img src=\"images/cn5-v"+i+"-r-blank.png\"></a>";
			}
			document.getElementById("CN5_sensoryR"+i).value = value2R;
			document.getElementById("CN5_sensory_R"+i).innerHTML = str;
		}
		else if(zone == "sensoryL"+i)
		{
			if(value == 0){
				value2L = 1;
				str = "<a href=\"#\" onclick=\"CN5_sensory('sensoryL"+i+"', '"+value2L+"'); \"><img src=\"images/cn5-v"+i+"-l.png\"></a>";
			}
			if(value == 1){
				value2L = 0;
				str = "<a href=\"#\" onclick=\"CN5_sensory('sensoryL"+i+"', '"+value2L+"'); \"><img src=\"images/cn5-v"+i+"-l-blank.png\"></a>";
			}
			document.getElementById("CN5_sensoryL"+i).value = value2L;
			document.getElementById("CN5_sensory_L"+i).innerHTML = str;
		}
	}
}
function CN5_returnSensory()
{

}

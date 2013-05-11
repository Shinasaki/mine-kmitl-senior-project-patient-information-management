/*
function check_sterno(fieldvalue)
{    
	switch(fieldvalue)
	{
		if(fieldvalue == 1){
			document.getElementById("wrapper-sternovleido").innerHTML = "<img src=\"images/cn11-good.png\">";
		}
		else if(fieldvalue == 2){
			document.getElementById("wrapper-sternovleido").innerHTML = "<img src=\"images/cn11-weak.png\">"; 
		}
	}
}
*/
function CN11_submit(path)
{
	if(path == "back"){
		document.CN11form.location.value = "./main-cranialNerve.php";
	}
	else if(path == "home"){
		document.CN11form.location.value = "./";
	}
	document.CN11form.submit();
}

function CN11_check_sterno(fieldvalue)
{    
	switch(fieldvalue)
	{
		case 1:
			document.getElementById("wrapper-sternovleido").innerHTML = "<img src='images/cn11-good.png'>";
			break;
		case 2:
			document.getElementById("wrapper-sternovleido").innerHTML = "<img src='images/cn11-weak.png'>"; 
			break;
	}
}

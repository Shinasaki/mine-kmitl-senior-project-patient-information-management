function showNose(right, left)
{
	if(right == 1)
	{
		document.getElementById("wrapper-nose-right").innerHTML = "<img src=\"images/cn1-good.png\">";
	}
	else if(right == 2)
	{
		document.getElementById("wrapper-nose-right").innerHTML = "<img src=\"images/cn1-anosmia.png\">"; 
	}
	if(left == 1)
	{
		document.getElementById("wrapper-nose-left").innerHTML = "<img src=\"images/cn1-good.png\">";
	}
	else if(left == 2)
	{
		document.getElementById("wrapper-nose-left").innerHTML = "<img src=\"images/cn1-anosmia.png\">"; 
	}
}


function check_rightNose(fieldvalue)
{    
	if(fieldvalue == "1")
	{
		document.getElementById("wrapper-nose-right").innerHTML = "<img src=\"images/cn1-good.png\">";
	}
	else if(fieldvalue == "2")
	{
		document.getElementById("wrapper-nose-right").innerHTML = "<img src=\"images/cn1-anosmia.png\">"; 
	}
}
function check_leftNose(fieldvalue)
{    
	if(fieldvalue == 1)
	{
		document.getElementById("wrapper-nose-left").innerHTML = "<img src=\"images/cn1-good.png\">";
	}
	else if(fieldvalue == 2)
	{
		document.getElementById("wrapper-nose-left").innerHTML = "<img src=\"images/cn1-anosmia.png\">"; 
	}
}
function test()
{
	document.getElementFromId("test").innerHTML = "test";
}

function CN12_submit(page)
{
	if(page == "back"){
		document.getElementById('location').value = "back" ;
	}
	else if(page == "home"){
		document.getElementById('location').value = "home" ;
	}
	document.getElementById('CN12form').submit();
}

function check_rightTongue(fieldvalue)
{    
	switch(fieldvalue)
	{
		case 1:

		document.getElementById("wrapper-tongue-right").innerHTML = "<img src='images/cn12-normal.png'>";
		break;

		case 2:

		document.getElementById("wrapper-tongue-right").innerHTML = "<img src='images/cn12-atrophy.png'>"; 
		break;

	}
}
function check_leftTongue(fieldvalue)
{    
	switch(fieldvalue)
	{
	case 1:

	document.getElementById("wrapper-tongue-left").innerHTML = "<img src='images/cn12-normal.png'>";
	break;

	case 2:

	document.getElementById("wrapper-tongue-left").innerHTML = "<img src='images/cn12-atrophy.png'>"; 
	break;

	}
}



function check_rightEar(fieldvalue)
{    
	switch(fieldvalue)
	{
	case 1:

		document.getElementById("wrapper-ear-right").innerHTML = "<img src='images/cn8-good-r.png'>";
			break;

	case 2:

		document.getElementById("wrapper-ear-right").innerHTML = "<img src='images/cn8-serviceable-r.png'>"; 
			break;
		
	case 3:

		document.getElementById("wrapper-ear-right").innerHTML = "<img src='images/cn8-non-serviceable-r.png'>"; 
			break;

	}
}
function check_leftEar(fieldvalue)
{    
	switch(fieldvalue)
	{
	case 1:

		document.getElementById("wrapper-ear-left").innerHTML = "<img src='images/cn8-good-l.png'>";
			break;

	case 2:

		document.getElementById("wrapper-ear-left").innerHTML = "<img src='images/cn8-serviceable-l.png'>"; 
			break;
		
	case 3:

		document.getElementById("wrapper-ear-left").innerHTML = "<img src='images/cn8-non-serviceable-l.png'>"; 
			break;

	}
}

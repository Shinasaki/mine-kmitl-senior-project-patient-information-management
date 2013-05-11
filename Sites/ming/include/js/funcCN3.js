function CN3_submit(path)
{
	if(path == "back"){
		document.CN3Form.location.value = "./main-cranialNerve.php";
//		document.getElementById("CN3location").value = "./main-cranialNerve.php";
		document.CN3Form.submit();
	}
	else if(path == "home"){
		document.CN3Form.location.value = "./";
		document.CN3Form.submit();
	}
	else if(path == "RHS"){
		document.CN3FormRHS.location.value = "./cn3_4_6-EOM.php";
		document.CN3FormRHS.submit();
	}
	else if(path == "LHS"){
		document.CN3FormLHS.location.value = "./cn3_4_6-EOM_LHS.php";
		document.CN3FormLHS.submit();
	}
	
}

function CN3_eye()
{
	var position = document.getElementById("oem").value;
	var str = "";
	position2 = -85+(-1*parseInt(position));
	str += "<img src\=\"images/cn3-4-6-pupil-right.png\" style=\"position:relative; top: 50px; right: "+position2+"px; \" alt=\"pupil\">";
	str += "";

	document.getElementById("imageEyeR").innerHTML = str;
	document.getElementById("imageEyeL").innerHTML = str;
	
	document.getElementById("R_oem").value = position;
	document.getElementById("L_oem").value = position;

	$('#R_oem').slider('refresh');
	$('#L_oem').slider('refresh');
}

function CN3_eyeR()
{
	var positionR = document.getElementById("R_oem").value;
	var strR = "";
	positionR = -85+(-1*parseInt(positionR));
	strR += "<img src\=\"images/cn3-4-6-pupil-right.png\" style=\"position:relative; top: 50px; right: "+positionR+"px; \" alt=\"pupil\">";
	strR += "";
	document.getElementById("imageEyeR").innerHTML = strR;
	
//	$('#R_oem').slider('refresh');
}
function CN3_eyeL()
{
	var positionL = document.getElementById("L_oem").value;
	var strL = "";
	positionL = -85+(-1*parseInt(positionL));
	strL += "<img src\=\"images/cn3-4-6-pupil-left.png\" style=\"position:relative; top: 50px; right: "+positionL+"px; \" alt=\"pupil\">";
	strL += "";
	document.getElementById("imageEyeL").innerHTML = strL;
	
//	$('#L_oem').slider('refresh');
}

/*
function CN3_eyeRa(a)
{
	var position = a;
	var str = "";
	position = -84+position;
	str += "<img src\=\"images/cn3-4-6-pupil-right.png\" style=\"position:relative; top: 50px; right: "+position+"px; \" alt=\"pupil\">";
	str += position;
	document.getElementById("imageEyeR").innerHTML = str;
}
*/
/*
function testcn3(){
	document.getElementById("testcn3").innerHTML = "test";
}
*/


function CN3_eye_part2R()
{
	var str = "";


	str +="		<div class=\"grid_6\"> ";
	str +="			<div  id=\"eom-eye-value-right\"> ";
	str +="				<div data-role=\"fieldcontain\" > ";
	str +="					<input type=\"range\" name=\"R_oem\" id=\"R_oem\" onChange=\"CN3_eyeR(); \" value=\"$R_oem\" min=\"-50\" max=\"50\"  data-theme=\"a\" data-track-theme=\"b\" class = \" ui-field-contain ui-body ui-br \"/> ";
	str +="				</div> ";
	str +="			</div> ";
	str +="		</div> ";
	
	str +="		<div class=\"grid_6\"> ";
	str +="			<div id=\"eom-eye-value-left\"> ";
	str +="				<div data-role=\"fieldcontain\" class=\"ui-field-contain ui-body ui-br\"> ";
	str +="					<input type=\"number\" data-type=\"range\" name=\"L_oem\" id=\"L_oem\" onchange=\"CN3_eyeL(); \" value=\"0\" min=\"-50\" max=\"50\" data-theme=\"a\" data-track-theme=\"b\" class=\"ui-slider-input ui-input-text ui-body-a ui-corner-all ui-shadow-inset\"> ";
	str +="					<div class=\"ui-slider  ui-btn-down-b ui-btn-corner-all\" role=\"application\"><a href=\"#\" class=\"ui-slider-handle ui-btn ui-btn-up-a ui-btn-corner-all ui-shadow\" data-theme=\"a\" role=\"slider\" aria-valuemin=\"-50\" aria-valuemax=\"50\" aria-valuenow=\"0\" aria-valuetext=\"0\" title=\"0\" aria-labelledby=\"L_oem-label\" style=\"left: 50%; \"><span class=\"ui-btn-inner ui-btn-corner-all\"><span class=\"ui-btn-text\"></span></span></a></div> ";
	str +="				</div> ";
	str +="			</div> ";
	str +="		</div> ";
	
	document.getElementById("CN3_part2").innerHTML = str;
}

function CN3_eye_part2L()
{
	var str = "";
	str +="		<div class=\"grid_6\"> ";
	str +="			<div id=\"eom-eye-value-right\"> ";
	str +="				<div data-role=\"fieldcontain\" class=\"ui-field-contain ui-body ui-br\"> ";
	str +="					<input type=\"number\" data-type=\"range\" name=\"R_oem\" id=\"R_oem\" onchange=\"CN3_eyeR(); \" value=\"$R_oem\" min=\"-50\" max=\"50\" data-theme=\"a\" data-track-theme=\"b\" class=\"ui-slider-input ui-input-text ui-body-a ui-corner-all ui-shadow-inset\"> ";
	str +="				</div> ";
	str +="			</div> ";
	str +="		</div> ";
	
	str +="		<div class=\"grid_6\"> ";
	str +="			<div id=\"eom-eye-value-left\"> ";
	str +="				<div data-role=\"fieldcontain\" class=\"ui-field-contain ui-body ui-br\"> ";
	str +="					<input type=\"number\" data-type=\"range\" name=\"L_oem\" id=\"L_oem\" onchange=\"CN3_eyeL(); \" value=\"$R_oem\" min=\"-50\" max=\"50\" data-theme=\"a\" data-track-theme=\"b\" class=\"ui-slider-input ui-input-text ui-body-a ui-corner-all ui-shadow-inset\"> ";
	str +="					<div class=\"ui-slider  ui-btn-down-b ui-btn-corner-all\" role=\"application\"><a href=\"#\" class=\"ui-slider-handle ui-btn ui-btn-up-a ui-btn-corner-all ui-shadow\" data-theme=\"a\" role=\"slider\" aria-valuemin=\"-50\" aria-valuemax=\"50\" aria-valuenow=\"0\" aria-valuetext=\"0\" title=\"0\" aria-labelledby=\"L_oem-label\" style=\"left: 50%; \"><span class=\"ui-btn-inner ui-btn-corner-all\"><span class=\"ui-btn-text\"></span></span></a></div> ";
	str +="				</div> ";
	str +="			</div> ";
	str +="		</div> ";
	
	document.getElementById("CN3_part2").innerHTML = str;
}

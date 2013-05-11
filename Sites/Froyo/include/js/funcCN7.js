function CN7_submit_back()
{
	document.CN7Form.location.value = "main-cranialNerve.php";
	document.CN7Form.submit();
}
function CN7_submit_home()
{
	document.CN7Form.location.value = "./";
	document.CN7Form.submit();
}
//$("input[type='radio']").checkboxradio({ theme: "a" });

function eyeR1()
{
	document.getElementById("eyeR1").checked = "checked";
}
function eyeR2()
{
	document.getElementById("eyeR1").checked = "checked";
}
function eyeL1()
{
	document.getElementById("eyeL1").checked = "checked";
}
function eyeL2()
{
	document.getElementById("eyeL1").checked = "checked";
}

function CN7zoneRU(ch)
{
	var str = "";
/*
	str += "<div class=\"ui-radio ui-disabled\">";
	str += "	<input type=\"radio\" name=\"eyeR\" id=\"eyeR1\" value=\"choice-1\" disabled=\"disabled\" ";
	if(ch == 1){
		str += "checked=\"checked\"";
	}
	str += " />";
	str += "		<label for=\"eyeR1\" data-theme=\"c\" class=\"ui-btn ui-btn-up-c ui-radio-on ui-btn-active ui-corner-left\">Can closed the eye</label>";

	str += "	<input type=\"radio\" name=\"eyeR\" id=\"eyeR2\" value=\"choice-2\" disabled=\"disabled\" ";
	if(ch == 2){
		str += "checked=\"checked\"";
	}
	str += " />";
	str += "		<label for=\"eyeR2\">Can not closed the eye</label>";
	str += "</div>";
*/
/*
	str +="<div class=\"ui-radio ui-disabled\">";
	str +="		<input type=\"radio\" name=\"eyeR\" id=\"eyeR1\" value=\"choice-1\" disabled=\"disabled\" ";
	if(ch == 1){
		str += "checked=\"checked\"";
	}
	str += " />";
	str +="			<label for=\"eyeR1\" data-theme=\"c\" class=\"ui-btn ui-btn-up-c ui-radio-on ui-btn-active ui-corner-left\">";
	str +="				<span class=\"ui-btn-inner ui-corner-left\">";
	str +="					<span class=\"ui-btn-text\">";
	str +="						Can closed the eye";
	str +="					</span>";
	str +="				</span>";
	str +="			</label>";
	str +="		</input>";
	str +="</div>";


	str +="<div class=\"ui-radio ui-disabled\"><input type=\"radio\" name=\"eyeR\" id=\"eyeR2\" value=\"choice-2\" disabled=\"disabled\" ";
	if(ch == 2){
		str += "checked=\"checked\"";
	}
	str +=" />";
	str +="		<label for=\"eyeR2\" data-theme=\"c\" class=\"ui-btn ui-btn-up-c ui-radio-off ui-corner-right ui-controlgroup-last\">";
	str +="			<span class=\"ui-btn-inner ui-corner-right ui-controlgroup-last\">";
	str +="				<span class=\"ui-btn-text\">Can not closed the eye</span>";
	str +="			</span>";
	str +="		</label>";
	str +="</div>";
	str +="":
	str +="";
*/
/*
	str +="<div class=\"ui-radio ui-disabled\">";
	str +="		<input type=\"radio\" name=\"eyeR\" id=\"eyeR2\" value=\"choice-2\" disabled=\"disabled\" ";
	if(ch == 2){
		str += "checked=\"checked\"";
	}
	str +=" />";
	str +="			<label for=\"eyeR2\" data-theme=\"c\" class=\"ui-btn ui-btn-up-c ui-radio-on ui-btn-active ui-corner-right\">";
	str +="				<span class=\"ui-btn-inner ui-corner-left\">";
	str +="					<span class=\"ui-btn-text\">";
	str +="						Can not closed the eye";
	str +="					</span>";
	str +="				</span>";
	str +="			</label>";
	str +="		</input>";
	str +="</div>";
*/


	if(ch == "1"){
		str+="<div class=\"ui-radio ui-disabled\"><input type=\"radio\" name=\"eyeR\" id=\"eyeR1\" value=\"choice-1\" checked=\"checked\" disabled=\"\"><label for=\"eyeR1\" data-theme=\"c\" class=\"ui-btn ui-btn-up-c ui-radio-on ui-btn-active ui-corner-left\"><span class=\"ui-btn-inner ui-corner-left\"><span class=\"ui-btn-text\">Can closed the eye</span></span></label></div>";
		str+="<div class=\"ui-radio ui-disabled\"><input type=\"radio\" name=\"eyeR\" id=\"eyeR2\" value=\"choice-2\" disabled=\"\"><label for=\"eyeR2\" data-theme=\"c\" class=\"ui-btn ui-btn-up-c ui-radio-off ui-corner-right ui-controlgroup-last\"><span class=\"ui-btn-inner ui-corner-right ui-controlgroup-last\"><span class=\"ui-btn-text\">Can not closed the eye</span></span></label></div>";
	}
	else if(ch == "2"){
		str +="<div class=\"ui-radio ui-disabled\"><input type=\"radio\" name=\"eyeR\" id=\"eyeR1\" value=\"choice-1\" disabled=\"\"><label for=\"eyeR1\" data-theme=\"c\" class=\"ui-btn ui-btn-up-c ui-radio-off ui-corner-left\"><span class=\"ui-btn-inner ui-corner-left\"><span class=\"ui-btn-text\">Can closed the eye</span></span></label></div>";
		str +="<div class=\"ui-radio ui-disabled\"><input type=\"radio\" name=\"eyeR\" id=\"eyeR2\" value=\"choice-2\" checked=\"checked\" disabled=\"\"><label for=\"eyeR2\" data-theme=\"c\" class=\"ui-btn ui-btn-up-c ui-radio-on ui-btn-active ui-corner-right ui-controlgroup-last\"><span class=\"ui-btn-inner ui-corner-right ui-controlgroup-last\"><span class=\"ui-btn-text\">Can not closed the eye</span></span></label></div>";
	}


	str +="";
	str +="";
	document.getElementById("CN7zoneRU").innerHTML = str;
}
function CN7zoneLU(ch)
{
	var str = "";
/*
	str += "<div class=\"ui-radio ui-disabled\">";
	str += "	<input type=\"radio\" name=\"eyeL\" id=\"eyeL1\" value=\"choice-1\" disabled=\"disabled\" ";
	if(ch == 1){
		str += "checked=\"checked\"";
	}
	str += " />";
	str += "		<label for=\"eyeL1\" data-theme=\"c\" class=\"ui-btn ui-btn-up-c ui-radio-on ui-btn-active ui-corner-left\">Can closed the eye</label>";
	str += "	<input type=\"radio\" name=\"eyeL\" id=\"eyeL2\" value=\"choice-2\" disabled=\"disabled\" ";
	if(ch == 2){
		str += "checked=\"checked\"";
	}
	str += " />";
	str += "		<label for=\"eyeL2\">Can not closed the eye</label>";
	str += "</div>";
*/

	if(ch == "1"){
		str += "<div class=\"ui-radio ui-disabled\"><input type=\"radio\" name=\"eyeL\" id=\"eyeL1\" value=\"choice-1\" checked=\"checked\" disabled=\"\"><label for=\"eyeL1\" data-theme=\"c\" class=\"ui-btn ui-btn-up-c ui-radio-on ui-btn-active ui-corner-left\"><span class=\"ui-btn-inner ui-corner-left\"><span class=\"ui-btn-text\">Can closed the eye</span></span></label></div>";
		str += "<div class=\"ui-radio ui-disabled\"><input type=\"radio\" name=\"eyeL\" id=\"eyeL2\" value=\"choice-2\" disabled=\"\"><label for=\"eyeL2\" data-theme=\"c\" class=\"ui-btn ui-btn-up-c ui-radio-off ui-corner-right ui-controlgroup-last\"><span class=\"ui-btn-inner ui-corner-right ui-controlgroup-last\"><span class=\"ui-btn-text\">Can not closed the eye</span></span></label></div>";
	}
	else if(ch == "2"){
		str += "<div class=\"ui-radio ui-disabled\"><input type=\"radio\" name=\"eyeL\" id=\"eyeL1\" value=\"choice-1\" disabled=\"\"><label for=\"eyeL1\" data-theme=\"c\" class=\"ui-btn ui-btn-up-c ui-radio-off ui-corner-left\"><span class=\"ui-btn-inner ui-corner-left\"><span class=\"ui-btn-text\">Can closed the eye</span></span></label></div>";
		str += "<div class=\"ui-radio ui-disabled\"><input type=\"radio\" name=\"eyeL\" id=\"eyeL2\" value=\"choice-2\" checked=\"checked\" disabled=\"\"><label for=\"eyeL2\" data-theme=\"c\" class=\"ui-btn ui-btn-up-c ui-radio-on ui-btn-active ui-corner-right ui-controlgroup-last\"><span class=\"ui-btn-inner ui-corner-right ui-controlgroup-last\"><span class=\"ui-btn-text\">Can not closed the eye</span></span></label></div>";
	}
	document.getElementById("CN7zoneLU").innerHTML = str;
}

function zoneR1()
{
	var str="";

	str += "<div class=\"grid_6\">";
	str += "	<fieldset data-role=\"controlgroup\" class=\"ui-corner-all ui-controlgroup ui-controlgroup-horizontal\">";
	str += "		<input type=\"radio\" name=\"choiceR\" id=\"choice1R\" value=\"choice-1\" />";
	str += "		<label for=\"choice1R\">Normal</label>";

	str += "		<input type=\"radio\" name=\"choiceR\" id=\"choice2R\" value=\"choice-2\"  />";
	str += "		<label for=\"choice2R\">Weak Less</label>";

	str += "		<input type=\"radio\" name=\"choiceR\" id=\"choice3R\" value=\"choice-3\"  />";
	str += "		<label for=\"choice3R\">Weak More</label>";
	str += "	</fieldset>";
	str += "</div>";

/*
	str += "		<fieldset data-role=\"controlgroup\" class=\"ui-corner-all ui-controlgroup ui-controlgroup-vertical\">";
	str += "			<div class=\"ui-radio\">";
	str += "				<input type=\"radio\" name=\"choiceR\" id=\"choice1R\" value=\"choice-1\">";
	str += "				<label for=\"choice1R\" data-theme=\"c\" class=\"ui-btn ui-btn-up-c ui-btn-icon-left ui-radio-off ui-corner-top\">";
	str += "					<span class=\"ui-btn-inner ui-corner-top\">";
	str += "						<span class=\"ui-btn-text\">Normal</span>";
	str += "							<span class=\"ui-icon ui-icon-radio-off ui-icon-shadow\"></span>";
	str += "						</span>";
	str += "				</label>";
	str += "			</div>";
	str += "			<div class=\"ui-radio\">";
	str += "				<input type=\"radio\" name=\"choiceR\" id=\"choice2R\" value=\"choice-2\">";
	str += "				<label for=\"choice2R\" data-theme=\"c\" class=\"ui-btn ui-btn-up-c ui-btn-icon-left ui-radio-off\">";
	str += "					<span class=\"ui-btn-inner\">";
	str += "						<span class=\"ui-btn-text\">Weak Less</span>";
	str += "						<span class=\"ui-icon ui-icon-radio-off ui-icon-shadow\"></span>";
	str += "					</span>";
	str += "				</label>";
	str += "			</div>";
	str += "			<div class=\"ui-radio\">";
	str += "				<input type=\"radio\" name=\"choiceR\" id=\"choice3R\" value=\"choice-3\">";
	str += "				<label for=\"choice3R\" data-theme=\"c\" class=\"ui-btn ui-btn-up-c ui-btn-icon-left ui-radio-off ui-corner-bottom ui-controlgroup-last\">";
	str += "					<span class=\"ui-btn-inner ui-corner-bottom ui-controlgroup-last\">";
	str += "						<span class=\"ui-btn-text\">Weak More</span>";
	str += "						<span class=\"ui-icon ui-icon-radio-off ui-icon-shadow\"></span>";
	str += "					</span>";
	str += "				</label>";
	str += "			</div>";
	str += "		</fieldset>";
*/
	document.getElementById("CN7zoneRD").innerHTML = str;
}
function zoneR2()
{
	var str="";
	str += "<div class=\"grid_6\">";
	str += "	<fieldset data-role=\"controlgroup\" >";
	str += "		<input type=\"radio\" name=\"choiceR\" id=\"choice4R\" value=\"choice-4\" />";
	str += "		<label for=\"choice4R\">Can not closed the eye</label>";

	str += "		<input type=\"radio\" name=\"choiceR\" id=\"choice5R\" value=\"choice-5\"  />";
	str += "		<label for=\"choice5R\">..</label>";

	str += "		<input type=\"radio\" name=\"choiceR\" id=\"choice6R\" value=\"choice-6\"  />";
	str += "		<label for=\"choice6R\">No movement</label>";
	str += "	</fieldset>";
	str += "</div>";

/*
	str += "	<div class=\"grid_6\">";
	str += "		<fieldset data-role=\"controlgroup\" class=\"ui-corner-all ui-controlgroup ui-controlgroup-vertical\">";
	str += "					<div class=\"ui-radio\"><input type=\"radio\" name=\"choiceR\" id=\"choice4R\" value=\"choice-4\"><label for=\"choice4R\" data-theme=\"c\" class=\"ui-btn ui-btn-up-c ui-btn-icon-left ui-radio-off ui-corner-top\">Can not closed the eye</label></div>";
	str += "					<div class=\"ui-radio\"><input type=\"radio\" name=\"choiceR\" id=\"choice5R\" value=\"choice-5\"><label for=\"choice5R\" data-theme=\"c\" class=\"ui-btn ui-btn-up-c ui-btn-icon-left ui-radio-off\"><span class=\"ui-btn-inner\"><span class=\"ui-btn-text\">..</span><span class=\"ui-icon ui-icon-radio-off ui-icon-shadow\"></span></span></label></div>";
	str += "					<div class=\"ui-radio\"><input type=\"radio\" name=\"choiceR\" id=\"choice6R\" value=\"choice-6\"><label for=\"choice6R\" data-theme=\"c\" class=\"ui-btn ui-btn-up-c ui-btn-icon-left ui-radio-off ui-corner-bottom ui-controlgroup-last\"><span class=\"ui-btn-inner ui-corner-bottom ui-controlgroup-last\"><span class=\"ui-btn-text\">No movement</span><span class=\"ui-icon ui-icon-radio-off ui-icon-shadow\"></span></span></label></div>";
	str += "		</fieldset>";
	str += "	</div>";
*/

	document.getElementById("CN7zoneRD").innerHTML = str;
}
function zoneL1()
{
	var str="";
	str += "<div class=\"grid_6\">";
	str += "	<fieldset data-role=\"controlgroup\" >";
	str += "		<input type=\"radio\" name=\"choiceL\" id=\"choice1L\" value=\"choice-1\"  />";
	str += "		<label for=\"choice1L\">Normal</label>";

	str += "		<input type=\"radio\" name=\"choiceL\" id=\"choice2L\" value=\"choice-2\"  />";
	str += "		<label for=\"choice2L\">Weak Less</label>";

	str += "		<input type=\"radio\" name=\"choiceL\" id=\"choice3L\" value=\"choice-3\"  />";
	str += "		<label for=\"choice3L\">Weak More</label>";
	str += "	</fieldset>";
	str += "</div>";

/*
	str += "	<div class=\"grid_6\">";
	str += "		<fieldset data-role=\"controlgroup\" class=\"ui-corner-all ui-controlgroup ui-controlgroup-vertical\">";
	str += "			<div class=\"ui-radio\">";
	str += "				<input type=\"radio\" name=\"choiceL\" id=\"choice1L\" value=\"choice-1\">";
	str += "				<label for=\"choice1L\" data-theme=\"c\" class=\"ui-btn ui-btn-up-c ui-btn-icon-left ui-radio-off ui-corner-top\">";
	str += "					<span class=\"ui-btn-inner ui-corner-top\">";
	str += "						<span class=\"ui-btn-text\">Normal</span>";
	str += "							<span class=\"ui-icon ui-icon-radio-off ui-icon-shadow\"></span>";
	str += "						</span>";
	str += "				</label>";
	str += "			</div>";
	str += "			<div class=\"ui-radio\">";
	str += "				<input type=\"radio\" name=\"choiceL\" id=\"choice2L\" value=\"choice-2\">";
	str += "				<label for=\"choice2L\" data-theme=\"c\" class=\"ui-btn ui-btn-up-c ui-btn-icon-left ui-radio-off\">";
	str += "					<span class=\"ui-btn-inner\">";
	str += "						<span class=\"ui-btn-text\">Weak Less</span>";
	str += "						<span class=\"ui-icon ui-icon-radio-off ui-icon-shadow\"></span>";
	str += "					</span>";
	str += "				</label>";
	str += "			</div>";
	str += "			<div class=\"ui-radio\">";
	str += "				<input type=\"radio\" name=\"choiceL\" id=\"choice3L\" value=\"choice-3\">";
	str += "				<label for=\"choice3L\" data-theme=\"c\" class=\"ui-btn ui-btn-up-c ui-btn-icon-left ui-radio-off ui-corner-bottom ui-controlgroup-last\">";
	str += "					<span class=\"ui-btn-inner ui-corner-bottom ui-controlgroup-last\">";
	str += "						<span class=\"ui-btn-text\">Weak More</span>";
	str += "						<span class=\"ui-icon ui-icon-radio-off ui-icon-shadow\"></span>";
	str += "					</span>";
	str += "				</label>";
	str += "			</div>";
	str += "		</fieldset>";
	str += "	</div>";
*/

	document.getElementById("CN7zoneLD").innerHTML = str;
}
function zoneL2()
{
	var str="";
	str += "<div class=\"grid_6\">";
	str += "	<fieldset data-role=\"controlgroup\" >";
	str += "		<input type=\"radio\" name=\"choiceL\" id=\"choice4L\" value=\"choice-4\" />";
	str += "		<label for=\"choice4L\">Can not closed the eye</label>";

	str += "		<input type=\"radio\" name=\"choiceL\" id=\"choice5L\" value=\"choice-5\"  />";
	str += "		<label for=\"choice5L\">..</label>";

	str += "		<input type=\"radio\" name=\"choiceL\" id=\"choice6L\" value=\"choice-6\"  />";
	str += "		<label for=\"choice6L\">No movement</label>";
	str += "	</fieldset>";
	str += "</div>";

/*
	str += "<div class=\"grid_6\">";
	str += "	<fieldset data-role=\"controlgroup\" class=\"ui-corner-all ui-controlgroup ui-controlgroup-vertical\">";
	str += "		<div class=\"ui-radio\"><input type=\"radio\" name=\"choiceL\" id=\"choice4L\" value=\"choice-4\"><label for=\"choice4L\" data-theme=\"c\" class=\"ui-btn ui-btn-up-c ui-btn-icon-left ui-radio-off ui-corner-top\"><span class=\"ui-btn-inner ui-corner-top\"><span class=\"ui-btn-text\">Can not closed the eye</span><span class=\"ui-icon ui-icon-radio-off ui-icon-shadow\"></span></span></label></div>";
	str += "		<div class=\"ui-radio\"><input type=\"radio\" name=\"choiceL\" id=\"choice5L\" value=\"choice-5\"><label for=\"choice5L\" data-theme=\"c\" class=\"ui-btn ui-btn-up-c ui-btn-icon-left ui-radio-off\"><span class=\"ui-btn-inner\"><span class=\"ui-btn-text\">..</span><span class=\"ui-icon ui-icon-radio-off ui-icon-shadow\"></span></span></label></div>";
	str += "		<div class=\"ui-radio\"><input type=\"radio\" name=\"choiceL\" id=\"choice6L\" value=\"choice-6\"><label for=\"choice6L\" data-theme=\"c\" class=\"ui-btn ui-btn-up-c ui-btn-icon-left ui-radio-off ui-corner-bottom ui-controlgroup-last\"><span class=\"ui-btn-inner ui-corner-bottom ui-controlgroup-last\"><span class=\"ui-btn-text\">No movement</span><span class=\"ui-icon ui-icon-radio-off ui-icon-shadow\"></span></span></label></div>";
	str += "	</fieldset>";
	str += "</div>";
*/

	document.getElementById("CN7zoneLD").innerHTML = str;
}

function mainCN_sendTime(path)
{
	document.mainCNTimeForm.action = path;
	document.mainCNTimeForm.submit();
}

function _submit(value1, value2)
{
	if(value1 != ""){
		this.form.submit();
	}
}

//validate CN1_add
function validateForm()
{
var x=document.forms["myForm"]["fname"].value;
if (x==null || x=="")
  {
  alert("First name must be filled out");
  return false;
  }
}

// ###################
// new function below

// return the value of the radio button that is checked
// return an empty string if none are checked, or
// there are no radio buttons
function getCheckedValue(radioObj) {
	if(!radioObj)
		return "";
	var radioLength = radioObj.length;
	if(radioLength == undefined)
		if(radioObj.checked)
			return radioObj.value;
		else
			return "";
	for(var i = 0; i < radioLength; i++) {
		if(radioObj[i].checked) {
			return radioObj[i].value;
		}
	}
	return "";
}

// set the radio button with the given value as being checked
// do nothing if there are no radio buttons
// if the given value does not exist, all the radio buttons
// are reset to unchecked
function setCheckedValue(radioObj, newValue) {
	if(!radioObj)
		return;
	var radioLength = radioObj.length;
	if(radioLength == undefined) {
		radioObj.checked = (radioObj.value == newValue.toString());
		return;
	}
	for(var i = 0; i < radioLength; i++) {
		radioObj[i].checked = false;
		if(radioObj[i].value == newValue.toString()) {
			radioObj[i].checked = true;
		}
	}
}

// void check the validate in 2 radios
function CN1_validate(smellingR1, smellingR2, smellingL1, smellingL2){
/*	var smellingLeft = getCheckedValue(document.forms['CN1LformNew'].elements['smellingLeft']);
	var smellingRight = getCheckedValue(document.forms['CN1LformNew'].elements['smellingLeft']);
*/
/*	var submitR = document.CN1RformNew.smellingRight.value;
	var submitL = document.CN1RformNew.smellingLeft.value;
*/
//	getCheckedValue(document.forms['CN1LformNew'].elements['smellingLeft']);

/*	if ((smellingR1 == true || smellingR2 == true) && ( smellingL1 == true ||  smellingL2 == true)){
		document.forms['CN1Rform'].action = "CN1-smelling_proc.php";
		document.forms['CN1Rform'].submit();
	}
*/

//	if (((smellingR1 != null || smellingR1 != "") || (smellingR2 != null || smellingR2 != "")) && ((smellingL1 !=null || smellingL1 != "") || (smellingL2 != null || smellingL2 != ""))){
	if ((smellingR1 == true || smellingR2 == true) && ( smellingL1 == true ||  smellingL2 == true)){
	//	document.forms['CN1Rform'].action = "CN1-smelling_proc.php";
	//	document.forms['CN1Rform'].submit();
		document.getElementById("CN1Rform_new").action = "cn1-smelling_proc.php";
	//	document.CN1Rform.fn.value =  "CN1_addNew";
		document.getElementById("fn_id").value = "CN1_addNew";
		document.getElementById("CN1Rform_new").submit();
	}
}

// just copy smellingLeft value to smellingRight
// because i cannot submit 2 forms at a time
function CN1_copy(){
//	document.forms['CN1RformNew'].'smellingLeft'.value = document.forms['CN1RformNew'].'smellingLeft'.value;
//	document.forms['CN1RformNew'].'smellingLeft'.value = 'abc';
//	document.forms['CN1RformNew'].getElementById('getElementById').value = 'abc';
//	document.forms['CN1RformNew'].submit();
//	document.CN1RformNew.smellingLeft.value = "asdf"; //for test
//	document.CN1RformNew.smellingLeft.value = document.CN1LformNew.smellingLeft.value;
	document.CN1RformNew.smellingLeft.value = getCheckedValue(document.forms['CN1LformNew'].elements['smellingLeft']);
}

// main function to run to query into Database
function CN1_add(){
//	var smellingR1=document.forms["CN1Rform"]["smelling-R-choice-1"].value;
//	var smellingR2=document.forms["CN1Rform"]["smelling-R-choice-2"].value;
//	var smellingL1=document.forms["CN1Rform"]["smelling-L-choice-1"].value;
//	var smellingL2=document.forms["CN1Rform"]["smelling-L-choice-2"].value;

	var smellingR1 = document.getElementById("smelling-R-choice-1").checked;
	var smellingR2 = document.getElementById("smelling-R-choice-2").checked;
	var smellingL1 = document.getElementById("smelling-L-choice-1").checked;
	var smellingL2 = document.getElementById("smelling-L-choice-2").checked;

	CN1_copy();
	CN1_validate(smellingR1, smellingR2, smellingL1, smellingL2);
}

//for test how to use value in javascript
function CN1_test(){
	var a = document.getElementById("smelling-R-choice-2").value;
	var b = document.getElementById("fn_id").value;
	var r = document.CN1RformNew.smellingRight.value;
	document.write(b);
}


function CN8_valudate(choiceR1, choiceR2, choiceR3, choiceL1, choiceL2, choiceL3){
//	if(choiceR != "" && choiceL != ""){
	if((choiceR1 == true || choiceR2 == true || choiceR3 == true) && (choiceL1 == true || choiceL2 == true || choiceL3 == true)){
		document.getElementById("CN8formNew").submit();
	}
}

function CN8_add(){
/*
	var choiceR = document.forms['CN8formNew'].elements['radio-choice-R'].value;
	var choiceL = document.forms['CN8formNew'].elements['radio-choice-L'].value;
*/
	var choiceR1 = document.getElementById("radio-choice-R-1").checked;
	var choiceR2 = document.getElementById("radio-choice-R-2").checked;
	var choiceR3 = document.getElementById("radio-choice-R-3").checked;
	var choiceL1 = document.getElementById("radio-choice-L-1").checked;
	var choiceL2 = document.getElementById("radio-choice-L-2").checked;
	var choiceL3 = document.getElementById("radio-choice-L-3").checked;
//	CN8_valudate(choiceR, choiceL);
	CN8_valudate(choiceR1, choiceR2, choiceR3, choiceL1, choiceL2, choiceL3);
}

// void check the validate in 2 radios
/*
function CN12_validate(R_tongue_normal, R_tongue_atrophy, L_tongue_normal, L_tongue_atrophy){
	if((R_tongue_normal != "" || R_tongue_atrophy != "") && (L_tongue_normal != "" || L_tongue_atrophy != ""))
	{
		document.getElementById("CN12formNew").action = "cn1-smelling_proc.php";
	//	document.getElementById("fn_id").value = "CN12_addNew";
		document.getElementById("CN12formNew").submit();
	}
}
*/

function CN12_valudate(R_tongue, L_tongue){
	if(R_tongue != "" && L_tongue != ""){
		document.getElementById("CN8formNew").submit();
	}
}

function CN12_add(){
/*
	var R_tongue_normal = document.getElementById("R_tongue_normal").value;
	var R_tongue_atrophy = document.getElementById("R_tongue_atrophy").value;
	var L_tongue_normal = document.getElementById("L_tongue_normal").value;
	var L_tongue_atrophy = document.getElementById("L_tongue_atrophy").value;
*/
	var R_tongue = document.getElementById("flip-b-R").value;
	var L_tongue = document.getElementById("flip-b-L").value;
//	CN12_validate(R_tongue_normal, R_tongue_atrophy, L_tongue_normal, L_tongue_atrophy);
	CN12_valudate(R_tongue, L_tongue);
}
function test(){
//	document.write("aaa");
	x = document.getElementById("radio-choice-R-3").checked;
	document.write(x);
}

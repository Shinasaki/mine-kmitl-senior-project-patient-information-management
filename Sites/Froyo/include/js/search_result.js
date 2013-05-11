/*
$(document).ready(function() 
    { 
        $("#myTable").tablesorter(); 
    } 
); 
$(document).ready(function() 
    { 
        $("#myTable").tablesorter( {sortList: [[0,0], [1,0]]} ); 
    } 
);
*/

function editProfile(patientID, value, btn_save_x, field){
	var str_field ="";

	str_field += "<form id=\""+field+"Form\" action=\"result-found_proc.php\" method=\"POST\">";
	str_field += "	<input type=\"hidden\" name=\"fn\" value=\""+field+"\" />";
	str_field += "	<input type=\"hidden\" name=\"patientID\" value=\""+patientID+"\" />";
	str_field += "	\<div data-role\=\"fieldcontain\" class\=\"ui-hide-label\"\>";
	str_field += "		\<label for\=\""+field+"\"\>"+field+"\:\<\/label\>";
	str_field += "		\<input type\=\"text\" name\=\""+field+"\" id\=\""+field+"\" value\=\""+value+"\" placeholder\=\""+field+"\" class=\"ui-input-text ui-body-c ui-corner-all ui-shadow-inset\" \/\>";
	str_field += "	\<\/div\>";

	str_field += "</form>";

	var str_btn_submit = "";
	str_btn_submit += "<a onClick=\"submit_profile('"+field+"'); \" href=\"#\" data-role=\"button\" data-inline=\"true\" data-theme=\"b\" class=\"ui-btn ui-btn-inline ui-btn-corner-all ui-shadow ui-btn-up-b\"><span class=\"ui-btn-inner\">Save</span></a>";

	document.getElementById("btn_save_"+btn_save_x).innerHTML = str_btn_submit;
	document.getElementById(field).innerHTML = str_field;

	var str_btn_submit_back = "";
//	str_back += "<a onClick=\"editProfile('<?=$patient_id?>', '1', 'patient_id'); \" href=\"#\" data-role=\"button\" data-inline=\"true\" data-theme=\"b\" class=\"btn-margin\">Edit</a>";

	var field_back = new array();
	field_back[1] = "patient_id";
	field_back[2] = "firstName";
	field_back[3] = "lastName";
	field_back[4] = "address";
	field_back[5] = "tel";

	var i = 1;
	for(i = 1; i <= 5; i++){
		if(btn_save_x != i){
			str_btn_submit_back = "<a onClick=\"editProfile('<?=$"+field_back[i]+"?>', '"+i+"', '"+field_back[i]+"'); \" href=\"#\" data-role=\"button\" data-inline=\"true\" data-theme=\"b\" class=\"btn-margin ui-btn ui-btn-inline ui-btn-corner-all ui-shadow ui-btn-up-b\"><span class=\"ui-btn-inner\">Edit</span></a>";
			document.getElementById("btn_save_"+i).innerHTML = str_btn_submit_back;
			document.getElementById(field_back[i]).innerHTML = "<\?\=\$"+field_back[i]+"\?>";
		}	
	}

}


function submit_profile(field)
{
	field += "Form";
	document.getElementById(field).submit();
}




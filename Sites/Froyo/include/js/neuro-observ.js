function neuroObservNextPage(link){
	document.neuroObservForm.action = link;
	document.neuroObservForm.submit();
}

function vitalSignsForm_submit_back()
{
//	document.vitalSignsForm.location.value = "./neuro-observ.php";
	document.getElementById("vitalSigns_location").value = "./neuro-observ.php";
	document.vitalSignsForm.submit();
}

function vitalSignsForm_submit_home()
{
	document.vitalSignsForm.location.value = "./";
	document.vitalSignsForm.submit();
}

function comaScale_submit(locationPath)
{
	if(locationPath == "back"){
		document.comaScaleForm.location.value = "./neuro-observ.php";
	}
	else if(locationPath == "home"){
		document.comaScaleForm.location.value = "./";
	}
	document.comaScaleForm.submit();
}

function motorPower_submit(locationPath)
{
	if(locationPath == "back"){
		document.motorPowerForm.location.value = "./neuro-observ.php";
	}
	else if(locationPath == "home"){
		document.motorPowerForm.location.value = "./";
	}
	document.motorPowerForm.submit();
}

/*
$( "#doctorForm" ).validate({
    submitHandler: function( form ) {
        alert( "Call Login Action" );
    }
});
*/

$(document).ready(function(){
	$("#doctorForm").validate();
});


/* normal version */
/*
function doctorRegisValidator()
{
	if(document.forms["doctorForm"]["username"].value == "")
	{
		document.forms["doctorForm"]["username"].focus();
		alert('please enter username');
		return false;
	}
}
*/

/*
// wait for the DOM to be loaded 
$(document).ready(function() { 
    // bind 'myForm' and provide a simple callback function 
    $('#doctorForm').ajaxForm(function() { 
        alert("Thank you for your comment!"); 
    }); 
}); 
*/

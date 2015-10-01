$(document).ready(function(){
	$( "#socialdata_edit" ).click(function() {
		$("#name").removeAttr('readonly');
		$("#email").removeAttr('readonly');
		$("#name").focus();
	});
});
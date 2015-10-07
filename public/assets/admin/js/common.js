$(document).ready(function(){
	$(".toggle_button").bootstrapSwitch();

	//Bootstrap Alert Auto Close
	window.setTimeout(function() {
	    $(".alert-success").fadeTo(1500, 0).slideUp(500, function(){$(this).remove();});
	}, 5000);
});
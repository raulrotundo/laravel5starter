$(document).ready(function(){
	$( "#socialdata_edit" ).click(function() {
		$("#name").removeAttr('readonly');
		$("#email").removeAttr('readonly');
	});

	$( "#company_name" ).autocomplete({
	  source: "searchcompany",
	  minLength: 3,
	  select: function(event, ui) {
	  	$('#company_name').val(ui.item.value);
	  }
	});
});
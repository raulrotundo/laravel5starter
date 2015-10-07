$(document).ready(function($){
	//bootstrap multiselect
	$('#search').multiselect({
		search: {
			left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
			right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
		}
	});
});
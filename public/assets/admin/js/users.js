$(document).ready(function(e) {
	$(".avatar_input").click(function(){
		$("#avatar_input").trigger('click');
	});
	$('input[name="avatar_remove"]').iCheck({
		checkboxClass: 'icheckbox_square-blue',
		radioClass: 'iradio_square-blue',
	    increaseArea: '20%' // optional
	});
});
$(document).ready(function($){
	//delete de upper box class
	$('section.content>.box.box-default').removeClass('box');
	$('input[name="leave_user"]').iCheck({
		checkboxClass: 'icheckbox_square-blue',
		radioClass: 'iradio_square-blue',
	    increaseArea: '20%'
	});
	$('input[name="leave_user"]').on("ifChecked", function(){
		$("#leave_user_msg").slideDown();
	});
	$('input[name="leave_user"]').on("ifUnchecked", function(){
		$("#leave_user_msg").slideUp();
	});
});
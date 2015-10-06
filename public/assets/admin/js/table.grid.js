$(document).ready(function(){
	var oTable = null;
	var ajxtable = $('[data-ajxtable]').attr('data-ajxtable');
	var table = $('#'+ ajxtable +'_table');
	
	oTable = $(table).dataTable({
		"processing": true,        
		"ajax" : ajxtable +'_show',
		"lenghtMenu" : [[5, 10, 15, -1],[5, 10, 15, 'All']]
	});	
 
	$(table).on( 'click', '.btn-danger', function (e) {
		e.preventDefault();
		$('input[name="row"]').val($(this).attr('id'));
	});

	$('#confirm-delete').on( 'click', '.btn-primary', function (e) {
		var row = $('input[name="row"]').val();
		var token = $(this).data('token');
		var redirect = $('input[name="redirect"]').val();
		$.ajax({
			url:redirect+'/'+row,
			type: 'post',
			data: {_method: 'delete', _token :token},
			success: function( msg ) {
                window.location = redirect;
	        }
		});
	});

	//Bootstrap Alert Auto Close
	window.setTimeout(function() {
	    $(".alert-success").fadeTo(1500, 0).slideUp(500, function(){$(this).remove();});
	}, 5000);
});

jQuery(document).ready(function($) {
	$('#search').multiselect({
		search: {
			left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
			right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
		}
	});
});
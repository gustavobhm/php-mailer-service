$(document).ready(function() {
	$('select').material_select();

	$('select').on("change", function() {
		postForm('', {
			selectedDate : $("#datepicker").val(),
			templateCode : $(this).val()
		});

	});

});
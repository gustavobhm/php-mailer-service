$(document).ready(
		function() {
			$('#myTable').pageMe({
				pagerSelector : '#myPager',
				activeColor : 'teal',
				prevText : 'Prev',
				nextText : 'Next',
				showPrevNext : true,
				hidePageNumbers : false,
				perPage : 10
			});

			// Write on keyup event of keyword input element
			$("#search").keyup(
					function() {

						_this = this;
						// Show only matching TR, hide rest of them
						$.each($("#tabla tbody tr"), function() {
							// alert("Encontrado");
							if ($(this).text().toLowerCase().indexOf(
									$(_this).val().toLowerCase()) === -1)
								$(this).hide();
							else
								$(this).show();
						});
					});

		});
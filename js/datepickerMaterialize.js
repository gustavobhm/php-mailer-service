$(document).ready(

		function() {

			var date = new Date();
			date.setFullYear(date.getFullYear() - 1);

			$(".datepicker")
					.pickadate(
							{
								clear : false,
								today : false,
								close : false,
								min : date,
								max : new Date(),
								monthsShort : [ 'JAN', 'FEB', 'MAR', 'APR',
										'MAY', 'JUN', 'JUL', 'AUG', 'SEP',
										'OCT', 'NOV', 'DEC' ],
								format : "dd-mmm-yyyy",
							/*
							 * onSet : function() { this.close(); }
							 */
							});
			$('.datepicker').on("change", function() {
				postForm('', {
					selectedDate : $(this).val(),
					templateCode : $("#templateCode").val()
				});

			});
			
		});

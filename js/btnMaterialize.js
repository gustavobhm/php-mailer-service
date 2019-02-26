$(document).ready(function() {
	$('#btnExportData').click(function() {

		$("#tabla").table2csv({
			filename : 'mailer-report.csv',
			separator : ';',
			newline : '\n',
			quoteFields : true,
			excludeColumns : '',
			excludeRows : ''
		});

	});

});
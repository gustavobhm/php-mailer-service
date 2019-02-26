google.charts.load('current', {
	packages : [ 'corechart', 'line' ]
});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

	var jsonData = $.ajax({
		url : "getChartData.php?selectedDate=" + $("#datepicker").val()
				+ "&templateCode=" + $("#templateCode").val(),
		dataType : "json",
		async : false,
	}).responseText;

	var data = new google.visualization.DataTable(jsonData);

	var options = {
		width : 800,
		height : 400,
		chartArea : {
			height : 250,
			top : 50
		},
		explorer : {
			axis : 'horizontal',
			keepInBounds : true
		},
		hAxis : {
			slantedText : true,
			slantedTextAngle : 60
		},
		vAxis : {
			title : 'Emails'
		},
		series : {
			0 : {
				color : '#88CC88',
				lineWidth : 2
			},
			1 : {
				color : '#CC8888',
				lineWidth : 2
			}
		},
		legend : {
			position : 'top'
		}
	};

	var chart = new google.visualization.AreaChart(document
			.getElementById('chart_div'));
	chart.draw(data, options);

}
<?php
require_once 'util/global.php';

$templateCode = 1;
$selectedDate = DateUtils::getTodayDate();

if (isset($_POST['selectedDate'])) {
    $templateCode = $_POST['templateCode'];
    $selectedDate = $_POST['selectedDate'];
}

$tableData = TableReport::getData($templateCode, $selectedDate);

$templates = Template::getTemplates();

?>

<html>
<head>

<meta charset="UTF-8">
<link rel="shortcut icon" href="#" />

<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
	rel="stylesheet">
<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
<link rel="stylesheet" href="css/report.css">

</head>

<body>

	<div class="container div-container">

		<div class="row row-logo">
			<a href="http://www.cremesp.org.br/"> <img class="a-logo"
				src="img/logo-cremesp" alt="Cremesp">
			</a> <img class="img-logo" src="img/iso-certificate"
				alt="ISO 9001:2015">
		</div>


		<div class="row row-select-datepicker">
			<div class="col s4 offset-s1 div-select">
				<label for="templateCode">Change type...</label> <select
					id="templateCode">
					<?php foreach ($templates as $template): ?>
						<option value="<?= $template->ITEM ?>"
						<?= ($template->ITEM == $templateCode)?'selected':''?>><?= $template->NOME_TEMPLATE ?></option>
					<?php endforeach ?>
				</select>
			</div>
			<div class="col s4 offset-s1">
				<label for="datepicker">Change date...</label> <input
					id="datepicker" class="datepicker" placeholder="Select a date..."
					value="<?php echo $selectedDate ?>">
			</div>
		</div>

		<div class="row row-chart">
			<div id="chart_div"></div>
		</div>

		<div class="row row-search-btnExportData">
			<div class="col s4 offset-s1">
				<input type="text" id="search" placeholder="Type to search..." />
			</div>
			<div class="col s4 offset-s2">
				<a id="btnExportData" class="waves-effect waves-light btn">
					<i class="material-icons right">file_download</i>
					Export Data
				</a>
			</div>
		</div>

		<div class="row">
			<table class="table table-hover centered bordered highlight"
				id="tabla">
				<thead>
					<tr>
						<th width="15%">Date</th>
						<th width="45%">Email</th>
						<th width="40%">Status</th>
					</tr>
				</thead>

				<tbody id="myTable">
					<?php if (isset($tableData)): ?>
        				<?php foreach ($tableData as $rowData): ?>
        					<?php $statusCSS = ($rowData->{"Status Code"} == 1) ? "td-status-ok": "td-status-error" ?>
                    <tr class="<?=$statusCSS?>">
						<td><?php echo $rowData->{"Date"} ?></td>
						<td><?php echo $rowData->{"Email"} ?></td>
						<td><?php echo $rowData->{"Status"} ?></td>
					</tr>
                        <?php endforeach ?>				
                    <?php endif; ?>
				</tbody>
			</table>
		</div>

		<div class="row center text-center">
			<span class="left" id="total_reg"></span>
			<ul class="pagination pager" id="myPager"></ul>
		</div>

	</div>

	<!-- jQuery API -->
	<script src="js/jquery-2.1.1.min.js"></script>

	<!-- Google API -->
	<script src="js/loaderGoogle.js"></script>
	<script src="js/lineChartGoogle.js"></script>

	<!-- Util API -->
	<script src="js/postFormUtil.js"></script>
	<script src="js/paginationUtil.js"></script>
	<script src="js/table2csvUtil.js"></script>

	<!-- Materialize API -->
	<script src="js/materialize.min.js"></script>

	<!-- Materialize Components -->
	<script src="js/tableMaterialize.js"></script>
	<script src="js/datepickerMaterialize.js"></script>
	<script src="js/selectMaterialize.js"></script>
	<script src="js/btnMaterialize.js"></script>

</body>
</html>
<?php
require_once 'util/global.php';

$templateCode = $_GET['templateCode'];
$selectedDate = $_GET['selectedDate'];

echo ChartReport::getData($templateCode, $selectedDate);

?>
<?php
require_once "util/header.php";

$mailer = new Mailer(new CRMTemplate());
$mailer->execute();

require_once "util/footer.php";

?>
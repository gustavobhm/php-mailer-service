<?php
require_once "util/header.php";

$mailer = new Mailer(new RodizioIsencaoTemplate());
$mailer->execute();

$mailer = new Mailer(new RodizioRenovacaoTemplate());
$mailer->execute();

require_once "util/footer.php";

?>
<?php
require_once '../util/global.php';

$numPlacaEmails = array(
    "anderson-rodrigo@hotmail.com",
    "caroline.fuloni@hotmail.com",
    "daninasu@yahoo.com.br",
    "alecbarreto@gmail.com",
    "alessandra.barreto@incor.usp.br",
    "ci.ferialves@gmail.com",
    "claudeterlima@gmail.com",
    "mpaletti@hotmail.com",
    "mikaelchun1990@gmail.com",
    "mdalanezegomes@gmail.com"
);

$numCrmEmails = array(
    "mayara_zanon@hotmail.com",
    "natysa81@gmail.com",
    "natasha_smoran@hotmail.com",
    "biancacrcunha@gmail.com",
    "biancakmr@gmail.com"
);

$json = '{';

foreach ($numPlacaEmails as $email) {
    $json .= '"' . $email . '": [' . ProceduresDAO::listInfNumPlacaByEmail($email) . '],';
}

foreach ($numCrmEmails as $email) {
    $json .= '"' . $email . '": [' . ProceduresDAO::listInfNumCrmByEmail($email) . '],';
}

$json = substr_replace($json, '', - 1);

$json .= '}';

echo $json;

?>

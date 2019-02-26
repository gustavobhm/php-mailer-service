<?php
require_once 'util/global.php';

class TableReport
{

    public static function getData($templateCode, $selectedDate)
    {
        return PubEnvioEmailsDAO::listPubEnvioEmailsByTemplateAndDate($templateCode, $selectedDate);
    }
}

?>
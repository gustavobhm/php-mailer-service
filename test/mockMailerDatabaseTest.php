<?php
require_once '../util/global.php';

mockMailerDatabase();

function mockMailerDatabase()
{
    $pubEnvioEmailsDAO = new PubEnvioEmailsDAO();
    $pubEmailSubsDAO = new PubEmailSubsDAO();
    $pubTemplatesDAO = new PubTemplatesDAO();

    $pubEnvioEmailsDAO->clearPubEnvioEmails();
    $pubEmailSubsDAO->clearPubEmailSubs();
    $pubTemplatesDAO->clearPubTemplates();

    $mockData = new MockData();

    $pubTemplatesValues = $mockData->getPubTemplatesMock();
    $pubEmailSubs = $mockData->getPubEmailSubsMock();
    $pubEnvioEmails = $mockData->getPubEnvioEmailsMock();

    $pubTemplatesDAO->insertValuesIntoPubTemplates($pubTemplatesValues);
    $pubEmailSubsDAO->insertValuesIntoPubEmailSubs($pubEmailSubs);
    $pubEnvioEmailsDAO->insertValuesIntoPubEnvioEmails($pubEnvioEmails);
    // ProceduresDAO::mockPubEnvioEmailsWithCRM();

    echo '{"PUB_TEMPLATES":' . $pubTemplatesDAO->listPubTemplates() . ',"PUB_ENVIO_EMAILS":' . $pubEnvioEmailsDAO->listPubEnvioEmails() . '}';
}

?>
<?php

class PubEnvioEmailsDAO
{

    public static function listPubEnvioEmailsByTemplateAndDate($codeTemplate, $selectedDate)
    {
        $conn = ConnectionFactory::getInstance()->getConnection();

        $query = 'SELECT 
                    em.EMAIL as "Email",
                    em.MOD_DATA as "Date", 
                    em.OBS  as "Status",
                    em.STATUS_ENVIO  as "Status Code"
                  FROM PUB_ENVIO_EMAILS em
                  WHERE
                    em.PUB_TEMPLATES_ITEM = :codeTemplate
                    and em.STATUS_ENVIO is not null
                    and em.MOD_DATA BETWEEN  :startDate AND :endDate 
                  ORDER BY em.MOD_DATA DESC ';

        $stid = oci_parse($conn, $query);

        oci_bind_by_name($stid, ':codeTemplate', $codeTemplate);

        oci_bind_by_name($stid, ':startDate', DateUtils::substractFifteenDaysFromDate($selectedDate));
        oci_bind_by_name($stid, ':endDate', $selectedDate);

        oci_execute($stid);

        $rows;
        while (($row = oci_fetch_object($stid)) != false) {
            $rows[] = $row;
        }

        oci_free_statement($stid);

        return isset($rows) ? $rows : null;
    }

    public static function groupTotalPubEnvioEmailsByTemplateAndDate($codeTemplate, $selectedDate)
    {
        $conn = ConnectionFactory::getInstance()->getConnection();

        $query = 'SELECT
                    em.MOD_DATA as "Date",
                    count(CASE
                        WHEN em.STATUS_ENVIO = 1 THEN em.MOD_DATA
                    END) as "Sent",
                    count(CASE
                        WHEN em.STATUS_ENVIO = 2 THEN em.MOD_DATA
                    END) as "Not Sent"
                  FROM PUB_ENVIO_EMAILS em
                  WHERE
                    em.PUB_TEMPLATES_ITEM = :codeTemplate
                    and em.STATUS_ENVIO is not null
                    and em.MOD_DATA BETWEEN  :startDate AND :endDate
                  GROUP BY em.MOD_DATA
                  ORDER BY em.MOD_DATA ';

        $stid = oci_parse($conn, $query);

        $statusOk = 'Sent';
        $statusNotOk = 'Not Sent';

        oci_bind_by_name($stid, ':codeTemplate', $codeTemplate);

        oci_bind_by_name($stid, ':startDate', DateUtils::substractFifteenDaysFromDate($selectedDate));
        oci_bind_by_name($stid, ':endDate', $selectedDate);

        oci_execute($stid);

        $rows;
        while (($row = oci_fetch_object($stid)) != false) {
            $rows[] = $row;
        }

        oci_free_statement($stid);

        return isset($rows) ? $rows : null;
    }

    function getlistEmailsToBeSend($codeTemplate)
    {
        $conn = ConnectionFactory::getInstance()->getConnection();

        $query = 'SELECT em.*
                  FROM PUB_ENVIO_EMAILS em  
                  WHERE 
                    (em.NUM_TENTATIVAS < 3 OR em.NUM_TENTATIVAS is null ) 
                    AND (em.STATUS_ENVIO <> 1 OR em.STATUS_ENVIO is null) 
                    AND em.PUB_TEMPLATES_ITEM = :codeTemplate 
                  ORDER BY em.ITEM ';

        $stid = oci_parse($conn, $query);

        oci_bind_by_name($stid, ':codeTemplate', $codeTemplate);

        oci_execute($stid);

        $rows;
        while (($row = oci_fetch_object($stid)) != false) {
            $rows[] = $row;
        }

        oci_free_statement($stid);

        return isset($rows) ? $rows : null;
    }

    function updateEmailSenderStatus($row)
    {
        $conn = ConnectionFactory::getInstance()->getConnection();

        $stid = oci_parse($conn, 'UPDATE PUB_ENVIO_EMAILS SET MOD_DATA = :modData, NUM_TENTATIVAS = :numTentativas, STATUS_ENVIO = :statusEnvio, OBS = :obs WHERE ITEM = :item ');

        oci_bind_by_name($stid, ':modData', date("d-M-y"));
        oci_bind_by_name($stid, ':numTentativas', $row->NUM_TENTATIVAS);
        oci_bind_by_name($stid, ':statusEnvio', $row->STATUS_ENVIO);
        oci_bind_by_name($stid, ':obs', $row->OBS);
        oci_bind_by_name($stid, ':item', $row->ITEM);

        oci_execute($stid, OCI_COMMIT_ON_SUCCESS);

        oci_free_statement($stid);
    }

    public static function listPubEnvioEmails()
    {
        $conn = ConnectionFactory::getInstance()->getConnection();

        $stid = oci_parse($conn, 'SELECT * FROM PUB_ENVIO_EMAILS ORDER BY ITEM ');

        oci_execute($stid);

        $rows;
        while (($row = oci_fetch_object($stid)) != false) {
            $rows[] = Utf8Utils::utf8_encode_array($row);
        }

        oci_free_statement($stid);

        return isset($rows) ? json_encode($rows) : "";
    }

    function clearPubEnvioEmails()
    {
        $conn = ConnectionFactory::getInstance()->getConnection();

        $stid = oci_parse($conn, 'DELETE FROM PUB_ENVIO_EMAILS');

        oci_execute($stid, OCI_COMMIT_ON_SUCCESS);

        oci_free_statement($stid);
    }

    function insertValuesIntoPubEnvioEmails($rows)
    {
        $conn = ConnectionFactory::getInstance()->getConnection();

        $stid = oci_parse($conn, 'INSERT INTO PUB_ENVIO_EMAILS (ITEM,EMAIL,MOD_DATA,PUB_TEMPLATES_ITEM,NUM_TENTATIVAS,STATUS_ENVIO,OBS) VALUES (:item,:email,:modData,:pubTemplatesItem,:numTentativas,:statusEnvio,:obs)');

        foreach ($rows as $row) {
            oci_bind_by_name($stid, ':item', $row->ITEM);
            oci_bind_by_name($stid, ':email', utf8_decode($row->EMAIL));
            oci_bind_by_name($stid, ':modData', $row->MOD_DATA);
            oci_bind_by_name($stid, ':pubTemplatesItem', $row->PUB_TEMPLATES_ITEM);
            oci_bind_by_name($stid, ':numTentativas', $row->NUM_TENTATIVAS);
            oci_bind_by_name($stid, ':statusEnvio', $row->STATUS_ENVIO);
            oci_bind_by_name($stid, ':obs', utf8_decode($row->OBS));

            oci_execute($stid, OCI_COMMIT_ON_SUCCESS);
        }

        oci_free_statement($stid);
    }
}

?>

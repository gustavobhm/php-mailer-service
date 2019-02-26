<?php

class PubEmailSubsDAO
{

    public static function listPubEmailSubs()
    {
        $conn = ConnectionFactory::getInstance()->getConnection();

        $stid = oci_parse($conn, 'SELECT * FROM PUB_EMAIL_SUBS ORDER BY ID ');

        oci_execute($stid);

        $rows;
        while (($row = oci_fetch_object($stid)) != false) {
            $rows[] = $row;
        }

        oci_free_statement($stid);

        return isset($rows) ? json_encode($rows) : "";
    }

    function listPubEmailSubsByTemplate($codeTemplate)
    {
        $conn = ConnectionFactory::getInstance()->getConnection();

        $stid = oci_parse($conn, 'SELECT * FROM PUB_EMAIL_SUBS WHERE TEMPLATE_ID = :templateId  ORDER BY NUMERO ');

        oci_bind_by_name($stid, ':templateId', $codeTemplate);

        oci_execute($stid);

        $rows;
        while (($row = oci_fetch_object($stid)) != false) {
            $rows[] = Utf8Utils::utf8_decode_array($row);
        }

        oci_free_statement($stid);

        return isset($rows) ? $rows : "";
    }

    function clearPubEmailSubs()
    {
        $conn = ConnectionFactory::getInstance()->getConnection();

        $stid = oci_parse($conn, 'DELETE FROM PUB_EMAIL_SUBS');

        oci_execute($stid, OCI_COMMIT_ON_SUCCESS);

        oci_free_statement($stid);
    }

    function insertValuesIntoPubEmailSubs($rows)
    {
        $conn = ConnectionFactory::getInstance()->getConnection();

        $stid = oci_parse($conn, 'INSERT INTO PUB_EMAIL_SUBS (ID,TEMPLATE_ID,NUMERO,DESCRICAO,MOD_DATA) VALUES (:id,:templateId,:numero,:descricao,:modData)');

        foreach ($rows as $row) {
            oci_bind_by_name($stid, ':id', $row->ID);
            oci_bind_by_name($stid, ':templateId', $row->TEMPLATE_ID);
            oci_bind_by_name($stid, ':numero', $row->NUMERO);
            oci_bind_by_name($stid, ':descricao', $row->DESCRICAO);
            oci_bind_by_name($stid, ':modData', $row->MOD_DATA);

            oci_execute($stid, OCI_COMMIT_ON_SUCCESS);
        }

        oci_free_statement($stid);
    }
}

?>

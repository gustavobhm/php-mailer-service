<?php

class PubTemplatesDAO
{

    function getTemplates()
    {
        $conn = ConnectionFactory::getInstance()->getConnection();

        $stid = oci_parse($conn, 'SELECT * FROM PUB_TEMPLATES WHERE ITEM <> 0 ORDER BY ITEM ');

        oci_execute($stid);

        $rows;
        while (($row = oci_fetch_object($stid)) != false) {
            $rows[] = $row;
        }

        oci_free_statement($stid);

        return isset($rows) ? $rows : "";
    }

    function getTemplate($codeTemplate)
    {
        $conn = ConnectionFactory::getInstance()->getConnection();

        $stid = oci_parse($conn, 'SELECT * FROM PUB_TEMPLATES WHERE ITEM = :codeTemplate');

        oci_bind_by_name($stid, ':codeTemplate', $codeTemplate);

        oci_execute($stid);

        $row = oci_fetch_object($stid);

        oci_free_statement($stid);

        return isset($row) ? $row : "";
    }

    function getTemplateName($codeTemplate)
    {
        $conn = ConnectionFactory::getInstance()->getConnection();

        $stid = oci_parse($conn, 'SELECT NOME_TEMPLATE FROM PUB_TEMPLATES WHERE ITEM = :codeTemplate');

        oci_bind_by_name($stid, ':codeTemplate', $codeTemplate);

        oci_execute($stid);

        $row = oci_fetch_object($stid);

        oci_free_statement($stid);

        return isset($row->NOME_TEMPLATE) ? $row->NOME_TEMPLATE : "";
    }

    public static function listPubTemplates()
    {
        $conn = ConnectionFactory::getInstance()->getConnection();

        $stid = oci_parse($conn, 'SELECT * FROM PUB_TEMPLATES ORDER BY ITEM ');

        oci_execute($stid);

        $rows;
        while (($row = oci_fetch_object($stid)) != false) {
            $rows[] = Utf8Utils::utf8_encode_array($row);
        }

        oci_free_statement($stid);

        return isset($rows) ? json_encode($rows) : "";
    }

    function clearPubTemplates()
    {
        $conn = ConnectionFactory::getInstance()->getConnection();

        $stid = oci_parse($conn, 'DELETE FROM PUB_TEMPLATES');

        oci_execute($stid, OCI_COMMIT_ON_SUCCESS);

        oci_free_statement($stid);
    }

    function insertValuesIntoPubTemplates($rows)
    {
        $conn = ConnectionFactory::getInstance()->getConnection();

        $stid = oci_parse($conn, 'INSERT INTO PUB_TEMPLATES (ITEM,NOME_TEMPLATE,ASSUNTO,CONTEUDO,FUNCAO,MOD_DATA) VALUES (:item,:nomeTemplate,:assunto,:conteudo,:funcao,:modData)');

        foreach ($rows as $row) {
            oci_bind_by_name($stid, ':item', $row->ITEM);
            oci_bind_by_name($stid, ':nomeTemplate', utf8_decode($row->NOME_TEMPLATE));
            oci_bind_by_name($stid, ':assunto', utf8_decode($row->ASSUNTO));
            oci_bind_by_name($stid, ':conteudo', utf8_decode($row->CONTEUDO));
            oci_bind_by_name($stid, ':funcao', $row->FUNCAO);
            oci_bind_by_name($stid, ':modData', $row->MOD_DATA);

            oci_execute($stid, OCI_COMMIT_ON_SUCCESS);
        }

        oci_free_statement($stid);
    }
}

?>

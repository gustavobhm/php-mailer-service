<?php

class ProceduresDAO
{

    public static function executeProcedure($procedure, $param = null)
    {
        $conn = ConnectionFactory::getInstance()->getConnection();

        if (isset($param)) {
            $stid = oci_parse($conn, 'begin ' . $procedure . '(:PARAM, :RESPONSE); end;');
            oci_bind_by_name($stid, ':PARAM', $param);
            oci_bind_by_name($stid, ':RESPONSE', $response, 100000);
        } else {
            $stid = oci_parse($conn, 'begin ' . $procedure . '(); end;');
        }

        oci_execute($stid);

        oci_free_statement($stid);

        return isset($response) ? $response : "";
    }

    public static function listInfNumPlacaByEmail($email)
    {
        return self::executeProcedure("PRC_INF_NUMPLACA", $email);
    }

    public static function listInfNumCrmByEmail($email)
    {
        return self::executeProcedure("PRC_INF_NUMCRM", $email);
    }

    public static function mockPubEnvioEmailsWithCRM()
    {
        return self::executeProcedure("CARREGA_ENVIO_EMAILS");
    }
}

?>
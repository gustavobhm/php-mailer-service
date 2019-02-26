<?php

class ConnectionFactory
{

    // Hold the class instance.
    private static $instance = null;

    private $conn;

    // The db connection is established in the private constructor.
    private function __construct()
    {
        $this->conn = oci_connect(DB_USERNAME, DB_PASSWORD, DB_HOSTNAME . '/' . DB_DATABASE, DB_CHARSET);

        if (! $this->conn) {
            $e = oci_error();
            trigger_error(htmlentities($e['message']), E_USER_ERROR);
        }

        return $this->conn;
    }

    public static function getInstance()
    {
        if (! self::$instance) {
            self::$instance = new ConnectionFactory();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }
}

?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '/var/www/cremesp.com/mailerService/util/config.php';
require_once '/var/www/cremesp.com/_class/API/Synchro/PHPMailer/PHPMailerAutoload.php';

spl_autoload_register("carregaClasse");

function carregaClasse($nomeDaClasse)
{
    require_once ('/var/www/cremesp.com/mailerService/class/' . $nomeDaClasse . '.php');
}

?>
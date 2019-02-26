<?php

// DB CONFIGURATIONS
define('DB_HOSTNAME', '172.20.1.42');
define('DB_DATABASE', 'prd11g');
define('DB_USERNAME', 'produc11g');
define('DB_PASSWORD', 'x');
define('DB_CHARSET', 'WE8ISO8859P1');

// EMAIL SERVER SETTINGS CONFIGURATIONS
define('EMAIL_SERVER_HOST', 'smtp.cremesp.org.br');
define('EMAIL_SERVER_USERNAME', 'adm@cremesp.org.br');
define('EMAIL_SERVER_PASSWORD', 's510@skf');
define('SENDER_EMAIL', 'no-response@cremesp.org.br');
define('SENDER_DESCRIPTION', 'Cremesp');

// DELAY CONFIGURATIONS
define('DELAY', '1');

// LOG CONFIGURATIONS
define('LOG_DIR', '/var/www/cremesp.com/mailerService/log/');
define('LOG_FILE_NAME', 'LogMailer.txt');
define('LOG_PATH', LOG_DIR . @date('M_Y_') . LOG_FILE_NAME);

// TEMPLATE CONFIGURATIONS
define('ERROR_TEMPLATE_CODE', '0');
define('CRM_TEMPLATE_CODE', '1');
define('RODIZIO_ISENCAO_TEMPLATE_CODE', '2');
define('RODIZIO_RENOVACAO_TEMPLATE_CODE', '3');
define('CRM_TEMP_RESP_EMAIL', 'srp@cremesp.org.br');
define('ROD_ISENCAO_TEMP_RESP_EMAIL', 'gustavosantos@cremesp.org.br');
define('ROD_RENOVACAO_TEMP_RESP_EMAIL', 'gustavosantos@cremesp.org.br');

// DELETE FILES CONFIGURATIONS
define('MAX_AGE', 3600 * 24 * 180); // 180 days

?>
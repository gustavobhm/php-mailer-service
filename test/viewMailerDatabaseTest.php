<?php
require_once '../util/global.php';

echo '{"PUB_TEMPLATES":' . PubTemplatesDAO::listPubTemplates() . ',"PUB_ENVIO_EMAILS":' . PubEnvioEmailsDAO::listPubEnvioEmails() . '}';

?>
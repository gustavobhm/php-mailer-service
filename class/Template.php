<?php

abstract class Template
{

    protected $code;

    protected $name;

    protected $subject;

    protected $procedure;

    public function getCode()
    {
        return $this->templateCode;
    }

    public function getName()
    {
        return $this->templateName;
    }

    public function getSubject()
    {
        return $this->subject;
    }

    public function getProcedure()
    {
        return $this->procedure;
    }

    function __construct($item = false)
    {
        if (isset($item)) {
            $pubTemplatesDAO = new PubTemplatesDAO();
            $template = $pubTemplatesDAO->getTemplate($item);

            $this->templateCode = $template->ITEM;
            $this->templateName = $template->NOME_TEMPLATE;
            $this->subject = $template->ASSUNTO;
            $this->procedure = $template->FUNCAO;
        }
    }

    public static function getTemplates()
    {
        $pubTemplatesDAO = new PubTemplatesDAO();
        $templates = $pubTemplatesDAO->getTemplates();
        return $templates;
    }

    abstract function getHtmlBody($email);

    abstract function getEmbeddedImages();

    protected function setParametersInBodyContent($htmlBody, $parameters)
    {
        if (isset($parameters)) {
            foreach ($parameters as $key => $val) {
                $htmlBody = str_replace("{" . $key . "}", $val, $htmlBody);
            }
        }

        return $htmlBody;
    }
}
?>
<?php

class ErrorTemplate extends Template
{

    private $errors;

    private $fromTemplate;

    private $embeddedImages = array();

    private $htmlBody = '<!DOCTYPE html>
                            <html lang="pt">
                                <head>
                                    <meta charset="UTF-8">
                                    <title>Cremesp</title>
                                </head>
                                <body>
                                    {1}
                                </body>
                            </html>';

    function __construct($fromTemplate, $errors)
    {
        parent::__construct(ERROR_TEMPLATE_CODE);

        $this->fromTemplate = $fromTemplate;

        $this->errors = $errors;
    }

    function getHtmlBody($email)
    {
        return $this->setErrorsInBodyContent($this->htmlBody, $this->errors);
    }

    function getEmbeddedImages()
    {
        return $this->embeddedImages;
    }

    function getSubject()
    {
        return $this->fromTemplate . ': ' . parent::getSubject();
    }

    private function setErrorsInBodyContent($htmlBody)
    {
        $htmlErrors = '<p>' . date("d/m/y H:i") . '</p>';

        foreach ($this->errors as $key => $error) {
            $htmlErrors .= '<p>' . $error . '</p>';
        }

        return str_replace("{1}", $htmlErrors, $htmlBody);
    }
}
?>
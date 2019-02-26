<?php

class mailerErrors
{

    private $loggingMailer;

    private $errors;

    function __construct()
    {
        $this->loggingMailer = new LoggingMailer();

        $errors = array();
    }

    public function addError($error)
    {
        $this->errors[] = $error;
    }

    function hasErrors()
    {
        return count($this->errors) > 0;
    }

    public function sendEmailWithErrors($template)
    {
        $mailer = (object) array(
            'ITEM' => '0',
            'EMAIL' => $template->getEmailTo(),
            'EMAIL_CC' => null
        );

        try {

            $mail = new Mail($mailer, new ErrorTemplate($template->getName(), $this->errors));
            $mail->send();
        } catch (Exception $e) {
            $this->loggingMailer->logEmailHasBeenNotSentToAdm($template, $e);
        }
    }
}

?>
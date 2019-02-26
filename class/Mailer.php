<?php

class Mailer
{

    private $loggingMailer;

    private $template;

    private $mailerList;

    private $mailerErrors;

    function __construct(Template $template)
    {
        $this->loggingMailer = new LoggingMailer();

        $this->template = $template;

        $pubEnvioEmailsDAO = new PubEnvioEmailsDAO();
        $this->mailerList = $pubEnvioEmailsDAO->getlistEmailsToBeSend($template->getCode());

        $this->mailerErrors = new MailerErrors();
    }

    public function execute()
    {
        if ($this->mailerList) {

            $this->loggingMailer->logStartedMailer($this->template, count($this->mailerList));

            SleepUtils::delayStart();
            foreach ($this->mailerList as $mailer) {

                $this->sendEmail($mailer);

                SleepUtils::delayExecute();
            }

            if ($this->mailerErrors->hasErrors()) {
                $this->mailerErrors->sendEmailWithErrors($this->template);
            }

            $this->loggingMailer->logFinalizedMailer($this->template);
        } else {
            $this->loggingMailer->logNoEmailsToBeSend();
        }
    }

    private function sendEmail($mailer)
    {
        try {

            $mail = new Mail($mailer, $this->template);
            $mail->send();

            $this->loggingMailer->logEmailHasBeenSent($mailer);

            $mailer->STATUS_ENVIO = 1; // Set status "OK"
            $mailer->OBS = "Email sent";
        } catch (Exception $e) {

            $this->loggingMailer->logEmailHasBeenNotSent($mailer, $e);

            $mailer->STATUS_ENVIO = 2; // Set status "NOT OK"
            $mailer->OBS = $e->getMessage();

            $this->mailerErrors->addError($e->getMessage());
        }

        $mailer->NUM_TENTATIVAS = (int) $mailer->NUM_TENTATIVAS + 1;

        $pubEnvioEmailsDAO = new PubEnvioEmailsDAO();
        $pubEnvioEmailsDAO->updateEmailSenderStatus($mailer);
    }
}

?>
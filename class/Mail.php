<?php

class Mail
{

    private $mail;

    private $email;

    private $ccEmail;

    private $subject;

    private $body;

    private $embeddedImages;

    function __construct($mailer, $template)
    {
        $this->mail = new PHPMailer(true);

        $this->email = $mailer->EMAIL;
        $this->ccEmail = $mailer->EMAIL_CC;
        $this->subject = $template->getSubject();
        $this->body = $template->getHtmlBody($mailer->EMAIL);
        $this->embeddedImages = $template->getEmbeddedImages();

        $this->configureEmailServerSettings();
        $this->setEmailRecipients();
        $this->setEmailContent();
    }

    public function send()
    {
        $this->mail->send();
    }

    private function configureEmailServerSettings()
    {
        // Server settings
        $this->mail->isSMTP(); // Set mailer to use SMTP
        $this->mail->Host = EMAIL_SERVER_HOST; // Specify main and backup SMTP servers
        $this->mail->SMTPAuth = true; // Enable SMTP authentication
        $this->mail->Username = EMAIL_SERVER_USERNAME; // SMTP username
        $this->mail->Password = EMAIL_SERVER_PASSWORD; // SMTP password
    }

    private function setEmailRecipients()
    {
        // TODO: Corrigir para produчуo
        //$this->email = "gustavosantos@cremesp.org.br";
        //$this->ccEmail = "silmar@cremesp.org.br";

        // Recipients
        $this->mail->setFrom(SENDER_EMAIL, SENDER_DESCRIPTION);
        
        $this->mail->addAddress($this->email);

        if (isset($this->ccEmail)) {
            $this->mail->AddCC($this->ccEmail);
        }
    }

    private function setEmailContent()
    {
        // Content
        $this->mail->isHTML(true); // Set email format to HTML
        $this->mail->Subject = $this->subject;
        $this->mail->Body = $this->body;

        if (isset($this->embeddedImages)) {
            foreach ($this->embeddedImages as $embeddedImage) {
                $this->mail->AddEmbeddedImage($embeddedImage["path"], $embeddedImage["name"]);
            }
        }
    }
}

?>
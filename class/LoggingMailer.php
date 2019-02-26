<?php

class LoggingMailer extends Logging
{

    public function logNoEmailsToBeSend()
    {
        $message = 'There are no emails to be send.';

        $this->lwrite($message . "\n");

        echo "<h1>" . $message . "</h1>";
    }

    public function logStartedMailer($template, $totalEmails)
    {
        $message = $template->getSubject() . ' Started mailer. ( ' . $totalEmails . ' emails to be send )';

        $this->lwrite($message);

        echo '<div class="center">
                  <h1>' . $message . '</h1>
                  <img src="img/spinner.gif" alt="Spinner" id="spinner' . $template->getCode() . '">
              </div>';
    }

    public function logFinalizedMailer($template)
    {
        $message = $template->getSubject() . ' Finalized mailer.';

        $this->lwrite($message . "\n");

        $this->lclose();

        echo '<script type="text/javascript">
                  $("#spinner' . $template->getCode() . '").fadeOut(500);
              </script>
              <h1>' . $message . '</h1>';
    }

    public function logEmailHasBeenSent($mailer)
    {
        $message = $mailer->ITEM . " - Email has been sent to " . $mailer->EMAIL;

        $this->lwrite($message);

        echo "<p class='correct' >" . $message . "</p>";
    }

    public function logEmailHasBeenNotSent($mailer, $e)
    {
        $message = $mailer->ITEM . " - Email could not be sent. Mailer Error: " . $e->getMessage();

        $this->lwrite($message);

        echo "<p class='error' >" . $message . "</p>";
    }

    public function logEmailHasBeenNotSentToAdm($template, $e)
    {
        $message = "Email could not be sent to the responsible for the " . $template->getName() . ". Mailer Error: " . $e->getMessage();

        $this->lwrite($message);

        echo "<p class='error' >" . $message . "</p>";
    }
}

?>
<?php

class Logging
{

    private $fp;

    public function __construct()
    {
        // Verifing if exist old files to be deleted
        FileUtils::deleteFilesByMaxAge(LOG_DIR, MAX_AGE);

        $this->fp = fopen(LOG_PATH, 'a') or exit("Can't open " . LOG_PATH . "!");
    }

    public function lwrite($message)
    {
        if (! is_resource($this->fp)) {
            $this->lopen();
        }

        $script_name = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);

        $time = @date('[d/M/Y H:i:s]');

        fwrite($this->fp, "$time ($script_name) $message" . PHP_EOL);
    }

    public function lclose()
    {
        fclose($this->fp);
    }
}

?>
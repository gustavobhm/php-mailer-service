<?php

class SleepUtils
{

    static function delayStart()
    {
        ob_start();
    }

    static function delayExecute()
    {
        flush();
        ob_flush();
        sleep(DELAY);
    }
}
?>

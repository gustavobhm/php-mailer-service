<?php

class DateUtils
{

    static function formatMonthToPTBR($date)
    {
        setlocale(LC_ALL, "pt_BR", "pt_BR.iso-8859-1", "pt_BR.utf-8", "portuguese");
        date_default_timezone_set('America/Sao_Paulo');

        $stringDate = strtotime($date);
        $formattedDate = strftime("%B", $stringDate);

        return ucfirst($formattedDate);
    }

    static function formatDateToPTBR($date)
    {
        return date_format(date_create($date), 'd/m/Y');
    }

    static function substractThreeYearsFromDate($date)
    {
        $date = strtotime('-3 year', strtotime($date));
        return date('d-M-y', $date);
    }
    
    static function substractFifteenDaysFromDate($date)
    {
        $date = strtotime('-15 day', strtotime($date));
        return date('d-M-y', $date);
    }
    
    static function getTodayDate(){
        return strtoupper(date('d-M-Y'));
    }
    
}
?>

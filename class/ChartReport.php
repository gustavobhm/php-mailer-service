<?php
require_once 'util/global.php';

class ChartReport
{

    private static $data;

    public static function getData($templateCode, $selectedDate)
    {
        self::$data = PubEnvioEmailsDAO::groupTotalPubEnvioEmailsByTemplateAndDate($templateCode, $selectedDate);

        return self::formatData();
    }

    private static function formatData()
    {
        $rowsData = '';
        if (isset(self::$data)) {
            foreach (self::$data as $rowData) {
                $date = $rowData->Date;
                $sent = $rowData->Sent != null ? $rowData->Sent : 0;
                $notSent = $rowData->{"Not Sent"} != null ? $rowData->{"Not Sent"} : 0;

                $rowsData .= '{"c":[{"v":"' . $date . '","f":null},{"v":' . $sent . ',"f":null},{"v":' . $notSent . ',"f":null}]},';
            }

            $rowsData = rtrim($rowsData, ", ");
        } else {
            $rowsData = '';
        }

        $chartStructure = '{
                "cols": [
                    {"id":"","label":"X","pattern":"","type":"string"},
                    {"id":"","label":"Sent","pattern":"","type":"number"},
                    {"id":"","label":"Not Sent","pattern":"","type":"number"}
                ],
                "rows": [
                    {rowsData}
                ]
            }';

        return str_replace("{rowsData}", $rowsData, $chartStructure);
    }
}

?>
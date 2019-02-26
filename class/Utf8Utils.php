<?php

class Utf8Utils
{

    static function utf8_encode_array($row)
    {
        foreach ($row as $key => $value) {
            if (! is_null($value)) {
                $obj->$key = utf8_encode($value);
            }
        }
        return $obj;
    }

    static function utf8_decode_array($row)
    {
        foreach ($row as $key => $value) {
            if (! is_null($value)) {
                $obj->$key = utf8_decode($value);
            }
        }
        return $obj;
    }
}
?>

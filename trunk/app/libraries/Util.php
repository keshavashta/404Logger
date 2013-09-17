<?php

class Util
{
    public static function getDecrementedDateTime($minutes)
    {
        $date = new DateTime();
        $toSub = new DateInterval("P" . $minutes . "M");
        $date->sub($toSub);
        return $date;
    }

    public static function pre_login()
    {
        Session::put('pre_login', URL::current());
    }

    public static function GUID()
    {

        if (function_exists('com_create_guid') === true) {
            return trim(com_create_guid(), '{}');
        }

        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }

}
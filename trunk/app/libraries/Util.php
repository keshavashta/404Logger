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

    public static function getDiallingNumber($dbNumber)
    {
//        return "23248*91" . ltrim($dbNumber, '0');
        return $dbNumber;
    }

    public static function getCleanNumber($plivoNumber)
    {
        $prefix = "23248*";
        if (substr($plivoNumber, 0, strlen($prefix)) == $prefix) {
            return substr($plivoNumber, strlen($prefix));
        }

        return $plivoNumber;
    }

    public static function pre_login()
    {
        Session::put('pre_login', URL::current());
    }


}
<?php

class AppHtmlHelper
{
    public static function getNewOrOldInput($oldInput, $newInput)
    {
        if (is_null($oldInput))
            return $newInput;
        return $oldInput;
    }

    public static function getValidationClass($value)
    {
        if ($value)
            return "alert-success alert";
        else {
            return "alert-error alert";
        }

    }

    public static function get404Code($code)
    {
        $source = URL::to('log') . '?code=' . $code;


        return htmlentities(" <script type='text/javascript' src='".$source."'></script>");
    }

}
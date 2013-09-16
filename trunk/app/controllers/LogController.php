<?php
/**
 * Created by JetBrains PhpStorm.
 * User: keshav
 * Date: 9/16/13
 * Time: 8:30 AM
 * To change this template use File | Settings | File Templates.
 */

class LogController extends BaseController
{

    public function getAddLog()
    {
        var_dump(Input::all());
    }

    public function getLogs()
    {
        echo "Logs";
    }

}
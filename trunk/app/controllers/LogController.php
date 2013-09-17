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
    private $logService;

    public function __construct()
    {
        $this->logService = new LogService();
    }

    public function getIndex()
    {
        $code = Input::get('code', null);
        if (!empty($code)) {
            var_dump(Input::all());
            $ip = Request::getClientIp();
            $httpReferrer = $_SERVER['HTTP_REFERER'];
            $url = "";
            $this->logService->addLog($url, $httpReferrer, $ip, $code);
        }
        echo "";

    }

    public function getList()
    {
        try {
            $websites = $this->logService->getLogs(Auth::user()->id);
            return View::make('logs.list')->with('logs', $websites);
        } catch (Exception $e) {
            echo "error";
        }
    }

}
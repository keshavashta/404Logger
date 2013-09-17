<?php
/**
 * Created by JetBrains PhpStorm.
 * User: keshav
 * Date: 9/17/13
 * Time: 9:10 AM
 * To change this template use File | Settings | File Templates.
 */

class LogService
{

    private $logRep;
    private $websiteRepo;

    public function __construct()
    {
        $this->logRep = new LogRepository();
        $this->websiteRepo = new WebsiteRepository();
    }

    public function addLog($url, $httpReferrer, $ip, $code)
    {
        $website = $this->websiteRepo->getWebsite($code);
        return $this->logRep->addLog($url, $httpReferrer, new DateTime(), $ip, $website->id);
    }

    public function getLogs($userId)
    {
        return $this->logRep->getLogs($userId);
    }
}
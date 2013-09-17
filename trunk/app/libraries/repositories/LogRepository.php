<?php
/**
 * Created by JetBrains PhpStorm.
 * User: keshav
 * Date: 9/17/13
 * Time: 9:04 AM
 * To change this template use File | Settings | File Templates.
 */

class LogRepository
{

    public function addLog($url, $httpReferrer, $visitedAt, $ip, $websiteId)
    {
        try {
            $websiteLog = new WebsiteLog();
            $websiteLog->url = $url;
            $websiteLog->httpReferrer = $httpReferrer;
            $websiteLog->visitedAt = $visitedAt;
            $websiteLog->ip = $ip;
            $websiteLog->websiteId = $websiteId;
            $websiteLog->save();
            return $websiteLog;
        } catch (Exception $e) {
            Log::error($e);
            throw $e;
        }
    }

    public function getLogs($userId)
    {

        try {
            return WebsiteLog::where('userId', '=', $userId)->paginate(Constants::PAGING_COUNT);
        } catch (Exception $e) {
            Log::error($e);
            throw $e;
        }


    }
}
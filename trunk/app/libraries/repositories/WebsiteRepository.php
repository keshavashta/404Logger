<?php
/**
 * Created by JetBrains PhpStorm.
 * User: keshav
 * Date: 9/17/13
 * Time: 8:20 AM
 * To change this template use File | Settings | File Templates.
 */

class WebsiteRepository
{

    public function addWebsite($name, $code, $userId)
    {
        try {
            $website = new Website();
            $website->name = $name;
            $website->code = $code;
            $website->userId = $userId;
            $website->save();
            return $website;
        } catch (Exception $e) {
            Log::error($e);
            throw $e;
        }

    }

    public function getWebsite($code)
    {
        try {
            return Website::where('code', '=', $code)->first();
        } catch (Exception $e) {
            Log::error($e);
            throw $e;
        }

    }

    public function getWebsites($userId)
    {
        try {
            return Website::where('userId', '=', $userId)->orderBy('name')->paginate(Constants::PAGING_COUNT);
        } catch (Exception $e) {
            Log::error($e);
            throw $e;
        }

    }
}
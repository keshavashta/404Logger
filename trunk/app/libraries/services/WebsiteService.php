<?php
/**
 * Created by JetBrains PhpStorm.
 * User: keshav
 * Date: 9/17/13
 * Time: 7:47 AM
 * To change this template use File | Settings | File Templates.
 */

class WebsiteService
{
    private $websiteRepo;

    public function __construct()
    {
        $this->websiteRepo = new WebsiteRepository();
    }

    public function addWebsite($name, $userId)
    {

        return $this->websiteRepo->addWebsite($name, Util::GUID(), $userId);
    }

    public function getWebsites($userId)
    {
        return $this->websiteRepo->getWebsites($userId);
    }
}
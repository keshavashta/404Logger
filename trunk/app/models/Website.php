<?php
/**
 * Created by JetBrains PhpStorm.
 * User: keshav
 * Date: 9/16/13
 * Time: 8:17 AM
 * To change this template use File | Settings | File Templates.
 */

class Website extends Eloquent
{
    protected $table = 'websites';

    public function logs()
    {
        return $this->hasMany('WebsiteLog','websiteId');
    }

}
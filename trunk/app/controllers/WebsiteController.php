<?php
/**
 * Created by JetBrains PhpStorm.
 * User: keshav
 * Date: 9/16/13
 * Time: 8:40 AM
 * To change this template use File | Settings | File Templates.
 */

class WebsiteController extends BaseController
{
    private $websiteService;

    public function __construct()
    {
        $this->beforeFilter("auth");
        $this->websiteService = new WebsiteService();
    }

    public function getAdd()
    {
        return View::make('website.addWebsite');
    }

    public function postAdd()
    {
        $data = Input::all();
        $rules = array(
            'domain' => 'Required'
        );

        $v = Validator::make($data, $rules);
        if ($v->passes()) {
            try {
                $website = $this->websiteService->addWebsite($data['domain'], \Auth::user()->id);
                return Redirect::to('website/list')->with('status', true)->with('message', 'Website added successfully');
            } catch (Exception $e) {
                return Redirect::to("website/add")->with('status', false)->with("message", "Internal Server Error");
            }
        } else {
            return Redirect::to('website/add')->withErrors($v->getMessageBag())->withInput($data);
        }
    }

    public function getList()
    {
        try {
            $websites = $this->websiteService->getWebsites(Auth::user()->id);
            return View::make('website.list')->with('websites', $websites);
        } catch (Exception $e) {
            echo "error";
        }
    }

}
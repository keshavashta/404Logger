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

    public function getAdd()
    {
        return View::make('website.addWebsite');
    }

    public function postAdd()
    {
        $data = Input::all();
        $rules = array(
            'domainName' => 'Required'
        );

        $v = Validator::make($data, $rules);
        if ($v->passes()) {
            try {

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

    }

}
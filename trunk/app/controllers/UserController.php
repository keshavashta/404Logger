<?php


class UserController extends BaseController
{


    public function __construct()
    {


    }

    public function getLogin()
    {
        return View::make("user.login");
    }

    public function postLogin()
    {

        $data = Input::all();

        $rules = array(
            'email' => 'Required|email',
            'password' => 'Required',
        );
        $v = Validator::make($data, $rules);
        if ($v->passes()) {

            $credentials = array(
                'email' => $data['email'],
                'password' => $data['password']
            );

            if (empty($data['email']) || empty($data['password'])) {
                return Redirect::to('/user/login')->withInput($data)->with("message", Lang::get('responsemessages.invalid_username_password'))->with('status', false);
            }
            if (Auth::attempt($credentials)) {
                $preLogin = Session::get('pre_login');
                if (!empty($preLogin))
                    return Redirect::to($preLogin);
                return Redirect::to("/");
            } else
                return Redirect::to('/user/login')->withInput($data)->with("message", Lang::get('responsemessages.invalid_username_password'))->with('status', false);
        } else {

            return Redirect::to('/user/login')->withErrors($v->getMessageBag())->withInput($data);
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return Redirect::to('/user/login');
    }



}
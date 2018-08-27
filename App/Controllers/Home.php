<?php

namespace App\Controllers;
//for using View
use Zest\View\View;
//for using auth management
use Zest\Auth\Auth;
use Zest\Auth\User;
class Home extends \Zest\Controller\Controller
{
    /**
     * Show the index page.
     *
     * @return void
     */
    public function index()
    {
        $user = new User;
        // in Auth user class there is method isLogin to check is user login or not
        if ($user->isLogin()) {
            // in Auth user class there is method loginUser that return the login user array
            $args = $user->loginUser();
            View::View('account/profile',$args[0]);
        } else {
            View::view('account/signup');
        }
    }
}

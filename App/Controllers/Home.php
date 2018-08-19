<?php

namespace App\Controllers;

//for using Middleware
use Zest\Middleware\Middleware;
//for using View
use Zest\View\View;
//for using auth
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
        if ($user->isLogin()) {
            $args = $user->loginUser();
            View::View('account/profile',$args[0]);
        } else {
            View::view('account/signup');
        }
    }

}

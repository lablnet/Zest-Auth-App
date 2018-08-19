<?php

namespace App\Components\hello\Controllers;

use Zest\Component\View\View;

/**
 * Home controller.
 *
 * PHP version 7.0
 */
class Home extends \Zest\Component\Controller\Controller
{
    /**
     * Show the index page.
     *
     * @return void
     */
    public function index()
    {
        View::view('hello', 'Home/index',[],false);
    }

    public function about()
    {
        echo $this->router_params['username'];
    }
}

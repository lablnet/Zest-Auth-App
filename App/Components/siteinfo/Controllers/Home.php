<?php

namespace App\Components\siteinfo\Controllers;

use Zest\Component\View\View;

class Home extends \Zest\Component\Controller\Controller
{
    
    /**
     * Show the index page.
     *
     * @return void
     */
    public function index()
    {
        echo View::view('siteinfo', 'Home/index');
    }
}

<?php

//create url: yoursite.com
$router->get('',"Home@index");
//Account
//create url: yoursite.com/acount/login
$router->get('account/login',"Account@login");
//create url: yoursite.com/acount/login/action
$router->post('account/login/action',"Account@loginProcess");
//create url: yoursite.com/acount/signup
$router->get('account/signup', "Account@signup");
//create url: yoursite.com/acount/signup/action
$router->post('account/signup/action', "Account@signupProcess");
//create url: yoursite.com/acount/logout
$router->get('account/logout', "Account@logout");
//create url: yoursite.com/@username
$router->get('{username:@([a-zA-Z0-9])+}', "Account@profileView");
//create url: yoursite.com/acount/profile/edit
$router->get('account/profile/edit', "Account@profileEdit");
//create url: yoursite.com/acount/update/action
$router->post('account/update/action', "Account@profileUpdate");
//create url: yoursite.com/acount/update/bio/action
$router->post('account/update/bio/action', "Account@profileBioUpdate");
//create url: yoursite.com/acount/update/password/action
$router->post('account/update/password/action', "Account@profilePasswordUpdate");
//create url: yoursite.com/acount/reset
$router->get('account/reset', "Account@reset");
//create url: yoursite.com/acount/reset/action
$router->post('account/reset/action',"Account@resetProcess");
//create url: yoursite.com/acount/reset/password/$token
$router->get('account/reset/password/{token:[A-Za-z0-9]+}', "Account@resetPassword");
//create url: yoursite.com/account/reset/password-password/process
$router->post('account/reset/password-password/process', "Account@resetPasswordProcess");
//Cache the routes
$router->cacheRouters();
//Dispatch the request
$router->dispatch($_SERVER['QUERY_STRING']);

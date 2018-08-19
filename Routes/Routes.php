<?php

// Add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);

//Account
$router->add('account/login', ['controller' => 'Account', 'action' => 'login']);
$router->add('account/login/action', ['controller' => 'Account', 'action' => 'loginProcess']);
$router->add('account/signup', ['controller' => 'Account', 'action' => 'signup']);
$router->add('account/signup/action', ['controller' => 'Account', 'action' => 'signupProcess']);
$router->add('account/logout', ['controller' => 'Account', 'action' => 'logout']);
$router->add('{username:@([a-zA-Z0-9])+}', ['controller' => 'Account', 'action' => 'profileView']);
$router->add('account/profile/edit', ['controller' => 'Account', 'action' => 'profileEdit']);
$router->add('account/update/action', ['controller' => 'Account', 'action' => 'profileUpdate']);
$router->add('account/update/bio/action', ['controller' => 'Account', 'action' => 'profileBioUpdate']);
$router->add('account/update/password/action', ['controller' => 'Account', 'action' => 'profilePasswordUpdate']);

$router->add('account/reset', ['controller' => 'Account', 'action' => 'reset']);
$router->add('account/reset/action', ['controller' => 'Account', 'action' => 'resetProcess']);

$router->add('account/reset/password/{token:[A-Za-z0-9]+}', ['controller' => 'Account', 'action' => 'resetPassword']);
$router->add('account/reset/password-password/process', ['controller' => 'Account', 'action' => 'resetPasswordProcess']);
//Cache the routes
$router->cacheRouters();
//Dispatch the request
$router->dispatch($_SERVER['QUERY_STRING']);

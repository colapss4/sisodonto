<?php

$routes->get('/login', 'Web\Login::index', ['as' => 'login']);
$routes->post('/login', 'Web\Login::authenticate', ['as' => 'login.post']);
$routes->get('/register', 'Web\Register::index', ['as' => 'register']);
$routes->post('/register', 'Web\Register::register', ['as' => 'register.post']);
$routes->get('/reset', 'Web\Reset::index', ['as' => 'reset']);

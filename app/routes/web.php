<?php

$routes->get('/login', 'Web\Login::index', ['as' => 'login']);
$routes->get('/register', 'Web\Register::index', ['as' => 'register']);
<?php

$routes->get('/login', 'Web\LoginController::index', ['as' => 'login']);
$routes->post('/login', 'Web\LoginController::authenticate', ['as' => 'login.post']);
$routes->get('/register', 'Web\RegisterController::index', ['as' => 'register']);
$routes->post('/register', 'Web\RegisterController::register', ['as' => 'register.post']);
$routes->get('/reset', 'Web\ResetController::index', ['as' => 'reset']);
$routes->get('/clinics', 'Web\ClinicsController::index', ['as' => 'clinics']);

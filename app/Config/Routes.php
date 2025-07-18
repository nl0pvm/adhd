<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->match(['get', 'post'], 'register', 'AuthController::register');
$routes->match(['get', 'post'], 'login', 'AuthController::login');
$routes->match(['get', 'post'], 'verify-otp', 'AuthController::verifyOtp');
$routes->get('logout', 'AuthController::logout');
$routes->match(['get', 'post'], 'forgot-password', 'AuthController::forgotPassword');
$routes->match(['get', 'post'], 'reset-password', 'AuthController::resetPassword');

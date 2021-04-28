<?php

/**
 * Composer
 */
require dirname(__DIR__) . '/Vendor/Autoload.php';

/**
 * Error and Exception handling
 */
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');


/**
 * Routing
 */
$router = new Core\Router();

// Add the routes
$router->add('', ['controller' => 'Welcome', 'action' => 'index']);
$router->add('posts', ['controller' => 'PostController', 'action' => 'index']);
$router->add('post/create', ['controller' => 'PostController', 'action' => 'createPage']);
$router->add('post/createPost', ['controller' => 'PostController', 'action' => 'create']);

$router->add('{controller}/{action}');

// echo '<pre>';
// print_r($_SERVER);

if (isset($_SERVER['QUERY_STRING'])) {
    $router->dispatch($_SERVER['QUERY_STRING']);
} else {
    $router->dispatch('');
}


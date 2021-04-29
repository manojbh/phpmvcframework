<?php
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

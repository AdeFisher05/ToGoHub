<?php

declare(strict_types=1);
use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\Dispatcher;
// $path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
require 'vendor/autoload.php';
$router = new RouteCollector();

$router->any('/', function(){
    require "./home.php";
});

$router->any('/signup', function(){
    require './signup.php';
});

$router->any('/login', function(){
    require './login.php';
});

$router->any('/pay', function(){
    require './pay.php';
});

$router->any('/hires', function(){
     require './hires.php';
 });

 $router->any('/dashboard', function(){
     require './home.php';
 });

// Create dispatcher
$dispatcher = new Dispatcher($router->getData());

// Get the current path
$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

// Detect base folder dynamically 
$scriptName = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
if ($scriptName !== '/' && strpos($path, $scriptName) === 0) {
    $path = substr($path, strlen($scriptName));
}

// Ensure empty path defaults to "/"
if ($path === '' || $path === false) {
    $path = '/';
}

// Dispatch the route
$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $path);

// Output response (if any)
echo $response;
?>


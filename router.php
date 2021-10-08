<?php

namespace Aurora;

require_once __DIR__ . '/vendor/autoload.php';

use Exception;
use Phroute\Phroute\Dispatcher;
use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\Exception\HttpRouteNotFoundException;
use Aurora\Auth\Auth;
use Dotenv\Dotenv;

//Inicjacja pliku env
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

//Załadowanie sesji oraz inicjacja routera
session_start();
$router = new RouteCollector();

//Filter sprawdzający, czy użytytkownik jest zalogowany
$router->filter('auth', function() {    

    if(!Auth::isLogin()) {
        header('Location: ./login');
        return false;
    }
});

//Filter sprawdzajączy, czy użytkownik nie jest zalogowany
$router->filter('guest', function() {    
    if(Auth::isLogin()) {
        header('Location: ./home');
        return false;
    }
});

$router->get('/404', function() {
    return '<h1 style="text-align: center">Error: 404 </h1> <h3 style="text-align: center">Nie znaleziono strony<h3>';
});

//Routing wymagający zalogowania się
$router->group(['prefix' => $_ENV['PREFIX'], 'before' => 'auth'], function ($router) {
    $router->get('/logout', ['Aurora\Controllers\AuthController', 'logout']);
    $router->get('/home', ['Aurora\Controllers\HomeController', 'home']);

    //CRUD
    $router->get('/products', ['Aurora\Controllers\ProductController', 'products']);
    $router->post('/products', ['Aurora\Controllers\ProductController', 'newProduct']);
    $router->post('/products/edit/{id}', ['Aurora\Controllers\ProductController', 'editProduct']);
    $router->get('/products/delete/{id}', ['Aurora\Controllers\ProductController', 'deleteProduct']);


    $router->get('/categories', ['Aurora\Controllers\CategoryController', 'categories']);
    $router->post('/categories', ['Aurora\Controllers\CategoryController', 'newCategory']);
    $router->post('/categories/edit/{id}', ['Aurora\Controllers\CategoryController', 'editCategory']);
    $router->get('/categories/delete/{id}', ['Aurora\Controllers\CategoryController', 'deleteCategory']);
});

//Routing wymagający bycia niezalogowanym
$router->group(['prefix' => $_ENV['PREFIX'], 'before' => 'guest'], function ($router) {
    
    //Autoryzacja
    $router->get('/login', ['Aurora\Controllers\AuthController', 'login']);
    $router->get('/register', ['Aurora\Controllers\AuthController', 'register']);
    $router->post('/login', ['Aurora\Controllers\AuthController', 'loginUser']);
    $router->post('/register', ['Aurora\Controllers\AuthController', 'registerUser']);

});

$dispatcher = new Dispatcher($router->getData());

try {
    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    echo $response;
}
catch(HttpRouteNotFoundException $e) {
    $dispatcher = new Dispatcher($router->getData());
    $response = $dispatcher->dispatch('GET', 'aurora/404');
    echo $response;
}
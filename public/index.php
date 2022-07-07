<?php


use Source\App;
use Router\Router;
use Exceptions\RouteNotFound;
use Controllers\HomeController;
use Controllers\ProduitController;

require './../vendor/autoload.php';

define('BASE_VIEWS_PATH', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR) ;

$router = new Router() ;

$router->register('/',[HomeController::class,'index']);
$router->register('/produits',[ProduitController::class,'index']);


(new App($router,$_SERVER['REQUEST_URI']))->run();
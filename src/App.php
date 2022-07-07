<?php

namespace Source ;

use Exceptions\RouteNotFound;
use Router\Router;

class App {

    public function __construct(private Router $router,private string $requestUri){}

    public function run()
    {
        try{
            echo $this->router->resolve($this->requestUri);
         
         }catch(RouteNotFound $ex){
             echo $ex->getMessage();
         }
    }
}
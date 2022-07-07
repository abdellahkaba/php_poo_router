<?php

namespace Router ;

use Exceptions\RouteNotFound;

class Router {
    private  $routes = [] ;

    public function register(string $path, callable|array $action):void
    {
        $this->routes[$path] = $action ;
    }

    public function resolve(string $uri): mixed {

        $path = explode('?',$uri)[0];
        //on chercher le path
        $action = $this->routes[$path] ?? null; //si le chemin path est définie et dif# de null on le met dans action

       
        if(is_callable($action)){
            return $action ;
        }

        if(is_array($action)){
            //on extrait dans l'action la methode et la classe
            [$className,$methode] = $action ;

            //on verifie si la classe existe et la méthode aussi ?

            if(class_exists($className) && method_exists($className,$methode)){
                $class = new $className();
                return call_user_func_array([$class,$methode] , []) ; 
            }
        }
        throw new RouteNotFound();  
    }
}
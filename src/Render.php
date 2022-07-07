<?php

namespace Source ;

class Render {

    public function __construct(
        private string $viewPath,private ?array $param 
    )
    {}

    public function view() : string{
        ob_start();
        //on extrait cette classe param
        extract($this->param);
        require BASE_VIEWS_PATH . $this->viewPath . '.php' ;

        //Système de befeuring
        return ob_get_clean();
    }

    //la methode qui permet de retourner une nouvelle instance de render

    public static function make(string $viewPath,$param): static{
        return new static($viewPath,$param) ;

    }

    //on appel la methode view dans une methode_magique

    public function __toString()
    {
        return $this->view() ;
    }
}
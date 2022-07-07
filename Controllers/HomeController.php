<?php

namespace Controllers ;

use Models\User;
use Source\Render;

class HomeController {


   

    public function index() : Render{
       $userModel = new User();
       $users = $userModel->all();
        
       return Render::make('index',[
        "users" => $users
       ]) ;
    }
}
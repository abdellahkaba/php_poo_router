<?php
namespace Controllers;

use Source\Render;

class ProduitController {

    public function index(){
        
        return Render::make('produits/index');
    }
}
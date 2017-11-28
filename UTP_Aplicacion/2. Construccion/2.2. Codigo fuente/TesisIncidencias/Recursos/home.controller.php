<?php
require_once 'model/home.php';
require_once 'model/herramientas.php';

class homeController{
    
    private $model;
    private $herramientas;
    
    public function __CONSTRUCT(){
        $this->model = new Home();
        $this->herramientas = new herramientas();
        $this->herramientas->LogearseValidador();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/home/home.php';
        require_once 'view/footer.php';
    }
    

    

}
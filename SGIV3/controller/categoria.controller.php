<?php
require_once 'model/categoria.php';
require_once 'model/herramientas.php';

class categoriaController{
    
    private $model;
    private $herramientas;
    
    public function __CONSTRUCT(){
        $this->model = new categoria();
        $this->herramientas = new herramientas();
        $this->herramientas->LogearseValidador();

    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/categoria/categoria.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $categoria= new categoria();
        
        if(isset($_REQUEST['Id'])){
            $categoria = $this->model->Obtener($_REQUEST['Id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/categoria/categoria-editar.php';
        require_once 'view/footer.php';
    }

     public function Guardar(){
        $categoria = new categoria();
        
        
        
        $categoria->CATE_Id = $_REQUEST['CATE_Id'];
        $categoria->CATE_Descripcion = $_REQUEST['CATE_Descripcion'];        
        $categoria->USUA_Id = $_REQUEST['USUA_Id'];  
        $categoria->CATE_FechaRegistro = $_REQUEST['CATE_FechaRegistro'];  
        

        if($categoria->CATE_Id > 0 ){
            $this->model->Actualizar($categoria);
            
        }
        else{
             $this->model->Registrar($categoria);
               header('Location: index.php?c=categoria');
        }

        header('Location: index.php?c=categoria');
      
    }

}
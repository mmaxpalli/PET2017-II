<?php
require_once 'model/incidencia.php';
require_once 'model/herramientas.php';
require_once 'model/areas.php';

class escalarController{
    
    private $model;
    private $herramientas;
    
    public function __CONSTRUCT(){
        $this->model = new incidencia();
        $this->herramientas = new herramientas();
        $this->herramientas->LogearseValidador();

    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/incidencia/escalar.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $incidencia= new incidencia();
        
        if(isset($_REQUEST['Id'])){
            $incidencia = $this->model->ObtenerTratamiento($_REQUEST['Id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/incidencia/Escalar_incidencia-editar.php';
        require_once 'view/footer.php';
    }

      public function Guardar(){
        $incidencia = new incidencia();
        
        
        
        $incidencia->TRIN_Id = $_REQUEST['TRIN_Id'];
        $incidencia->NIVE_Id = $_REQUEST['NIVE_Id'];        
        $incidencia->USUA_Id = $_REQUEST['USUA_Id'];        


       // echo $incidencia->INCI_Id;

        if($incidencia->TRIN_Id > 0 ){
            $this->model->ActualizarEscalado($incidencia);
            
        }
        else{
             $this->model->Registrar($incidencia);
               header('Location: index.php?c=clasificar');
        }

        header('Location: index.php?c=escalar');
      
    }

    

    
}
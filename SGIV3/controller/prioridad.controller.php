<?php
require_once 'model/prioridad.php';
require_once 'model/herramientas.php';

class prioridadController{
    
    private $model;
    private $herramientas;
    
    public function __CONSTRUCT(){
        $this->model = new prioridad();
        $this->herramientas = new herramientas();
        $this->herramientas->LogearseValidador();

    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/prioridad/prioridad.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $prioridad= new prioridad();
        
        if(isset($_REQUEST['Id'])){
            $prioridad = $this->model->Obtener($_REQUEST['Id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/prioridad/prioridad-editar.php';
        require_once 'view/footer.php';
    }


     public function Guardar(){
        $prioridad = new prioridad();
        
        
        
        $prioridad->PRIO_Id = $_REQUEST['PRIO_Id'];
        $prioridad->PRIO_Nombre = $_REQUEST['PRIO_Impacto'];
        $prioridad->PRIO_Urgencia = $_REQUEST['PRIO_Urgencia'];
        $prioridad->PRIO_Impacto = $_REQUEST['PRIO_Impacto'];
        $prioridad->PRIO_Fecha = $_REQUEST['PRIO_Fecha'];
        $prioridad->INCI_Id = 1;
        $prioridad->PRIO_Orden = 1;
        $prioridad->USUA_Id = $_REQUEST['USUA_Id'];;
        $prioridad->PRIO_FechaAuditoria = $_REQUEST['PRIO_FechaAuditoria'];



        if($prioridad->PRIO_Id > 0 ){
            $this->model->Actualizar($prioridad);
            
        }
        else{
             $this->model->Registrar($prioridad);
               header('Location: index.php?c=prioridad');
        }
         header('Location: index.php?c=prioridad');
      
    }

}
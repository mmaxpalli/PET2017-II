<?php
require_once 'model/areas.php';
require_once 'model/herramientas.php';

/************************************************************************************************
* Descripción			: Creacion de la clase AreasController donde se definen las funciones   *
* Fecha Creación		: 4/08/2017                                         					*
* Fecha Modificación	: 13/08/2017  															*		
* Parámetros			: 																		*
* Autor					: Max Palli Uscamaita													*
* Versión				: 1.0																	*
* Cambios Importantes	:                                                         				*
*                                                                             					*                                        		
*                                                                             					*
************************************************************************************************/

class AreasController{
    
    private $model;
    private $herramientas;
    
    public function __CONSTRUCT(){
        $this->model = new areas();
        $this->herramientas = new herramientas();
        $this->herramientas->LogearseValidador();

    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/areas/areas.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $areas= new areas();
        
        if(isset($_REQUEST['Id'])){
            $areas = $this->model->Obtener($_REQUEST['Id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/areas/areas-editar.php';
        require_once 'view/footer.php';
    }


     public function Guardar(){
        $areas = new areas();
        
        
        
        $areas->AREA_Id = $_REQUEST['AREA_Id'];
        $areas->AREA_Nombre = $_REQUEST['AREA_Nombre'];        
        $areas->AREA_Descripcion = $_REQUEST['AREA_Descripcion'];  
        $areas->USUA_Id = $_REQUEST['USUA_Id'];  
        $areas->AREA_FechaAuditoria = $_REQUEST['AREA_FechaAuditoria'];  
        
      
        if($areas->AREA_Id > 0 ){
            $this->model->Actualizar($areas);
            
        }
        else{
             $this->model->Registrar($areas);
               header('Location: index.php?c=areas');
        }

        header('Location: index.php?c=areas');
      
    }
}
<?php
require_once 'model/incidencia.php';
require_once 'model/herramientas.php';
require_once 'model/areas.php';
require_once 'model/nivel.php';
require_once 'model/segu_usuario.php';
/***************************************************************************************************
* Descripción			: Creacion clase escalarController donde se definen atributos y funciones  *
* Fecha Creación		: 4/08/2017                                         					   *
* Fecha Modificación	: 13/08/2017  															   *		
* Parámetros			:																		   *
* Autor					: Max Palli Uscamaita							   						   *
* Versión				: 1.0																	   *
* Cambios Importantes	:                                                         				   *
*                                                                             					   *                                        		
*                                                                             					   *
***************************************************************************************************/

class escalarController{
    
    private $model;
    private $herramientas;
    
    public function __CONSTRUCT(){
        $this->model = new incidencia();
        $this->modelNivel = new nivel();
        $this->modelUsuarios = new segu_usuario();
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

      public function EscalarIncidencia(){
        $incidencia = new incidencia();
        
        
        
        $incidencia->INCI_Id = $_REQUEST['INCI_Id'];
        $incidencia->NIVE_Id = $_REQUEST['NIVE_Id'];        
        $incidencia->USUA_Id = $_REQUEST['USUA_Id'];        


       // echo $incidencia->INCI_Id;

        if($incidencia->INCI_Id > 0 ){
            $this->model->EscalarIncidencia($incidencia);
            
        }
        else{
             $this->model->Registrar($incidencia);
               header('Location: index.php?c=clasificar');
        }

        header('Location: index.php?c=escalar');
      
    }

    

    
}
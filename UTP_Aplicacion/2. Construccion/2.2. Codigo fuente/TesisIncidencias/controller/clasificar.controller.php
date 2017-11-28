<?php
require_once 'model/incidencia.php';
require_once 'model/herramientas.php';
require_once 'model/areas.php';
require_once 'model/categoria.php';
/***************************************************************************************************
* Descripción			: Creacion clase clasificarController donde se definen atributos y metodos *
* Fecha Creación		: 4/08/2017                                         					   *
* Fecha Modificación	: 13/08/2017  															   *		
* Parámetros			:																		   *
* Autor					: Max Palli Uscamaita							   						   *
* Versión				: 1.0																	   *
* Cambios Importantes	:                                                         				   *
*                                                                             					   *                                        		
*                                                                             					   *
***************************************************************************************************/

class clasificarController{
    
    private $model;
    private $herramientas;
    
    public function __CONSTRUCT(){
        $this->model = new incidencia();
        $this->modelCategoria = new categoria();
        $this->herramientas = new herramientas();
        $this->herramientas->LogearseValidador();

    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/incidencia/clasificar.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $incidencia= new incidencia();
        
        if(isset($_REQUEST['Id'])){
            $incidencia = $this->model->ObtenerIncidenciaId($_REQUEST['Id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/incidencia/Clasificar_incidencia-editar.php';
        require_once 'view/footer.php';
    }

      public function ClasificarIncidencia(){
        $incidencia = new incidencia();
        
        
        
        $incidencia->INCI_Id = $_REQUEST['INCI_Id'];
        $incidencia->INCI_Titulo = $_REQUEST['INCI_Titulo'];        
        $incidencia->CATE_Id = $_REQUEST['CATE_Id'];        


       // echo $incidencia->INCI_Id;

        if($incidencia->INCI_Id > 0 ){
            $this->model->ClasificarIncidencia($incidencia);
            
        }
        else{
             $this->model->Registrar($incidencia);
               header('Location: index.php?c=clasificar');
        }

        header('Location: index.php?c=clasificar');
      
    }

    

    
}
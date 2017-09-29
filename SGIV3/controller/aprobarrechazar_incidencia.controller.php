<?php


    

require_once 'model/aprobarrechazar_incidencia.php';
require_once 'model/incidencia.php';
require_once 'model/herramientas.php';
require_once 'model/areas.php';



/************************************************************************************************
* Descripción			: Creacion de la clase incidenciaController donde se definen las funciones *
* Fecha Creación		: 4/08/2017                                         					*
* Fecha Modificación	: 13/08/2017  															*		
* Parámetros			: 																		*
* Autor					: Max Palli Uscamaita													*
* Versión				: 1.0																	*
* Cambios Importantes	:                                                         				*
*                                                                             					*                                        		
*                                                                             					*
************************************************************************************************/
class aprobarrechazar_incidenciaController{
    
    private $model;
    private $herramientas;
    
    public function __CONSTRUCT(){
        $this->model = new aprobarrechazar_incidencia();
        $this->herramientas = new herramientas();
        $this->herramientas->LogearseValidador();

    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/incidencia/aprobarrechazar_incidencia.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $aprobarrechazar_incidencia= new aprobarrechazar_incidencia();
        
        if(isset($_REQUEST['Id'])){
            $aprobarrechazar_incidencia = $this->model->Obtener($_REQUEST['Id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/incidencia/aprobarrechazar_incidencia-editar.php';
        require_once 'view/footer.php';
    }

      public function Guardar(){

        $aprobarrechazar_incidencia = new aprobarrechazar_incidencia();
        $incidencia = new incidencia();
        
        
        
        
        $aprobarrechazar_incidencia->TRIN_FechaRegistro = $_REQUEST['TRIN_FechaRegistro'];
        $aprobarrechazar_incidencia->INCI_Id = $_REQUEST['INCI_Id'];
        $aprobarrechazar_incidencia->CATE_Id = $_REQUEST['CATE_IdNueva'];
        $aprobarrechazar_incidencia->AREA_Id = $_REQUEST['AREA_IdNueva'];
        $aprobarrechazar_incidencia->NIVE_Id = $_REQUEST['NIVE_IdNueva'];        
        $aprobarrechazar_incidencia->ESTA_Id = 4; // Codigo duro para PROCESANDO
        $aprobarrechazar_incidencia->PRIO_Id = $_REQUEST['PRIO_Id'];
        $aprobarrechazar_incidencia->USUA_IdResponsable = $_REQUEST['USUA_IdResponsable'];
        $aprobarrechazar_incidencia->USUA_Id = $_REQUEST['USUA_Id'];
        $aprobarrechazar_incidencia->TRIN_FechaAuditoria = $_REQUEST['TRIN_FechaAuditoria'];


        $incidencia->INCI_Id = $_REQUEST['INCI_Id'];



      $this->model->Registrar($aprobarrechazar_incidencia);
      $this->model->CambiaEstadoIncidencia($incidencia);
            
            header('Location: index.php?c=aprobarrechazar_incidencia');
      
    }


    public function RechazarIncidencia(){

        $incidencia = new incidencia();

        $incidencia->INCI_Id = $_REQUEST['INCI_Id'];

        $this->model->RechazarIncidencia($incidencia);
         header('Location: index.php?c=aprobarrechazar_incidencia');
    }

    
}

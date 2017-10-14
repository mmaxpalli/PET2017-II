<?php

require_once 'model/resolucion.php';
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
class resolucionController{
    
    private $model;
    private $herramientas;
    
    public function __CONSTRUCT(){
        $this->model = new resolucion();
        $this->herramientas = new herramientas();
        $this->herramientas->LogearseValidador();

    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/incidencia/resolucion.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $resolucion= new resolucion();
        
        if(isset($_REQUEST['Id'])){
            $resolucion = $this->model->Obtener($_REQUEST['Id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/incidencia/Resolucion_incidencia-editar.php';
        require_once 'view/footer.php';
    }

      public function Guardar(){

        $resolucion = new resolucion();
        $incidencia = new incidencia();
        



       if ($_POST['Guardar'])
       {
          $resolucion->INCI_Id                = $_REQUEST['INCI_Id'];
          $resolucion->REIN_FechaMovimiento   = $_REQUEST['REIN_FechaMovimiento'];
          $resolucion->REIN_TipoMovimiento    = $_REQUEST['REIN_TipoMovimiento'];
          $resolucion->REIN_TipoSolucion      = $_REQUEST['REIN_TipoSolucion'];        
          $resolucion->REIN_Notificado        = 0;
          $resolucion->TRIN_Id                = $_REQUEST['TRIN_Id'];
          $resolucion->REIN_Descripcion       = $_REQUEST['REIN_Descripcion'];
          $resolucion->USUA_Id                = $_REQUEST['USUA_Id'];
          $resolucion->REIN_FechaAuditoria    = $_REQUEST['REIN_FechaAuditoria'];
       }
       if ($_POST['Rechazar'])
       {
         $resolucion->INCI_Id                = $_REQUEST['INCI_Id'];
         $resolucion->REIN_FechaMovimiento   = $_REQUEST['REIN_FechaMovimiento'];
         $resolucion->REIN_TipoMovimiento    = $_REQUEST['REIN_TipoMovimiento'];
         $resolucion->REIN_TipoSolucion      = "Ninguno";        
         $resolucion->REIN_Notificado        = 0;
         $resolucion->TRIN_Id                = $_REQUEST['TRIN_Id'];
         $resolucion->REIN_Descripcion       = "Operador indica que no puede resolver la incidencia Reclasificar"."-".$_REQUEST['REIN_Descripcion'];
         $resolucion->USUA_Id                = $_REQUEST['USUA_Id'];
         $resolucion->REIN_FechaAuditoria    = $_REQUEST['REIN_FechaAuditoria']; 

       }
       if ($_POST['Notificar'])
       {
        $resolucion->INCI_Id                = $_REQUEST['INCI_Id'];
        $resolucion->REIN_FechaMovimiento   = $_REQUEST['REIN_FechaMovimiento'];
        $resolucion->REIN_TipoMovimiento    = $_REQUEST['REIN_TipoMovimiento'];
        $resolucion->REIN_TipoSolucion      = $_REQUEST['REIN_TipoSolucion'];        
        $resolucion->REIN_Notificado        = 1;
        $resolucion->TRIN_Id                = $_REQUEST['TRIN_Id'];
        $resolucion->REIN_Descripcion       = $_REQUEST['REIN_Descripcion']."Operador solicita cierre";
        $resolucion->USUA_Id                = $_REQUEST['USUA_Id'];
        $resolucion->REIN_FechaAuditoria    = $_REQUEST['REIN_FechaAuditoria'];
       }

         $this->model->Registrar($resolucion);
    //  $this->model->CambiaEstadoIncidencia($incidencia);
            
         header('Location: index.php?c=resolucion');
      
    }


    public function RechazarIncidencia(){

        $incidencia = new incidencia();

        $incidencia->INCI_Id = $_REQUEST['INCI_Id'];

        $this->model->RechazarIncidencia($incidencia);
         header('Location: index.php?c=aprobarrechazar_incidencia');
    }

    
}

<?php


require_once 'model/resolucion.php';
require_once 'model/Tratamiento_incidencias.php';
require_once 'model/incidencia.php';
require_once 'model/herramientas.php';


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
class cierreController{
    
    private $model;
    private $herramientas;
    
    public function __CONSTRUCT(){
        $this->modelIncidencias = new incidencia();
        $this->modelTratamiento = new Tratamiento_incidencias();
        $this->modelResolucion = new resolucion();
        $this->herramientas = new herramientas();
        $this->herramientas->LogearseValidador();

    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/incidencia/cierre.php';
        require_once 'view/footer.php';

       

    }
    
    public function Crud(){

        require_once 'view/header.php';
        require_once 'view/incidencia/cierre_incidencia-editar.php';
        require_once 'view/footer.php';

        $cierre= new cierre();
        
        if(isset($_REQUEST['Id'])){
            $resolucion = $this->model->Obtener($_REQUEST['Id']);
        }
        
      


        
    }

      public function Guardar(){

        $incidencia = new incidencia();
        $resolucion = new resolucion();
        $tratamiento  = new Tratamiento_incidencias();

          $incidencia->INCI_Id  = $_REQUEST['INCI_Id'];


          $resolucion->INCI_Id                = $_REQUEST['INCI_Id'];
          $resolucion->REIN_FechaMovimiento   = date("Y,m,d");
          $resolucion->REIN_TipoMovimiento    = 'Cierre de incidencia';
          $resolucion->REIN_TipoSolucion      = 'Ninguna';        
          $resolucion->REIN_Notificado        = 0;
          $resolucion->TRIN_Id                = $_REQUEST['TRIN_Id'];
          $resolucion->REIN_Descripcion       = 'La incidencia ha sido cerrada';
          $resolucion->USUA_Id                = $_SESSION['USUA_Id'];
          $resolucion->REIN_FechaAuditoria    = date("Y,m,d h:i:s");
         
          $tratamiento->TRIN_Id     = $_REQUEST['TRIN_Id'];


          //$data =  $cierre->INCI_Id;
           //echo("<script>console.log('PHP: ".$data."');</script>");

          $this->modelIncidencias->ActualizarEstadoIncidencia($incidencia);
          $this->modelResolucion->RegistrarResolucion($resolucion);
          $this->modelTratamiento->ActualizaTratamiento($tratamiento);



    //  $this->model->CambiaEstadoIncidencia($incidencia);
            
         header('Location: index.php?c=cierre');
      
    }

public function TablaModalHistorial()
{
  try
      {   

        $resolucion  =  new resolucion();
        $resolucion->INCI_Id  = $_REQUEST['INCI_Id'];
        $Listado = $resolucion->MostrarHistorialPorIncidencia($resolucion);
        echo json_encode($Listado);
      }
      catch(Exception $e)
      {
            die($e->getMessage());
       }
}  

//LLAVE CIERRE DE CLASE    
}

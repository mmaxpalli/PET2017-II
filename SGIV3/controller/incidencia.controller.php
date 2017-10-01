<?php
require_once 'model/incidencia.php';
require_once 'model/resolucion.php';
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
class incidenciaController{
    
    private $model;
    private $herramientas;
    
    public function __CONSTRUCT(){
        $this->model = new incidencia();
        $this->herramientas = new herramientas();
        $this->herramientas->LogearseValidador();

    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/incidencia/incidencia.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $incidencia= new incidencia();
        
        if(isset($_REQUEST['Id'])){
            $incidencia = $this->model->Obtener($_REQUEST['Id']);
            require_once 'view/header.php';
            require_once 'view/incidencia/responder_incidencia-editar.php';
            require_once 'view/footer.php';
        }
        else{
          require_once 'view/header.php';
          require_once 'view/incidencia/Registrar_incidencia-editar.php';
          require_once 'view/footer.php';
        }
        
    }

      public function Guardar(){
        $incidencia = new incidencia();
         $resolucion = new resolucion();
        
      
        
        $incidencia->INCI_Id = $_REQUEST['INCI_Id'];
        $incidencia->INCI_Titulo = $_REQUEST['INCI_Titulo'];
        $incidencia->INCI_Descripcion = $_REQUEST['INCI_Descripcion'];
        $incidencia->INCI_FechaRegistro = $_REQUEST['INCI_FechaAuditoria'];
        $incidencia->CATE_Id = $_REQUEST['AREA_Id'];
        $incidencia->ESTA_Id = 1;
        $incidencia->USUA_Id = $_REQUEST['USUA_Id'];
        $incidencia->USUA_IdAuditoria = 1;
        $incidencia->INCI_FechaAuditoria = $_REQUEST['INCI_FechaAuditoria'];

                  
        if($incidencia->INCI_Id > 0 ){
            $this->model->Actualizar($incidencia);
            
        }
        else{
             //$this->model->Registrar($incidencia);

            $RecobrarRegistros=$this->model->Registrar($incidencia);



            $REcoberegistro = explode("*", $RecobrarRegistros);
            $BeginConsultaEstado[0]=$REcoberegistro[0];
            $UltimoRegistro= $REcoberegistro[1];
           

            $resolucion->INCI_Id=$UltimoRegistro;

          
          //$resolucion->INCI_Id                = $_REQUEST['INCI_Id'];
          $resolucion->REIN_FechaMovimiento   = date("Y,m,d"); ;
          $resolucion->REIN_TipoMovimiento    = "Registro de incidencia";
          $resolucion->REIN_TipoSolucion      = "Ninguna";        
          $resolucion->REIN_Notificado        = 0;
          //$resolucion->TRIN_Id                = $_REQUEST['TRIN_Id'];
          $resolucion->REIN_Descripcion       = $_REQUEST['INCI_Descripcion'];
          $resolucion->USUA_Id                = $_REQUEST['USUA_Id'];
          $resolucion->REIN_FechaAuditoria    = $_REQUEST['INCI_FechaAuditoria'];


             $this->model->RegistrarResolucion($resolucion);

        header('Location: index.php?c=incidencia');
        }

      
    }

     public function ResponderIncidencia(){
        $incidencia = new incidencia();
         $resolucion = new resolucion();
        
      
          $resolucion->INCI_Id                 = $_REQUEST['INCI_Id'];
          $resolucion->REIN_FechaMovimiento   = date("Y,m,d"); ;
          $resolucion->REIN_TipoMovimiento    = "Respuesta";
          $resolucion->REIN_TipoSolucion      = "Ninguna";        
          $resolucion->REIN_Notificado        = 0;
          //$resolucion->TRIN_Id                = $_REQUEST['TRIN_Id'];
          $resolucion->REIN_Descripcion       = $_REQUEST['INCI_DescripcionRespuesta'];
          $resolucion->USUA_Id                = $_REQUEST['USUA_Id'];
          $resolucion->REIN_FechaAuditoria    = $_REQUEST['INCI_FechaAuditoria'];

           $this->model->RegistrarResolucion($resolucion);
            header('Location: index.php?c=incidencia');
      }

    
}



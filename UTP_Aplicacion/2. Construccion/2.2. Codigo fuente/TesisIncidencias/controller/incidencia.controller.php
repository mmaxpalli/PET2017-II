<?php
require_once 'model/incidencia.php';
require_once 'model/resolucion.php';
require_once 'model/herramientas.php';
require_once 'model/areas.php';
require_once 'model/categoria.php';
require_once 'model/nivel.php';


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
    

/***************************************************************************************************
* Descripción     : Constructor de la clase instanciando los modelos o herramientas necesarias        *
* Fecha Creación    : 4/08/2017                                                      *
* Fecha Modificación  : 13/08/2017                                   *    
* Parámetros      :                                      *
* Autor         : Jesus Mendoza Huillca                              *
* Versión       : 2.0                                    *
* Cambios Importantes :  Creacion del metodo LogearseValidador para comprobar los usuarios         logueadss                                                                  *

***************************************************************************************************/

    public function __CONSTRUCT(){
        $this->model = new incidencia();
        $this->modelArea = new areas();
        $this->modelCategoria = new categoria();
        $this->modelNivel = new nivel();
        $this->modelResolucion = new resolucion();
        $this->herramientas = new herramientas();
        $this->herramientas->LogearseValidador();

    }


/***************************************************************************************************
* Descripción     : Funciones INDEX y CRUD para para preparar la carga inicial de la vista        *
* Fecha Creación    : 4/08/2017                                                      *
* Fecha Modificación  : 13/08/2017                                   *    
* Parámetros      :                                      *
* Autor         : Max Palli
* Versión       : 2.0                                    *
* Cambios Importantes :  

***************************************************************************************************/



    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/incidencia/incidencia.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $incidencia= new incidencia();
        
        if(isset($_REQUEST['Id'])){
            $incidencia = $this->model->ObtenerIncidenciaId($_REQUEST['Id']);
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



/***************************************************************************************************
* Descripción     : Funcion guardar recibe todos sus parametros a traves POST desde la vista Registrar_incidencia-editar        *
* Fecha Creación    : 4/08/2017                                                      *
* Fecha Modificación  : 13/08/2017                                   *    
* Parámetros      :                                      *
* Autor         : Max Palli
* Versión       : 2.0                                    *
* Cambios Importantes :  

***************************************************************************************************/

      public function RegistrarIncidencia(){
        $incidencia = new incidencia();
         $resolucion = new resolucion();
        
        $Fotosubir=$this->herramientas->Foto($_FILES,$_REQUEST['INCI_Titulo']);
        $Fotosubir==""?$Foto=$_REQUEST['CapturaAdjunta']:$Foto=$Fotosubir;
        
        $incidencia->INCI_Id = $_REQUEST['INCI_Id'];
        $incidencia->INCI_Titulo = $_REQUEST['INCI_Titulo'];
        $incidencia->INCI_Descripcion = $_REQUEST['INCI_Descripcion'];
        $incidencia->INCI_FechaRegistro = $_REQUEST['INCI_FechaAuditoria'];
        $incidencia->AREA_Id = $_REQUEST['AREA_Id'];
        $incidencia->CATE_Id = $_REQUEST['CATE_Id'];
        $incidencia->ESTA_Id = 1; // Codigo de estado de ennviado
        $incidencia->INCI_Captura = $Foto;
        $incidencia->USUA_Id = $_REQUEST['USUA_Id'];
        $incidencia->USUA_IdAuditoria = 1;
        $incidencia->INCI_FechaAuditoria = $_REQUEST['INCI_FechaAuditoria'];

                  
        if($incidencia->INCI_Id > 0 ){
            $this->model->Actualizar($incidencia);
            
        }
        else{
             //$this->model->Registrar($incidencia);

            $RecobrarRegistros=$this->model->RegistrarIncidencia($incidencia);



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


             $this->modelResolucion->RegistrarResolucion($resolucion);

        header('Location: index.php?c=incidencia');
        }

      
    }



/***************************************************************************************************
* Descripción     : Funcion responder incidencia para que el usuario envie sus observaciones a su operador        *
* Fecha Creación    : 4/08/2017                                                      *
* Fecha Modificación  : 13/08/2017                                   *    
* Parámetros      :                                      *
* Autor         : Max Palli
* Versión       : 2.0                                    *
* Cambios Importantes :  

***************************************************************************************************/




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

           $this->modelResolucion->RegistrarResolucion($resolucion);
            header('Location: index.php?c=incidencia');
      }

    
}



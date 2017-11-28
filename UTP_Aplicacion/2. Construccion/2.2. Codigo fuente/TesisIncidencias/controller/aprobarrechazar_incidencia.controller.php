<?php    


require_once 'model/incidencia.php';
require_once 'model/herramientas.php';
require_once 'model/areas.php';
require_once 'model/nivel.php';
require_once 'model/segu_usuario.php';
require_once 'model/categoria.php';
require_once 'model/resolucion.php';
require_once 'model/tratamiento_incidencias.php';



/************************************************************************************************
* Descripción           : Creacion de la clase incidenciaController donde se definen las funciones *
* Fecha Creación        : 4/08/2017                                                             *
* Fecha Modificación    : 13/08/2017                                                            *       
* Parámetros            :                                                                       *
* Autor                 : Max Palli Uscamaita                                                   *
* Versión               : 1.0                                                                   *
* Cambios Importantes   :                                                                       *
*                                                                                               *                                               
*                                                                                               *
************************************************************************************************/
class aprobarrechazar_incidenciaController{
    
    private $model;
    private $modelResolucion;
    private $modelCategoria;
    private $modelIncidencia;
    private $modelArea;
    private $modelNivel;
    private $modelUsuarios;
    private $herramientas;
    private $modelTratamiento;

    public function __CONSTRUCT(){
        //$this->model = new incidencia();
        $this->modelResolucion = new resolucion();
        $this->modelCategoria=new categoria();
        $this->modelArea=new areas();
        $this->modelNivel=new nivel();
        $this->modelUsuarios=new segu_usuario();
        $this->modelIncidencia=new incidencia();
        $this->herramientas = new herramientas();
        $this->modelTratamiento=new tratamiento_incidencias();
        $this->herramientas->LogearseValidador();

    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/incidencia/aprobarrechazar_incidencia.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        //$aprobarrechazar_incidencia= new aprobarrechazar_incidencia();
        $modelTratamiento=new tratamiento_incidencias();
        if(isset($_REQUEST['Id'])){
            $modelTratamiento = $this->modelIncidencia->ObtenerIncidenciaId($_REQUEST['Id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/incidencia/aprobarrechazar_incidencia-editar.php';
        require_once 'view/footer.php';
    }

      public function AprobarIncidencia(){

        
        $incidencia = new incidencia();
        $modelTratamiento=new tratamiento_incidencias();
        $modelResolucion=new resolucion();
        
        
        
        $modelTratamiento->TRIN_FechaRegistro = $_REQUEST['TRIN_FechaRegistro'];
        $modelTratamiento->INCI_Id = $_REQUEST['INCI_Id'];
        $modelTratamiento->CATE_Id = $_REQUEST['CATE_IdNueva'];
        $modelTratamiento->AREA_Id = $_REQUEST['AREA_IdNueva'];
        $modelTratamiento->NIVE_Id = $_REQUEST['NIVE_IdNueva'];        
        $modelTratamiento->ESTA_Id = 4; // Codigo duro para PROCESANDO
        $modelTratamiento->PRIO_Id = $_REQUEST['PRIO_Id'];
        $modelTratamiento->USUA_IdResponsable = $_REQUEST['USUA_IdResponsable'];
        $modelTratamiento->USUA_Id = $_REQUEST['USUA_Id'];
        $modelTratamiento->TRIN_FechaAuditoria = $_REQUEST['TRIN_FechaAuditoria'];

       
       // echo("<script>console.log('PHP: ".$data."');</script>");

        $incidencia->INCI_Id = $_REQUEST['INCI_Id'];
        $incidencia->CATE_Id = $_REQUEST['CATE_IdNueva'];
        $incidencia->AREA_Id = $_REQUEST['AREA_IdNueva'];

        $modelResolucion->INCI_Id = $_REQUEST['INCI_Id'];
        $modelResolucion->REIN_FechaMovimiento = $_REQUEST['TRIN_FechaRegistro'];
        $modelResolucion->REIN_TipoMovimiento = "Aprobacion de incidencia";
        $modelResolucion->REIN_TipoSolucion ="-";
        $modelResolucion->REIN_Notificado = "-";
        $modelResolucion->TRIN_Id = NULL;
        $modelResolucion->REIN_Descripcion = "Aprobacion de incidencia";
       // $modelResolucion->USUA_IdAprobado = $_REQUEST['USUA_Id'];
        $modelResolucion->USUA_Id = $_REQUEST['USUA_Id'];
        $modelResolucion->REIN_FechaAuditoria = $_REQUEST['TRIN_FechaAuditoria'];
            


        $this->modelTratamiento->RegistrarTratamiento($modelTratamiento);   
        $this->modelIncidencia->AprobarIncidencia($incidencia);      
        $this->modelResolucion->RegistrarResolucion($modelResolucion); 

        header('Location: index.php?c=aprobarrechazar_incidencia');
      
    }


    public function RechazarIncidencia(){

        $incidencia = new incidencia();

        $incidencia->INCI_Id = $_REQUEST['INCI_Id'];

        $this->modelIncidencia->RechazarIncidencia($incidencia);
         header('Location: index.php?c=aprobarrechazar_incidencia');
    }

    
}


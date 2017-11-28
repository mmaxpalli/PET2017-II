<?php
//require_once 'model/ReporteIncidenciaCategorias.php';
require_once 'model/incidencia.php';
require_once 'model/categoria.php';
require_once 'model/herramientas.php';
require_once 'Recursos/PHPExcel-1.8/Classes/PHPExcel.php';
require('Recursos/Fpdf/fpdf.php'); 


class ReporteIncidenciaCategoriasController{
    
    private $model;
    private $herramientas;
    private $modelIncidencias;
    
    public function __CONSTRUCT(){
        //$this->model = new ReporteIncidenciaCategorias();
        $this->modelCategoria = new categoria();
        $this->modelIncidencias = new incidencia();
        $this->herramientas = new herramientas();
        $this->herramientas->LogearseValidador();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/reportes/ReporteIncidenciaPorCategoria/ReporteIncidenciaCategorias.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $ReporteIncidenciaCategorias = new ReporteIncidenciaCategorias();
        
        if(isset($_REQUEST['Id'])){

                  $ReporteIncidenciaCategorias = $this->model->Obtener($Id);
        }

         require_once 'view/header.php';
         require_once 'view/incidencia_categoria/incidencia_categoria-editar.php';
         require_once 'view/footer.php';        
 
    }

    public function ObtenerDatosReporte()
    {
        $Incidencia = new incidencia();

        $datepicker = date("Y/m/d", strtotime($_REQUEST['FechaInicio']));
        $datepicker2 = date("Y/m/d", strtotime($_REQUEST['FechaFin']));
        $DatoN=$_REQUEST['catid'];

        $Listado=$Incidencia->ReporteIncidenciaPorCategoria($DatoN,$datepicker,$datepicker2);

        echo json_encode($Listado);
 
    }
    


     public function SaldoTablaExcelPdf()
    {
        try
        {   
                if($_REQUEST['TipoDoc']=="Excel")
                {
                    require_once 'view/reportes/ReporteIncidenciaPorCategoria/incidencia_categoria-excel.php';
                }
                else
                {
                    require_once 'view/reportes/ReporteIncidenciaPorCategoria/incidencia_categoria-pdf.php';
                }
        }

        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

}
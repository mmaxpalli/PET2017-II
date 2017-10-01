<?php
require_once 'model/incidencia_categoria.php';
require_once 'model/herramientas.php';
require_once 'Recursos/PHPExcel-1.8/Classes/PHPExcel.php';
require('Recursos/Fpdf/fpdf.php'); 


class incidencia_categoriaController{
    
    private $model;
    private $herramientas;
    
    public function __CONSTRUCT(){
        $this->model = new incidencia_categoria();
        $this->herramientas = new herramientas();
        $this->herramientas->LogearseValidador();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/incidencia_categoria/incidencia_categoria-editar.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $incidencia_categoria = new incidencia_categoria();
        
        if(isset($_REQUEST['Id'])){

                  $incidencia_categoria = $this->model->Obtener($Id);
        }



         require_once 'view/header.php';
         require_once 'view/incidencia_categoria/incidencia_categoria-editar.php';
         require_once 'view/footer.php';
        
 
    }

    public function TblVendedorRpt(){
        $incidencia_categoria = new incidencia_categoria();

        $datepicker = date("Y/m/d", strtotime($_REQUEST['FechaInicio']));
        $datepicker2 = date("Y/m/d", strtotime($_REQUEST['FechaFin']));
        $DatoN=$_REQUEST['catid'];

        $Listado=$incidencia_categoria->incidencia_categoriatTbl($DatoN,$datepicker,$datepicker2);

        echo json_encode($Listado);
 
    }
    


     public function SaldoTablaExcelPdf()
    {
        try


        {   
                if($_REQUEST['TipoDoc']=="Excel"){
                    require_once 'view/incidencia_categoria/incidencia_categoria-excel.php';
                }
                else{
                    require_once 'view/incidencia_categoria/incidencia_categoria-pdf.php';
                }

                
        }

        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }






}
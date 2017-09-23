<?php
require_once 'model/gene_persona.php';
require_once 'model/herramientas.php';


class testerController{
    
    private $model;
    private $herramientas;
    
    public function __CONSTRUCT(){
        $this->model = new gene_persona();
        $this->herramientas = new herramientas();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/tester/tester.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $gene_persona = new gene_persona();
        
        if(isset($_REQUEST['Id'])){
            $gene_persona = $this->model->Obtener($_REQUEST['Id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/tester/tester-editar.php';
        require_once 'view/footer.php';
    }
    


    
    public function Guardar(){
        $gene_persona = new gene_persona();
        
        $gene_persona->EMPR_Id = $_REQUEST['EMPR_Id'];           
        $gene_persona->PERS_Id = $_REQUEST['PERS_Id'];
        $gene_persona->PERS_NombreComercial = $_REQUEST['PERS_NombreComercial'];
        $gene_persona->TIPO_IdPersona = $_REQUEST['TIPO_IdPersona'];
        $gene_persona->PERS_RazonSocial = $_REQUEST['PERS_RazonSocial'];
        $gene_persona->PERS_RepresentanteLegal = $_REQUEST['PERS_RepresentanteLegal'];
        $gene_persona->PERS_RUC = $_REQUEST['PERS_RUC'];
        $gene_persona->PERS_Nombre = $_REQUEST['PERS_Nombre'];
        $gene_persona->PERS_Apellido = $_REQUEST['PERS_Apellido'];
        $gene_persona->PERS_DocumentoIdentidad = $_REQUEST['PERS_DocumentoIdentidad'];
        $gene_persona->TIPO_IdDocumentoIdentidad = $_REQUEST['TIPO_IdDocumentoIdentidad'];
        $gene_persona->PERS_Sexo = $_REQUEST['PERS_Sexo'];
        $gene_persona->PERS_Telefono1 = $_REQUEST['PERS_Telefono1'];
        $gene_persona->PERS_Celular = $_REQUEST['PERS_Celular'];
        $gene_persona->PERS_DireccionPrincipal = $_REQUEST['PERS_DireccionPrincipal'];
        $gene_persona->PERS_DireccionReferencia = $_REQUEST['PERS_DireccionReferencia'];
        $gene_persona->UBGE_Id = $_REQUEST['UBGE_Id'];
        $gene_persona->PERS_CorreoElectronico = $_REQUEST['PERS_CorreoElectronico'];
        $gene_persona->TIPO_IdEstadoPersona = $_REQUEST['TIPO_IdEstadoPersona'];
        $gene_persona->USUA_Id = $_REQUEST['USUA_Id'];
        $gene_persona->PERS_FechaAuditoria = $_REQUEST['PERS_FechaAuditoria'];






        $gene_persona->PERS_Id > 0 
            ? $this->model->Actualizar($gene_persona)
            : $this->model->Registrar($gene_persona);
        
        header('Location: index.php?c=tester');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['PERS_Id']);
        header('Location: index.php?c=tester');
    }
}
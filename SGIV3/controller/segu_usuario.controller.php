<?php
require_once 'model/segu_usuario.php';
require_once 'model/herramientas.php';

class segu_usuarioController{
    
    private $model;
    private $herramientas;
    
    public function __CONSTRUCT(){
        $this->model = new segu_usuario();
        $this->herramientas = new herramientas();
        $this->herramientas->LogearseValidador();

    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/segu_usuario/segu_usuario.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $segu_usuario= new segu_usuario();
        
        if(isset($_REQUEST['Id'])){
            $segu_usuario = $this->model->Obtener($_REQUEST['Id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/segu_usuario/segu_usuario-editar.php';
        require_once 'view/footer.php';
    }
    
     public function Guardar(){
        $segu_usuario = new segu_usuario();
        
        
        
        $segu_usuario->USUA_Id = $_REQUEST['USUA_Id'];
        $segu_usuario->USUA_Nombre = $_REQUEST['USUA_Nombre'];
        $segu_usuario->USUA_Nick = $_REQUEST['USUA_Nick'];
        $segu_usuario->USUA_Password = $_REQUEST['USUA_Password'];
        $segu_usuario->ROL_Id = $_REQUEST['ROL_Id'];
        $segu_usuario->USUA_FechaCreacion = $_REQUEST['USUA_FechaCreacion'];
        $segu_usuario->USUA_FechaAuditoria = $_REQUEST['USUA_FechaAuditoria'];



        if($segu_usuario->USUA_Id > 0 ){
            $this->model->Actualizar($segu_usuario);
           
            foreach($this->herramientas->ActualizarSession() as $r):
                    
                    $_SESSION['USUA_Id']=$r->USUA_Id;
                    $_SESSION['USUA_Nombre']=$r->USUA_Nombre; 
                    $_SESSION['USUA_Nick']=$r->USUA_Nick;
                    $_SESSION['USUA_Password']= $r->USUA_Password;
                    $_SESSION['ROL_Id']= $r->ROL_Id;
                    $_SESSION['autentificado']= "SI";
            endforeach;
            
        }
        else{
             $this->model->Registrar($segu_usuario);
        }
        header('Location: index.php?c=segu_usuario');
    }

    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['Id']);
        header('Location: index.php?c=segu_usuario');
    }
}
<?php
session_start();
require_once 'model/login.php';
//require_once 'model/herramientas.php';


class LoginController{
    
    private $model;
    private $herramientas;

    
    public function __CONSTRUCT(){
        $this->model = new login();
        
    }
    
    public function Index(){
        //require_once 'view/header.php';
        require_once 'view/login/login.php';
        //require_once 'view/footer.php';

      
    }

    
    public function Verificar(){
        if (count($this->model-> VerificarUsuario($_REQUEST['usuario'],$_REQUEST['password']))>0)
            {
                  foreach($this->model->VerificarUsuario($_REQUEST['usuario'],$_REQUEST['password']) as $r):
                    $_SESSION['USUA_Id']=$r->USUA_Id;
                    $_SESSION['USUA_Nombre']=$r->USUA_Nombre;                     
                    $_SESSION['ROL_Id']= $r->ROL_Id;
                    $_SESSION['ROL_Nombre']= $r->ROL_Nombre;                    
                    $_SESSION['USUA_Nick']= $r->USUA_Nick;                    
                    $_SESSION['autentificado']= "SI";

                 endforeach;

               header('Location:?c=gene_cliente');
            }
       else{
                header('Location:index.php?c=login');
            }
    }
    public function Eliminar(){
        session_destroy();
        header('Location:index.php?c=login');
    } 

    

    public function VerfificarUsuarioAjax()
    {
        try
        {   

        //$comboprodutos=$_POST['comboprodutos'];
        $Login=new Login();
        $usuario=$_REQUEST['usuario'];
        $password=$_REQUEST['password'];

        $Tester=$Login->validarajxusuario($usuario,$password);
        echo json_encode($Tester);

        }

        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function TxSesion(){


        if (count($this->model-> VerificarUsuario($_REQUEST['usuario'],$_REQUEST['password']))>0)
            {
                  foreach($this->model->VerificarUsuario($_REQUEST['usuario'],$_REQUEST['password']) as $r):
                  
                    $_SESSION['USUA_Id']=$r->USUA_Id;
                    $_SESSION['USUA_Nombre']=$r->USUA_Nombre;                     
                    $_SESSION['ROL_Id']= $r->ROL_Id;
                    $_SESSION['ROL_Nombre']= $r->ROL_Nombre;                    
                    $_SESSION['USUA_Nick']= $r->USUA_Nick;                    
                    $_SESSION['autentificado']= "SI";

                 endforeach;

               //header('Location:?c=gene_cliente');
            }
       else{
               // header('Location:index.php?c=login');
            }

        }



    public function VerificarIntentos(){

            
            $_SESSION['Intentos']+=1;

              if ($_SESSION['Intentos'] < 4) {
                 $IntentoNumero = $_SESSION['Intentos'] ;          
                  echo $IntentoNumero; 
              }
              else{

                 echo "5"; 
                 unset($_SESSION['Intentos']);
                 $_SESSION['Intentos'] = 0;
              $this->model-> BloquearCuenta($_REQUEST['usuario']);
                 //header('Location:index.php?c=login');
              }

                
                
    }




   
}
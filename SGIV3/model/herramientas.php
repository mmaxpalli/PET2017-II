<?php
class herramientas
{



    

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::StartUp();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}



	public function MenuValidacion($MenuPadre)
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT 
											M.MENU_Id,
											M.MENU_Padre,
											M.MENU_Nombre,
											M.MENU_NombreFormulario,
											M.MENU_Icono,
											R.ROL_Id,
											R.ROL_Nombre
											FROM 
											menus M
											inner join permiso_rol PR on M.MENU_Id = PR.MENU_Id
											inner join rol R on PR.ROL_Id = R.ROL_Id
											WHERE 
											PR.ROL_Id = ".$_SESSION['ROL_Id']." 
											and MENU_Padre=?");
			$stm->execute(array($MenuPadre));

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

public function MenuValidacionCabeceras()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT DISTINCT MENU_Padre FROM menus");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function ActiveMenus($ActiveMenu)
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT MENU_Padre FROM menus where MENU_NombreFormulario = ?");
			$stm->execute(array($ActiveMenu));

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}


	public function Foto(array $_files,$imagenNickUsuario){

			$ruta="Recursos/Imagen/";
			$imagennombre="";
			$files = array();


			if(isset($_files['USUA_Foto'])){

				  $uploadfile_nombreFull = $_files['USUA_Foto']['name'];
				  $file_tmp =$_files['USUA_Foto']['tmp_name'];
				  move_uploaded_file($file_tmp,$ruta.$uploadfile_nombreFull); 
				  $imagennombre=$_files['USUA_Foto']['name'];

				  $mTmpFile =$ruta.$_FILES['USUA_Foto']['name'];

						$info_imagen = getimagesize($mTmpFile);	
					    $miniatura_ancho_maximo = 160;
	  					$miniatura_alto_maximo = 160;
	    			    $imagen_widt = $info_imagen[0];
	 					$imagen_height = $info_imagen[1];
	    				$imagen_tipo = $info_imagen['mime'];	  

		//	if (($imagen_widt > 160)||($imagen_height > 160)){
						//  echo('Las dimensiones de la imagen, '.$imagen_widt.' x '.$imagen_height.'extension'.$imagen_tipo.' p&iacute;xeles, no son las requeridas, 150 x 150 p&iacute;xeles.');

						   switch ( $imagen_tipo ){
					    	case "image/jpg":
					    	case "image/jpeg":
					    		$imagen = imagecreatefromjpeg( $mTmpFile );
					    		$extension=".jpg";
					    		break;
					    	case "image/png":
					    		$imagen = imagecreatefrompng( $mTmpFile );
					    		$extension=".png";
					    		break;
					    }
	    
	    		$lienzo = imagecreatetruecolor( $miniatura_ancho_maximo, $miniatura_alto_maximo );
	    		imagecopyresampled($lienzo, $imagen, 0, 0, 0, 0, $miniatura_ancho_maximo, $miniatura_alto_maximo, $imagen_widt, $imagen_height);
	    		imagejpeg($lienzo,$ruta.$uploadfile_nombreFull,100);


	    		rename($ruta.$uploadfile_nombreFull, $ruta.$imagenNickUsuario.$extension);

	    		$imagennombre=$imagenNickUsuario.$extension;
	    		

			}
			else{
					$imagennombre="Default";

			}

			return $imagennombre;

	}

	public function UploadPdf(array $_files){

			$ruta="Recursos/PDF/";
			$pdfnombre="";
			$files = array();


			if(isset($_files['PROD_Protocolo'])){

				  $uploadfile_nombreFull = $_files['PROD_Protocolo']['name'];
				  $file_tmp =$_files['PROD_Protocolo']['tmp_name'];
				  move_uploaded_file($file_tmp,$ruta.$uploadfile_nombreFull); 
				  $pdfnombre=$_files['PROD_Protocolo']['name'];

			}
			else{
					$pdfnombre="Default";

			}

			return $pdfnombre;

	}

	public function LogearseValidador(){

			  if(isset($_SESSION['autentificado'])){
                                if ($_SESSION['autentificado'] != "SI"){
                                echo'<script  language="javascript">alert("Al parecer usted no ha iniciado sesión"); window.location="?c=login";</script>';
                                }
                    }else{
                        echo'<script  language="javascript">alert("Al parecer usted no ha iniciado sesión"); window.location="?c=login";</script>';
                    }

	}


	public function ActualizarSession()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare(" SELECT 
											 U.USUA_Id,
											 U.USUA_Nick,
											 U.USUA_Nombre,
											 R.ROL_Id,
											 R.ROL_Nombre
											 FROM 
											 usuarios U
											 INNER JOIN rol R ON U.ROL_Id = R.ROL_Id 
											 WHERE 
											 U.USUA_Id = ?   ");
			$stm->execute(array($_SESSION['USUA_Id']));
			//$Objeto= $stm->fetchAll(PDO::FETCH_OBJ);
			//$count = $stm->rowCount();
			//return $stm->fetchAll(PDO::FETCH_OBJ);
			//if($count>0){
				return $stm->fetchAll(PDO::FETCH_OBJ);

			//}
			//else{
			//	return $objeto=0;
		//	}
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}


	function byencoded($ses)  
	{     
			  $sesencoded = $ses;  
			  $num = mt_rand(4,4);  
			  for($i=1;$i<=$num;$i++)  
			  {  
			     $sesencoded =  
			     base64_encode($sesencoded);  
			  }  
			   
			  $alpha_array =  
			  array('Y','D','U','R','P',  
			  'S','B','M','A','T','H');  
			  $sesencoded =  
			  $sesencoded."+".$alpha_array[$num];  
			  $sesencoded =  
			  base64_encode($sesencoded);  
			  return $sesencoded;  
	}//end of encoded function  

	function bydecoded($str)  
	{  
		   $alpha_array =  
		   array('Y','D','U','R','P',  
		   'S','B','M','A','T','H');  
		   $decoded =  
		    base64_decode($str);  

		   //$mystring = 'abc';
		   $findme   = '+';
		   $pos = strpos($decoded, $findme);

		   if ($pos != false) {
		   list($decoded,$letter) = explode("+",$decoded);  
		   for($i=0;$i<count($alpha_array);$i++)  
		   {  
		   if($alpha_array[$i] == $letter)  
		   break;  
		   }  
		   for($j=1;$j<=$i;$j++)  
		   {  
		      $decoded =  
		       base64_decode($decoded);  
		   }  

		   } else {
				$decoded=0;
		  }
		   return $decoded;  
	}


	




}


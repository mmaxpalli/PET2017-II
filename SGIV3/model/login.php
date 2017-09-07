<?php
class Login
{
	private $pdo;
    
	public $usuario;
	public $password;
	public $USUA_Nick;
	


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

	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT usuarios.Id,Usuario,Password,USUA_Nick,Tipo_Usuario,Descripcion  FROM usuarios inner join tipousuario on usuarios.Tipo_Usuario=tipousuario.Id ");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function validarajxusuario($usuario,$password){

			$result = array();

			$stm = $this->pdo->prepare("SELECT 
										U.USUA_Id,
										U.USUA_Nombre,
										U.USUA_Nick,
										U.ROL_Id,
										R.ROL_Nombre
										FROM 
										usuarios U
										INNER JOIN rol R ON U.ROL_Id=R.ROL_Id 
										WHERE 
										USUA_Nick= ?
										AND USUA_Password= ?
										");

			$stm->execute(array($usuario,$password));
			//$stm->fetchAll(PDO::FETCH_OBJ);
			return $result=$stm->fetchAll(PDO::FETCH_NUM);



	}

	public function lisboxUsuarios()
	{	
		try
		{
			$result=array();
			$stm = $this->pdo->prepare("SELECT * FROM  tipousuario");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);

		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}

	}


	public function Obtener($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT usuarios.Id,Usuario,Password,Tipo_Usuario,Descripcion  FROM usuarios inner join tipousuario on usuarios.Tipo_Usuario=tipousuario.Id WHERE usuarios.Id=?");
			          

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM usuarios WHERE Id = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}


	public function VerificarUsuario($usuario,$password)
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT 
										U.USUA_Id,
										U.USUA_Nombre,
										U.USUA_Nick,
										U.ROL_Id,
										R.ROL_Nombre
										FROM 
										usuarios U
										INNER JOIN rol R ON U.ROL_Id=R.ROL_Id 
										WHERE 
										USUA_Nick= ?
										AND USUA_Password= ?");
			$stm->execute(array($usuario,$password));
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



	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE usuarios SET
			 Usuario=?,
			 Password=?,
			 Tipo_Usuario=?
			  			WHERE Id=?";


	

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->Usuario, 
                        $data->Password,
                        $data->Tipo_Usuario,
                        $data->Id
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Usuarios $data)
	{
		try 
		{
		$sql = "INSERT INTO usuarios(Usuario,Password,Tipo_Usuario) 
						VALUES (?,?,?)";


		$this->pdo->prepare($sql)
		     ->execute(
				array(
                        $data->Usuario, 
                        $data->Password,
                        $data->Tipo_Usuario
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}
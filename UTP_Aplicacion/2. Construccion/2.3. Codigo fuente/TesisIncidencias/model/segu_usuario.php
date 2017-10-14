<?php
session_start();
class segu_usuario
{
	private $pdo;
    public $Id;    
    public $USUA_Id;
 	public $USUA_Nombre;
 	public $USUA_Nick;
 	public $USUA_Password; 	
 	public $ROL_Id; 	
 	public $USUA_FechaCreacion;
 	public $USUA_FechaAuditoria;





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

			$stm = $this->pdo->prepare("SELECT 
										USUA_Id,
										USUA_Nombre,
										USUA_Nick
										 FROM usuarios");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

		



	public function SelectRol()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT 
										ROL_Id,
										ROL_Nombre
										 FROM rol");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function SelectuSUARIOScRUD()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT 
										USUA_Id, 
										USUA_Nombre,
										USUA_Nick 
										 FROM usuarios");
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
			          ->prepare(" SELECT 
									 USUA_Id,
									 USUA_Nombre,
									 USUA_Nick,
									 USUA_Password,
									 ROL_Id
									 FROM 
									 usuarios 
									 WHERE 
									 USUA_Id=?");
			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	



	



	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE usuario
					SET 			
					USUA_Nombre = ?,
					USUA_Nick = ?,
					USUA_Password = ?,
					ROL_Id = ?,
					USUA_FechaAuditoria = ?
					WHERE 
		            USUA_Id = ?";
			

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->USUA_Nombre, 
                        $data->USUA_Nick,
                        $data->USUA_Password,
                        $data->ROL_Id,
                        $data->USUA_FechaAuditoria
                     )
				);
			$_SESSION['TipoVentanaEmergente']="success";
		} catch (Exception $e) 
		{
			$_SESSION['TipoVentanaEmergente']="fail";
			//die($e->getMessage());
		}
	}


	





	public function Registrar(segu_usuario $data)
	{
		try 
		{
		$sql = "INSERT INTO usuarios(
						USUA_Nombre, 
						USUA_Nick, 
						USUA_Password,
						ROL_Id,
						USUA_FechaCreacion,
						USUA_FechaAuditoria)
						VALUES (
						?,
						?,
						?,
						?,
						?,
						?)";


		$this->pdo->prepare($sql)
		     ->execute(
				array(
                        $data->USUA_Nombre, 
                        $data->USUA_Nick,
                        $data->USUA_Password,                        
                        $data->ROL_Id,
                        $data->USUA_FechaCreacion,
                        $data->USUA_FechaAuditoria
                )
			);
		   $_SESSION['TipoVentanaEmergente']="success";
		} catch (Exception $e) 
		{
			$_SESSION['TipoVentanaEmergente']="fail";
			//die($e->getMessage());
		}
	}

}
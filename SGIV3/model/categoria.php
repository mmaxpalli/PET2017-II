<?php
session_start();
/***************************************************************************************************
* Descripción			: Creacion clase categoria donde se definen atributos y funciones  		   *
* Fecha Creación		: 4/08/2017                                         					   *
* Fecha Modificación	: 13/08/2017  															   *		
* Parámetros			:																		   *
* Autor					: Jesus Mendoza Huillca							   						   *
* Versión				: 1.0																	   *
* Cambios Importantes	:                                                         				   *
*                                                                             					   *                                        		
*                                                                             					   *
***************************************************************************************************/

class categoria
{
	

public $CATE_Id;
public $CATE_Descripcion;
public $USUA_Id;
public $CATE_FechaRegistro;


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

	public function Registrar(categoria $data)
	{
		try 
		{
		$sql = "INSERT INTO categoria(
						CATE_Descripcion, 
						USUA_Id, 
						CATE_FechaRegistro)
						VALUES (
						?,
						?,
						?)";


		$this->pdo->prepare($sql)
		     ->execute(
				array(
                        $data->CATE_Descripcion, 
                        $data->USUA_Id,
                        $data->CATE_FechaRegistro                                         
                )
			);
		   $_SESSION['TipoVentanaEmergente']="success";
		} catch (Exception $e) 
		{
			$_SESSION['TipoVentanaEmergente']="fail";
			//die($e->getMessage());
		}
	}





	public function Obtener($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT 
										`CATE_Id`,
										`CATE_Descripcion` 
										FROM 
										`categoria`
										WHERE
										CATE_Id=?");
			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
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
										`CATE_Id`,
										`CATE_Descripcion` 
										FROM 
										`categoria`
										");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
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
						$sql = "UPDATE 
								`categoria` 
								SET 
								`CATE_Descripcion`= ?
								WHERE 
								`CATE_Id` = ?";

								

						$this->pdo->prepare($sql)
						     ->execute(
							    array(
			                        $data->CATE_Descripcion, 
			                        $data->CATE_Id
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
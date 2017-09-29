<?php

if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
/************************************************************************************
* Descripción			: Creacion de la Clase areas donde se definen atributos y metodos *
* Fecha Creación		: 4/08/2017                                         		*
* Fecha Modificación	: 13/08/2017  												*		
* Parámetros			:															*
* Autor					: Jesus Mendoza Huillca - Max Palli Uscamaita				*
* Versión				: 1.0														*
* Cambios Importantes	:                                                         	*
*                                                                             		*                                        		
*                                                                             		*
*************************************************************************************/
class areas
{
	

public $Id;
public $AREA_Id;
public $AREA_Nombre;
public $AREA_Descripcion;
public $USUA_Id;
public $AREA_FechaAuditoria;



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

/************************************************************************************
* Descripción			: Creacion de la Funcion SelectAreas						*
* Fecha Creación		: 4/08/2017                                         		*
* Fecha Modificación	: 13/08/2017  												*		
* Parámetros			:															*
* Autor					: Jesus Mendoza Huillca - Max Palli Uscamaita										*
* Versión				: 1.0														*
* Cambios Importantes	:                                                         	*
*                                                                             		*                                        		
*                                                                             		*
*************************************************************************************/

public function SelectAreas()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT 
										AREA_Id,
										AREA_Nombre,
										AREA_Descripcion
										 FROM areas");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

/************************************************************************************
* Descripción			: Creacion de la funcion ListarAreas						*
* Fecha Creación		: 4/08/2017                                         		*
* Fecha Modificación	: 13/08/2017  												*		
* Parámetros			:															*
* Autor					: Jesus Mendoza Huillca - Max Palli Uscamaita										*
* Versión				: 1.0														*
* Cambios Importantes	:                                                         	*
*                                                                             		*                                        		
*                                                                             		*
*************************************************************************************/
	public function ListarAreas()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT 
										AREA_Id,
										AREA_Nombre,
										AREA_Descripcion
										 FROM areas");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
/************************************************************************************
* Descripción			: Creacion de la funcion Obtener 							*
* Fecha Creación		: 4/08/2017                                         		*
* Fecha Modificación	: 13/08/2017  												*		
* Parámetros			:id :Recibe el id de la clase areas					*
* Autor					: Jesus Mendoza Huillca - Max Palli Uscamaita				*
* Versión				: 1.0														*
* Cambios Importantes	:                                                         	*
*                                                                             		*                                        		
*                                                                             		*
*************************************************************************************/
	public function Obtener($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT 
										AREA_Id,
										AREA_Nombre,
										AREA_Descripcion
										 FROM areas
										 WHERE AREA_Id=?");
			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

/************************************************************************************
* Descripción			: Creacion de la funcion Actualizar							*
* Fecha Creación		: 4/08/2017                                         		*
* Fecha Modificación	: 13/08/2017  												*		
* Parámetros			: data: Representa un objeto de tipo Areas 					*
* Autor					: Jesus Mendoza Huillca - Max Palli Uscamaita				*
* Versión				: 1.0														*
* Cambios Importantes	:                                                         	*
*                                                                             		*                                        		
*                                                                             		*
*************************************************************************************/
		public function Actualizar($data)

				{
					try 
					{
						$sql = "	UPDATE 
									`areas` 
									SET 
									`AREA_Nombre`= ?,
									`AREA_Descripcion`= ?
									 WHERE
									 `AREA_Id` = ?";

								

						$this->pdo->prepare($sql)
						     ->execute(
							    array(
			                        $data->AREA_Nombre, 
			                        $data->AREA_Descripcion,
			                        $data->AREA_Id
			                       )
							);
						$_SESSION['TipoVentanaEmergente']="success";
					} catch (Exception $e) 
					{
						$_SESSION['TipoVentanaEmergente']="fail";
						//die($e->getMessage());
					}
				}

/************************************************************************************
* Descripción			: Creacion de la funcion Registrar					        *
* Fecha Creación		: 4/08/2017                                         		*
* Fecha Modificación	: 13/08/2017  												*		
* Parámetros			: data: Recibe un objeto de tipo Areas 						*
* Autor					: Jesus Mendoza Huillca - Max Palli Uscamaita				*
* Versión				: 1.0														*
* Cambios Importantes	:                                                         	*
*                                                                             		*                                        		                                                                            		*
*************************************************************************************/
	public function Registrar(areas $data)
		{
			try 
			{
			$sql = "INSERT INTO areas(
							AREA_Nombre, 
							AREA_Descripcion, 
							USUA_Id,
							AREA_FechaAuditoria)
							VALUES (
							?,
							?,
							?,
							?)";


			$this->pdo->prepare($sql)
			     ->execute(
					array(
	                        $data->AREA_Nombre, 
	                        $data->AREA_Descripcion,
	                        $data->USUA_Id,
	                        $data->AREA_FechaAuditoria 
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
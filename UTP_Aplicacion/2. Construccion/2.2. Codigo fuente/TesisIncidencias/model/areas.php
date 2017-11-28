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
			$stm = $this->pdo->prepare("CALL spSelectArea()");
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
			$stm = $this->pdo->prepare("CALL spSelectAreaId(?)");
			$stm->bindparam(1, $id, PDO::PARAM_STR, 11);
			$stm->execute();
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
						
	    $stm = $this->pdo->prepare("CALL spUpdateArea(?,?,?)");
		$stm->bindparam(1, $data->AREA_Nombre, PDO::PARAM_STR, 50);
		$stm->bindparam(2, $data->AREA_Descripcion, PDO::PARAM_STR, 50);
		$stm->bindparam(3, $data->AREA_Id, PDO::PARAM_STR, 11);
		$stm->execute();

			$_SESSION['TipoVentanaEmergente']="success";
	}
	catch (Exception $e) 
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
	
		$result = array();
			
		$stm = $this->pdo->prepare("CALL spInsertarAreas(?,?,?,?)");
		$stm->bindparam(1, $data->AREA_Nombre, PDO::PARAM_STR, 50);
		$stm->bindparam(2, $data->AREA_Descripcion, PDO::PARAM_STR, 50);
		$stm->bindparam(3, $data->USUA_Id, PDO::PARAM_INT, 11);
		$stm->bindparam(4, $data->AREA_FechaAuditoria, PDO::PARAM_STR, 6);
		$stm->execute();

				
		   $_SESSION['TipoVentanaEmergente']="success";
	}
	catch (Exception $e) 
	{
			$_SESSION['TipoVentanaEmergente']="fail";

	}
}



	

}
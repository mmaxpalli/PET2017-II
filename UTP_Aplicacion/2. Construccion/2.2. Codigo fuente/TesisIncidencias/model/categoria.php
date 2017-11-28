<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
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
	$this->log=Logger::getLogger(__CLASS__);
	try
	{
		$this->pdo = Database::StartUp();     
	}
	catch(Exception $e)
	{
		die($e->getMessage());
	}
}

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

public function RegistrarCategoria(categoria $data)
{
	try 
	{
		$result = array();
		$stm = $this->pdo->prepare("CALL spInsertarCategoria(?,?,?)");
			
		$stm->bindparam(1, $data->CATE_Descripcion, PDO::PARAM_STR, 50);
		$stm->bindparam(2, $data->USUA_Id, PDO::PARAM_INT, 11);
		$stm->bindparam(3, $data->CATE_FechaRegistro, PDO::PARAM_STR, 6);
		$stm->execute();

		   $_SESSION['TipoVentanaEmergente']="success";
	}
	catch (Exception $e) 
	{
			$_SESSION['TipoVentanaEmergente']="fail";
			 $this->log->info('Error al insertar en la Tabla Categoria');
			 $this->log->error($e);
			//die($e->getMessage());
	}
}

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

public function Obtener($id)
{
	try 
	{
		$stm = $this->pdo->prepare("CALL spSelectCategoriaId(?)");
		$stm->bindparam(1, $id, PDO::PARAM_STR, 11);
		$stm->execute();

		return $stm->fetch(PDO::FETCH_OBJ);
	}
	catch (Exception $e) 
	{
		die($e->getMessage());
	}
}

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

public function ListarCategoria()
{
	try
	{
		$stm = $this->pdo->prepare("CALL spSelectCategoria()");
		$stm->execute();

		return $stm->fetchAll(PDO::FETCH_OBJ);
	}
	catch(Exception $e)
	{
		die($e->getMessage());
	}
}

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

public function Actualizar($data)
{
	try 
	{
		$stm = $this->pdo->prepare("CALL spUpdateCategoria(?,?)");
		$stm->bindparam(1, $data->CATE_Descripcion, PDO::PARAM_STR, 50);
		$stm->bindparam(2, $data->CATE_Id, PDO::PARAM_STR, 11);
		$stm->execute();

			$_SESSION['TipoVentanaEmergente']="success";
	} 
	catch (Exception $e) 
	{
			$_SESSION['TipoVentanaEmergente']="fail";
						//die($e->getMessage());
	}
}




}
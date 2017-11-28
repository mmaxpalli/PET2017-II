<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }



/************************************************************************************
* Descripción			: Creacion de la Funcion Obtener							*
* Fecha Creación		: 4/08/2017                                         		*
* Fecha Modificación	: 13/08/2017  												*		
* Parámetros			: id: Recibe el id de la clase incidencia														*
* Autor					:  Max Palli Uscamaita										*
* Versión				: 1.0														*
* Cambios Importantes	:                                                         	*
*                                                                             		*                                        		                                                                           		*
*************************************************************************************/

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



/************************************************************************************
* Descripción			: Creacion de la Funcion Obtener							*
* Fecha Creación		: 4/08/2017                                         		*
* Fecha Modificación	: 13/08/2017  												*		
* Parámetros			: id: Recibe el id de la clase incidencia														*
* Autor					:  Max Palli Uscamaita										*
* Versión				: 1.0														*
* Cambios Importantes	:                                                         	*
*                                                                             		*                                        		                                                                           		*
*************************************************************************************/

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
* Descripción			: Creacion de la Funcion Obtener							*
* Fecha Creación		: 4/08/2017                                         		*
* Fecha Modificación	: 13/08/2017  												*		
* Parámetros			: id: Recibe el id de la clase incidencia														*
* Autor					:  Max Palli Uscamaita										*
* Versión				: 1.0														*
* Cambios Importantes	:                                                         	*
*                                                                             		*                                        		                                                                           		*
*************************************************************************************/

public function Listar()
{
	try
	{
		$result = array();
		$stm = $this->pdo->prepare("CALL spSelectUsuario()");
		$stm->execute();

		return $stm->fetchAll(PDO::FETCH_OBJ);
	}
	catch(Exception $e)
	{
		die($e->getMessage());
	}
}

/************************************************************************************
* Descripción			: Creacion de la Funcion Obtener							*
* Fecha Creación		: 4/08/2017                                         		*
* Fecha Modificación	: 13/08/2017  												*		
* Parámetros			: id: Recibe el id de la clase incidencia														*
* Autor					:  Max Palli Uscamaita										*
* Versión				: 1.0														*
* Cambios Importantes	:                                                         	*
*                                                                             		*                                        		                                                                           		*
*************************************************************************************/

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

/************************************************************************************
* Descripción			: Creacion de la Funcion Obtener							*
* Fecha Creación		: 4/08/2017                                         		*
* Fecha Modificación	: 13/08/2017  												*		
* Parámetros			: id: Recibe el id de la clase incidencia														*
* Autor					:  Max Palli Uscamaita										*
* Versión				: 1.0														*
* Cambios Importantes	:                                                         	*
*                                                                             		*                                        		                                                                           		*
*************************************************************************************/


public function Obtener($id)
{
	try 
	{
		$stm = $this->pdo->prepare("CALL spSelectUsuarioId(?)");
        $stm->bindParam(1, $id, PDO::PARAM_STR, 11);
		$stm->execute();

		return $stm->fetch(PDO::FETCH_OBJ);
	} 
	catch (Exception $e) 
	{
		die($e->getMessage());
	}
}

/************************************************************************************
* Descripción			: Creacion de la Funcion Obtener							*
* Fecha Creación		: 4/08/2017                                         		*
* Fecha Modificación	: 13/08/2017  												*		
* Parámetros			: id: Recibe el id de la clase incidencia														*
* Autor					:  Max Palli Uscamaita										*
* Versión				: 1.0														*
* Cambios Importantes	:                                                         	*
*                                                                             		*                                        		                                                                           		*
*************************************************************************************/

public function Actualizar($data)
{
	try 
	{  
        $stm = $this->pdo->prepare("CALL spUpdateUsuario(?,?,?,?,?,?)");
		$stm->bindParam(1, $data->USUA_Nombre, PDO::PARAM_STR, 50);
		$stm->bindParam(2, $data->USUA_Nick, PDO::PARAM_STR, 20);
		$stm->bindParam(3, $data->USUA_Password, PDO::PARAM_STR, 50);
		$stm->bindParam(4, $data->ROL_Id, PDO::PARAM_INT, 11);
		$stm->bindParam(5, $data->USUA_FechaAuditoria, PDO::PARAM_STR, 6);
        $stm->bindParam(6, $data->USUA_Id, PDO::PARAM_STR, 11);
        $stm->execute();
	
			$_SESSION['TipoVentanaEmergente']="success";
	} 
	catch (Exception $e) 
	{
			$_SESSION['TipoVentanaEmergente']="fail";
			die($e->getMessage());
	}
}

/************************************************************************************
* Descripción			: Creacion de la Funcion Obtener							*
* Fecha Creación		: 4/08/2017                                         		*
* Fecha Modificación	: 13/08/2017  												*		
* Parámetros			: id: Recibe el id de la clase incidencia														*
* Autor					:  Max Palli Uscamaita										*
* Versión				: 1.0														*
* Cambios Importantes	:                                                         	*
*                                                                             		*                                        		                                                                           		*
*************************************************************************************/
	
public function ListarUsuariosTecnicos()
{
	try 
	{  
        $stm = $this->pdo->prepare("CALL spSelectUsuarioIdRolTecnico");
        $stm->execute();	
        
        return $stm->fetchAll(PDO::FETCH_OBJ);	
		}
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
}

/************************************************************************************
* Descripción			: Creacion de la Funcion Obtener							*
* Fecha Creación		: 4/08/2017                                         		*
* Fecha Modificación	: 13/08/2017  												*		
* Parámetros			: id: Recibe el id de la clase incidencia														*
* Autor					:  Max Palli Uscamaita										*
* Versión				: 1.0														*
* Cambios Importantes	:                                                         	*
*                                                                             		*                                        		                                                                           		*
*************************************************************************************/

public function Registrar(segu_usuario $data)
{
	try 
	{
        $stm = $this->pdo->prepare("CALL spInsertUsuario(?,?,?,?,?,?)");
		$stm->bindParam(1, $data->USUA_Nombre, PDO::PARAM_STR, 50);
		$stm->bindParam(2, $data->USUA_Nick, PDO::PARAM_STR, 20);
		$stm->bindParam(3, $data->USUA_Password, PDO::PARAM_STR, 50);
		$stm->bindParam(4, $data->ROL_Id, PDO::PARAM_INT, 11);
		$stm->bindParam(5, $data->USUA_FechaCreacion, PDO::PARAM_STR, 6);
		$stm->bindParam(6, $data->USUA_FechaAuditoria, PDO::PARAM_STR, 6);
		$stm->execute();
		   
		   $_SESSION['TipoVentanaEmergente']="success";
		} 
	catch (Exception $e) 
	{
			$_SESSION['TipoVentanaEmergente']="fail";
	}
}


}
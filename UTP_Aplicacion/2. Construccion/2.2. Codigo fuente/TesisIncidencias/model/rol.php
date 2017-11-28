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

class rol
{
	private $pdo;
    public $Id;    
    public $ROL_Id;
 	public $ROL_Nombre;	
 	public $USUA_Id;
 	public $ROL_FechaAuditoria	;



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

public function ListarRol()
{
	try
	{
        $stm = $this->pdo->prepare("CALL spSelectRol()");
		$stm->execute();
	
		return $stm->fetchAll(PDO::FETCH_OBJ);
	}
	catch(Exception $e)
	{
		die($e->getMessage());
	}
}





}
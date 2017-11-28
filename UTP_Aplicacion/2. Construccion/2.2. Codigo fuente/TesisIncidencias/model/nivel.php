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

class nivel
{
	

public $NIVE_Id;
public $NIVE_Numero;
public $NIVE_Nombre;
public $NIVE_Descripcion;
public $USUA_Id;
public $NIVE_FechaAuditoria;


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




public function ListarNivel()
{
	try
	{
	$stm = $this->pdo->prepare("CALL spSelectNivel()");
	$stm->execute();

		return $stm->fetchAll(PDO::FETCH_OBJ);
	}
	catch(Exception $e)
	{
		die($e->getMessage());
	}
}

}

<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

class Tratamiento_incidencias
{
	public $Id;
	public $INCI_Id;
	public $INCI_Titulo;
	public $INCI_Descripcion;
	public $INCI_FechaRegistro;
	public $ESTA_Id;
	public $USUA_Id;
	public $USUA_IdAuditoria;
	public $INCI_FechaAuditoria;

	public $AREA_Id; 
	public $CATE_Id; 
	public $NIVE_Id; 
	public $TRIN_Id;

	public $TRIN_FechaRegistro;
	public $PRIO_Id;
	public $USUA_IdResponsable;
	public $TRIN_FechaAuditoria;



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
* Descripción			: Creacion de la Funcion ListaIncidenciasEscalado			*
* Fecha Creación		: 4/08/2017                                         		*
* Fecha Modificación	: 13/08/2017  												*		
* Parámetros			: 															*
* Autor					:  Max Palli Uscamaita										*
* Versión				: 1.0														*
* Cambios Importantes	:                                                         	*
*                                                                             		*                                        		                                                                           		*
*************************************************************************************/


	public function RegistrarTratamiento(  $data)
	{
		try 
		{
		
                $stm = $this->pdo->prepare("CALL spInsertTratamientoIncidencia(?,?,?,?,?,?,?,?,?,?)");
				$stm->bindParam(1, $data->TRIN_FechaRegistro, PDO::PARAM_STR, 6);
				$stm->bindParam(2, $data->INCI_Id, PDO::PARAM_INT, 11);
				$stm->bindParam(3, $data->CATE_Id, PDO::PARAM_INT, 11);
				$stm->bindParam(4, $data->AREA_Id, PDO::PARAM_INT, 11);
				$stm->bindParam(5, $data->NIVE_Id, PDO::PARAM_INT, 11);
				$stm->bindParam(6, $data->ESTA_Id, PDO::PARAM_INT, 11);
				$stm->bindParam(7, $data->PRIO_Id, PDO::PARAM_INT, 11);
				$stm->bindParam(8, $data->USUA_IdResponsable, PDO::PARAM_INT, 11);
                $stm->bindParam(9, $data->USUA_Id, PDO::PARAM_INT, 11);
                $stm->bindParam(10, $data->TRIN_FechaAuditoria, PDO::PARAM_STR, 6);
				$stm->execute();

		  		$_SESSION['TipoVentanaEmergente']="success";

		} catch (Exception $e) 
		{
			$_SESSION['TipoVentanaEmergente']="fail";
			//die($e->getMessage());
		}
	}

/************************************************************************************
* Descripción			: Creacion de la Funcion ListaIncidenciasEscalado			*
* Fecha Creación		: 4/08/2017                                         		*
* Fecha Modificación	: 13/08/2017  												*		
* Parámetros			: 															*
* Autor					:  Max Palli Uscamaita										*
* Versión				: 1.0														*
* Cambios Importantes	:                                                         	*
*                                                                             		*                                        		                                                                           		*
*************************************************************************************/

	public function ActualizaTratamiento($data){
	
	try 
		{
            $stm = $this->pdo->prepare("CALL spUpdateTratamientoIncidenciaEstadoCerrado(?)");
			$stm->bindParam(1, $data->TRIN_Id, PDO::PARAM_STR, 11);
			$stm->execute();
			$_SESSION['TipoVentanaEmergente']="success";
	}catch (Exception $e) 
		{
		$_SESSION['TipoVentanaEmergente']="fail";
		//die($e->getMessage());
		}
}

	
	

}
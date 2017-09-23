<?php
session_start();
class prioridad
{
	

public $Id;
public $PRIO_Id;
public $PRIO_Nombre;
public $PRIO_Urgencia;
public $PRIO_Impacto;
public $PRIO_Fecha;
public $INCI_Id;
public $PRIO_Orden;
public $USUA_Id;
public $PRIO_FechaAuditoria;



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



	public function ObtenerListaPrioridad()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT 
									 PRIO_Id,
									`PRIO_Nombre`,
									`PRIO_Urgencia` ,
									`PRIO_Impacto`,
									`INCI_Id`,
									U.USUA_Nombre
									FROM `prioridad`  P 
									INNER JOIN usuarios U ON P.`USUA_Id` = U.USUA_Id");
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
									PRIO_Id,
									`PRIO_Nombre`,
									`PRIO_Urgencia` ,
									`PRIO_Impacto`,
									`INCI_Id`,
									U.USUA_Nombre
									FROM `prioridad`  P 
									INNER JOIN usuarios U ON P.`USUA_Id` = U.USUA_Id
                                    WHERE 
                                    PRIO_Id = ?");
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
						$sql = "UPDATE 
								`prioridad` 
								SET 
								`PRIO_Nombre`=?,
								`PRIO_Urgencia`=?,
								`PRIO_Impacto`=?
								WHERE
								`PRIO_Id` = ?";

						$this->pdo->prepare($sql)
						     ->execute(
							    array(
			                        $data->PRIO_Nombre, 
			                        $data->PRIO_Urgencia,
			                        $data->PRIO_Impacto,
			                        $data->PRIO_Id	
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
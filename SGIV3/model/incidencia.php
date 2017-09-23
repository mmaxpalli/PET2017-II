<?php
session_start();
class incidencia
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



	public function Obtener($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare(" SELECT 
									INCI_Id,
								    INCI_Titulo,
								    INCI_Descripcion,
								    INCI_FechaRegistro,
								    CATE_Id,
								    ESTA_Id,
								    USUA_Id,
								    USUA_IdAuditoria,
								    INCI_FechaAuditoria
								FROM incidencias
								WHERE
									INCI_Id = ?");
			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}


	public function ObtenerTratamiento($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare(" SELECT 
											TRIN_Id,
											I.INCI_Titulo,
											C.CATE_Descripcion,
											A.AREA_Nombre,
											TI.NIVE_Id,
											N.NIVE_Nombre,
											TI.USUA_Id,
											U.USUA_Nombre
											FROM `tratamiento_incidencia` TI
											INNER JOIN incidencias I ON TI.`INCI_Id` = I.`INCI_Id`
											INNER JOIN categoria C ON TI.`CATE_Id` = C.`CATE_Id`
											INNER JOIN areas A ON TI.`AREA_Id` = A.`AREA_Id`
											INNER JOIN nivel N ON TI.`NIVE_Id` = N.`NIVE_Id`
											INNER JOIN usuarios U ON TI.`USUA_Id` = U.`USUA_Id`
											WHERE
											TRIN_Id = ?");
			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	


	public function Registrar(incidencia $data)
	{
		try 
		{
		$sql = "INSERT INTO incidencias(
						INCI_Titulo, 
						INCI_Descripcion, 
						INCI_FechaRegistro,
						CATE_Id,
						ESTA_Id,
						USUA_Id,
						USUA_IdAuditoria,
						INCI_FechaAuditoria)
						VALUES (
						?,
						?,
						?,
						?,
						?,
						?,
						?,
						?)";


		$this->pdo->prepare($sql)
		     ->execute(
				array(
                        $data->INCI_Titulo, 
                        $data->INCI_Descripcion,
                        $data->INCI_FechaRegistro,                        
                        $data->CATE_Id,
                        $data->ESTA_Id,
                        $data->USUA_Id,
                        $data->USUA_IdAuditoria,
                        $data->INCI_FechaAuditoria                      
                )
			);
		   $_SESSION['TipoVentanaEmergente']="success";
		} catch (Exception $e) 
		{
			$_SESSION['TipoVentanaEmergente']="fail";
			//die($e->getMessage());
		}
	}


	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT 
										INCI_Id,
									    INCI_Titulo,
									    INCI_Descripcion,
									    INCI_FechaRegistro,
									    CATE_Id,
									    ESTA_Id,
									    USUA_Id,
									    USUA_IdAuditoria,
									    INCI_FechaAuditoria
										FROM incidencias");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

		public function SelectAreas()
			{
				try
				{
					$result = array();

					$stm = $this->pdo->prepare("SELECT 
												AREA_Id,
												AREA_Nombre
												 FROM areas");
					$stm->execute();

					return $stm->fetchAll(PDO::FETCH_OBJ);
				}
				catch(Exception $e)
				{
					die($e->getMessage());
				}
			}


			public function SelectCategorias()
			{
				try
				{
					$result = array();

					$stm = $this->pdo->prepare("SELECT
												CATE_Id, 
												CATE_Descripcion 
												FROM categoria");
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


	public function SelectNivel()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT
										`NIVE_Id`,
										`NIVE_Nombre` 
										FROM 
										`nivel` ");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}



	public function SelectTrabajadores()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT 
											`USUA_Id`,
											`USUA_Nombre` 
											FROM
											`usuarios` 
											WHERE 
											`ROL_Id` = 1 ");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}



	public function ListaIncidenciasRegistradas()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT 
										INCI_Id, 
										INCI_Titulo, 
										INCI_FechaRegistro, 
										C.CATE_Descripcion 
										from 
										incidencias I
										inner join categoria C on I.CATE_Id = C.CATE_Id");
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
						$sql = "UPDATE incidencias 
								SET
								INCI_Titulo = ?,
								CATE_Id = ?
								WHERE 
								INCI_Id = ?";

						$this->pdo->prepare($sql)
						     ->execute(
							    array(
			                        $data->INCI_Titulo, 
			                        $data->CATE_Id		,
			                        $data->INCI_Id		                      
			                     )
							);
						$_SESSION['TipoVentanaEmergente']="success";
					} catch (Exception $e) 
					{
						$_SESSION['TipoVentanaEmergente']="fail";
						//die($e->getMessage());
					}
				}


				public function ActualizarEscalado($data)

				{

					
					try 
					{
						$sql = "UPDATE
								`tratamiento_incidencia`
								SET
								`NIVE_Id` = ?,
                                `USUA_Id` = ?
								WHERE
								`TRIN_Id` = ?";

						$this->pdo->prepare($sql)
						     ->execute(
							    array(
			                        $data->NIVE_Id, 
			                        $data->USUA_Id, 
			                        $data->TRIN_Id			                        	                      
			                     )
							);
						$_SESSION['TipoVentanaEmergente']="success";
					} catch (Exception $e) 
					{
						$_SESSION['TipoVentanaEmergente']="fail";
						//die($e->getMessage());
					}
				}



	public function ListaIncidenciasEscalado()
		{
			try
			{
				$result = array();

				$stm = $this->pdo->prepare("SELECT 
											TRIN_Id,
											I.INCI_Titulo,
											C.CATE_Descripcion,
											A.AREA_Nombre,
											N.NIVE_Nombre,
											U.USUA_Nombre
											FROM `tratamiento_incidencia` TI
											INNER JOIN incidencias I ON TI.`INCI_Id` = I.`INCI_Id`
											INNER JOIN categoria C ON TI.`CATE_Id` = C.`CATE_Id`
											INNER JOIN areas A ON TI.`AREA_Id` = A.`AREA_Id`
											INNER JOIN nivel N ON TI.`NIVE_Id` = N.`NIVE_Id`
											INNER JOIN usuarios U ON TI.`USUA_Id` = U.`USUA_Id`");
				$stm->execute();

				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}
		}




}
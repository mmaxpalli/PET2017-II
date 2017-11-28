<?php
session_start();
class home
{
	private $pdo;
    
    public $Id;
    public $EMPR_Id;
    public $EMPR_Nombre;



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

	
	public function UltimosClientes()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT
												USUA_NombreComercial,
												USUA_Foto
												FROM 
												segu_usuario 
												WHERE 
												ROL_Id = 2
												ORDER BY USUA_Id
												LIMIT 8");
			$stm->execute(array($_SESSION['ROL_Id']));

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}


	public function UltimosOrdenesdeCompra()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("	SELECT 
												OC.ORCO_Id,
												CONCAT(OC.ORCO_Serie,'-',OC.ORCO_Numero) as 'SEriNumero',
												P.PERS_NombreComercial,
												TED.TIPO_Descripcion
												FROM 
												logi_orden_compra OC
												INNER JOIN gene_persona P on OC.EMPR_Id = P.EMPR_Id and OC.PERS_IdProveedor = P.PERS_Id
												INNER JOIN tipo_estado_documento TED on OC.TIPO_IdEstadoDocumento = TED.TIPO_IdEstadoDocumento
												ORDER BY
												ORCO_Id DESC
												LIMIT 7
											");

			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}








	public function UltimosProductosIngresados()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("
										SELECT
										DP.`DOPR_Id`,
										P.PROD_Nombre,
										CONCAT(DP.DOPR_Serie,'-',DP.DOPR_Numero) as 'SerieNumero',
										DPD.DPDE_CantidadFisica
										FROM 
										logi_documento_proveedor DP
										INNER JOIN logi_documento_proveedordetalle DPD on DP.EMPR_Id = DPD.EMPR_Id and DP.DOPR_Id = DPD.DOPR_Id
										INNER JOIN gene_producto P on DPD.EMPR_Id = P.EMPR_Id and DPD.PROD_Id =  P.PROD_Id
										ORDER BY DP.DOPR_Id DESC
											");

			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}


	public function VentasUltimoMes()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SET @FechaPasada = DATE_ADD(NOW() ,INTERVAL  -1 MONTH);");
			$stm->execute();

			$result = array();

			$stm = $this->pdo->prepare("SET @PrimerDia = DATE(@FechaPasada - INTERVAL DAYOFMONTH(@FechaPasada) - 1 DAY);");
			$stm->execute(array($_SESSION['ROL_Id']));
			$result = array();

			$stm = $this->pdo->prepare("SET @UltimoDia = DATE(LAST_DAY(@FechaPasada));");
			$stm->execute();


			$stm = $this->pdo->prepare("
										SELECT
										COUNT(DOVE_Id) as 'Numero'
										FROM
										vent_documento_venta
										WHERE
										EMPR_Id = ? -- Insertar Session EMPRESA
										and DOVE_FechaEmision BETWEEN @PrimerDia  AND @UltimoDia
										and TIPO_IdEstadoDocumento = 2 -- Codigo duro Estado Cerrado
										LIMIT 4");

			$stm->execute(array($_SESSION['EMPR_Id']));


			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}









}
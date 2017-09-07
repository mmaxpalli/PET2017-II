<?php
session_start();
class incidencia_categoria
{
	private $pdo;
    




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

		public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM gene_empresa");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function ListarCategorias()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM categoria");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}



		public function incidencia_categoriatTbl($Elemento1,$datepicker,$datepicker2)
	{
		try
		{
			$test=1;
			$result = array();

			$stm = $this->pdo->prepare("SET @FechaInicio =  ? ");
			$stm->execute(array($datepicker));

			$stm = $this->pdo->prepare("SET @FechaFin =  ?");
			$stm->execute(array($datepicker2));


			$stm = $this->pdo->prepare("SET @Cate_Id =  ?");
			$stm->execute(array($Elemento1));




			$stm = $this->pdo->prepare("SELECT 
											`INCI_Id`,
											`INCI_Titulo`, 
											`INCI_FechaRegistro`, 
											U.USUA_Nombre
											FROM 
											`incidencias`  I
											INNER JOIN usuarios U on I.`USUA_Id` = U.`USUA_Id`
											WHERE
											`INCI_FechaRegistro` BETWEEN @FechaInicio and @FechaFin
											AND `CATE_Id` = @Cate_Id");
			$stm->execute();

			

			return $result=$stm->fetchAll(PDO::FETCH_NUM);


		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}



		public function incidencia_categoriaTblExePdf($Elemento1,$datepicker,$datepicker2)
	{
		try
		{
			$result = array();






			$test=1;
			$stm = $this->pdo->prepare("SET @FechaInicio =  ? ");
			$stm->execute(array($datepicker));

			$stm = $this->pdo->prepare("SET @FechaFin =  ?");
			$stm->execute(array($datepicker2));


			$stm = $this->pdo->prepare("SET @Cate_Id =  ?");
			$stm->execute(array($Elemento1));




			$stm = $this->pdo->prepare("SELECT 
											`INCI_Id`,
											`INCI_Titulo`, 
											`INCI_FechaRegistro`, 
											U.USUA_Nombre
											FROM 
											`incidencias`  I
											INNER JOIN usuarios U on I.`USUA_Id` = U.`USUA_Id`
											WHERE
											`INCI_FechaRegistro` BETWEEN @FechaInicio and @FechaFin
											AND `CATE_Id` = @Cate_Id");
			$stm->execute();


			return $stm->fetchAll(PDO::FETCH_OBJ);


		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}


	
}
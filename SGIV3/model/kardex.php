<?php
session_start();
class kardex
{
	private $pdo;
    
    public $Id;
    public $EMPR_Id;
    public $EMPR_Nombre;
    public $PROD_Id;
	public $PROD_Codigo;
	public $PROD_Nombre;
	public $kardex;



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

	public function AlmacenSelect()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT `ALMA_Id`,`ALMA_Nombre` FROM `logi_almacen`");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
		public function KardexSelect()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT `TIPO_IdKardex`,`TIPO_Descripcion` FROM `tipo_kardex`");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}




	public function ListarProductosTAbla()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT `PROD_Id`,`PROD_Codigo`,`PROD_Nombre`,1 as 'Numero'  FROM `gene_producto`");

			$stm->execute();
		
			return $result=$stm->fetchAll(PDO::FETCH_NUM);


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
			          ->prepare("SELECT `PROD_Id`,`PROD_Codigo`,`PROD_Nombre`,1 as 'Numero'  FROM `gene_producto` WHERE `PROD_Id`= ?");
			          

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM gene_empresa WHERE EMPR_Id = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try 
		{
			$sql ="UPDATE `gene_empresa` SET `EMPR_Nombre`=? WHERE `EMPR_Id`=?";


			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->EMPR_Nombre, 
                        $data->EMPR_Id                    
					)
				);
			     	$_SESSION['TipoVentanaEmergente']="success";

		} catch (Exception $e) 
		{
			die($e->getMessage());
					$_SESSION['TipoVentanaEmergente']="fail";
		}
	}

	public function Registrar(gene_empresa $data)
	{
		try 
		{
		$sql = "INSERT INTO `gene_empresa`(`EMPR_Nombre`) VALUES (?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->EMPR_Nombre			
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
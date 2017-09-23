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


}
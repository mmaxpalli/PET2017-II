<?php
class Database
{
    public static function StartUp()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=bd_incidencias;charset=utf8', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
      	//$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, 0);
       // $pdo->set_charset('utf8');
        return $pdo;
    }
}
<?php
$dbuser="root";
$dbpass="";
$dbname="bd_incidencias";
$chandle = mysql_connect("localhost", $dbuser, $dbpass) or die("Error conectando a la BBDD");
echo "Conectado correctamente
";
mysql_select_db($dbname, $chandle) or die ($dbname . " Base de datos no encontrada." . $dbuser);
echo "Base de datos " . $dbname . " seleccionada";
mysql_close($chandle);
?>
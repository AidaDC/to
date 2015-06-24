<?php
/**
* @author Andreu Sanz Miedes y Aida Dahdah Castelló
* @author asanzm.sanz@gmail.com, aidadahdah@gmail.com
* @copyright 2015 M7
* @version 1.0
*/
$server = "to-2dawcredito.rhcloud.com";
$user = "adminncayJhU";
$pass = "u6hl1k_Xummb";
$bd = "to";
$dni= $_POST['dni'];

$conexion=mysql_connect ($servidor, $usuario, $clave) or die ('problema conectando porque :' . mysql_error());
mysql_select_db ($basedatos,$conexion);
$cadena ="select * from usuarios where nif = '".$dni."'";
$results = mysql_query($cadena) or die('la consulta falla');
	
	if(mysql_num_rows($results) > 0) // existe
	{
	echo 'DNI no disponible';
	}
	else
	{
	echo 'DNI disponible';
	}

?>

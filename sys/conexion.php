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
 
//Creamos la conexión
@$conexion = mysqli_connect($server, $user, $pass,$bd); //quitamos el die porque sino matamos la conexion

 
if($conexion==true)
{
	
	//generamos la consulta
	$sql = "SELECT * FROM poblacion";
	mysqli_set_charset($conexion, "utf8"); //formato de datos utf8
	 
	if(!$result = mysqli_query($conexion, $sql)) die();
	 
	$localizaciones = array(); //creamos un array
	 
	while($row = mysqli_fetch_array($result)) 
	{ 
		$nombre=$row['poblacion'];
		$localizaciones[] = array('nombre'=> $nombre);
	}
		
	//desconectamos la base de datos
	$close = mysqli_close($conexion) 
	or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
	  
	 
	//Creamos el JSON
	$json_string = json_encode($localizaciones);
	
	echo $json_string;
	
}
 
?>

<?php /**
* @author Andreu Sanz Miedes y Aida Dahdah Castelló
* @author asanzm.sanz@gmail.com, aidadahdah@gmail.com
* @copyright 2015 PROYECTO FINAL
* @version 1.0
*/

	final class insert extends Controller{
		
		
		function __construct($params){
			parent::__construct($params);
			$this->conf=Registry::getInstance();
			$this->model=new minsert;
			$this->view=new vinsert;
		}

		function home(){
		}

		
 	/**
    * 
    * @return esta función llama al método insert el cual si nos retorna true 
    * redirigimos a la página home
    *o por el contrario a la página de error
    */


		function insert(){
		if(isset($_POST['email'])){ 
		$dni=filter_input(INPUT_POST, 'dni', FILTER_SANITIZE_STRING);		
		$nombre=filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
		$apellidos=(filter_input(INPUT_POST, 'apellidos', FILTER_SANITIZE_STRING));
		$nusuario=filter_input(INPUT_POST, 'nusuario', FILTER_SANITIZE_STRING);
        $telefono=filter_input(INPUT_POST, 'telefono', FILTER_SANITIZE_STRING);
        $direccion=filter_input(INPUT_POST, 'direccion', FILTER_SANITIZE_STRING);          
		$poblacion=filter_input(INPUT_POST, 'poblacion', FILTER_SANITIZE_STRING);
        $email=filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $cpostal=(filter_input(INPUT_POST, 'cpostal', FILTER_SANITIZE_STRING));
        $password=md5(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
		$rpassword=filter_input(INPUT_POST, 'rpassword', FILTER_SANITIZE_STRING);
		$user=$this->model->insert($dni,$nombre,$apellidos,$nusuario,$telefono,$direccion,$poblacion,$email,$cpostal,$password,$rpassword);
        if ($user==TRUE){
               header('Location:'.APP_W.'home');
         }
         else{
               header('Location:'.APP_W.'error');
             }
  		  }
		}

		function insertlibro(){
	       // if(isset($_POST['rol'])){ 
             // var_dump("entra2");
        $nombre=utf8_encode(filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING)); 
        // var_dump($nombre);
        $idioma=utf8_encode(filter_input(INPUT_POST, 'idioma', FILTER_SANITIZE_STRING));
        // var_dump($idioma);
        $imagen=utf8_encode(filter_input(INPUT_POST, 'imagen', FILTER_SANITIZE_STRING));
        // var_dump($imagen);
        $isbn=filter_input(INPUT_POST, 'isbn', FILTER_SANITIZE_STRING);    
        // var_dump($isbn);
        $precio=filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_FLOAT, 
        FILTER_FLAG_ALLOW_FRACTION);
        // var_dump($precio);
        $valoration=filter_input(INPUT_POST, 'valoration', FILTER_SANITIZE_STRING);
        // var_dump($valoration);
        $stock=filter_input(INPUT_POST, 'stock', FILTER_SANITIZE_NUMBER_INT);  
        // var_dump($stock);
        $editorial=utf8_encode(filter_input(INPUT_POST, 'editorial', FILTER_SANITIZE_STRING)); 
        // var_dump($editorial);
        $n_paginas=filter_input(INPUT_POST, 'n_paginas', FILTER_SANITIZE_NUMBER_INT);  
        // var_dump($n_paginas);
        $edicion=utf8_encode(filter_input(INPUT_POST, 'edition', FILTER_SANITIZE_STRING));      
        // var_dump($edicion);
        $novedad=filter_input(INPUT_POST, 'novedad', FILTER_SANITIZE_STRING);
        // var_dump($novedad);
        $alt=filter_input(INPUT_POST, 'alt', FILTER_SANITIZE_STRING);
        // var_dump($alt);
        $descripcion=utf8_encode(filter_input(INPUT_POST, 'descripcion', FILTER_SANITIZE_STRING));
        $user=$this->model->insertlibro($nombre,$isbn,$idioma,$imagen,$descripcion,$precio,$valoration,$stock,$editorial,$n_paginas,$edicion,$novedad,$alt);
         
         if ($user==TRUE){
               header('Location:'.APP_W.'home');
         }
         else{
               header('Location:'.APP_W.'error');
             }
          }

	}
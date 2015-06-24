<?php /**
* @author Andreu Sanz Miedes y Aida Dahdah Castelló
* @author asanzm.sanz@gmail.com, aidadahdah@gmail.com
* @copyright 2015 PROYECTO FINAL
* @version 1.0
*/
	class Modificar extends Controller{
		
		function __construct(){
			parent::__construct($this->params);
			$this->conf=Registry::getInstance();

			$this->model=new mModificar;
			$this->view=new vModificar;
		}
		function home(){
			}	
		

   
    /**
    * 
    * @return esta función llama al método modificar el cual si nos retorna true 
    * redirigimos a la página home
    *o por el contrario a la página de error
    */


		function modificar(){
		if(isset($_POST['email'])){ 
        $nif=filter_input(INPUT_POST, 'nif', FILTER_SANITIZE_STRING); 
    
        $email=filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);    
        $nombre_usuario=filter_input(INPUT_POST, 'nusuario', FILTER_SANITIZE_STRING);
        $_SESSION['user']=$nombre_usuario;
        $telefono=filter_input(INPUT_POST, 'telefono', FILTER_SANITIZE_STRING);
        $direccion=filter_input(INPUT_POST, 'direccion', FILTER_SANITIZE_STRING);          
        $poblacion=filter_input(INPUT_POST, 'poblacion', FILTER_SANITIZE_STRING);
        $codigo_postal=filter_input(INPUT_POST, 'cpostal', FILTER_SANITIZE_STRING);
        $password=md5(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
        $user=$this->model->modificar($nif,$email,$poblacion,$codigo_postal,$direccion,$telefono,$nombre_usuario,$password);
         if ($user==TRUE){
               header('Location:'.APP_W.'home');
         }
         else{
               header('Location:'.APP_W.'error');
             }
  		  }
		}

        function modificarlibro(){
            // var_dump("entra");
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
        $user=$this->model->modificarlibro($nombre,$idioma,$imagen,$isbn,$precio,$valoration,$stock,$editorial,$n_paginas,$edicion,$novedad,$alt,$descripcion);
         
         if ($user==TRUE){
               header('Location:'.APP_W.'home');
         }
         else{
               header('Location:'.APP_W.'error');
             }
          }
        // }

	}

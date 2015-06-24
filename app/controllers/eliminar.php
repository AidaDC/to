<?php /**
* @author Andreu Sanz Miedes y Aida Dahdah Castelló
* @author asanzm.sanz@gmail.com, aidadahdah@gmail.com
* @copyright 2015 PROYECTO FINAL
* @version 1.0
*/
	class Eliminar extends Controller{
		
		function __construct(){
			parent::__construct($this->params);
			$this->conf=Registry::getInstance();


      $this->model=new mEliminar;
      $this->view=new vEliminar;
		}
		function home(){
		}

		 /**
    * 
    * @return esta funcion llama al metodo eliminar el cual si nos retorna true 
    * redirigimos a la pagina eliminado correctamente
    *o por el contrario a la pagina de error
    */
			
		function eliminar(){
    if(isset($_POST['id'])){ 
      /*die;*/

		    $id=filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
        $user=$this->model->eliminar($id);
         if ($user==TRUE){
               // cap a la pàgina principal
               header('Location:'.APP_W.'home');
               //echo $email;
         }
         else{
             // no hi és l'usuari, cal registrar
               header('Location:'.APP_W.'error');
             }
  		  }
		}

	}
<?php /**
* @author Andreu Sanz Miedes y Aida Dahdah Castelló
* @author asanzm.sanz@gmail.com, aidadahdah@gmail.com
* @copyright 2015 PROYECTO FINAL
* @version 1.0
*/
		class Gestionar extends Controller{
		
		function __construct(){
			parent::__construct($this->params);
			$this->conf=Registry::getInstance();

			$this->model=new mGestionar;
			$this->view=new vGestionar;
		}

		function home(){
			
			}


      /**
    * 
    * @return esta función llama al método gestionar el cual si nos retorna true 
    * redirigimos a la página gestionar
    *o por el contrario a la página de error
    */ 
		function gestionarcompras(){
		if(isset($_SESSION['rol'])){ 	
		$user=$this->model->gestionar();
         if ($user==TRUE){
               header('Location:'.APP_W.'gestionar');
         }
         else{
               header('Location:'.APP_W.'gestionar');
             }
  		  }
		}

          /**
    * 
    * @return esta función llama al método gestionarusuarios el cual si nos retorna true 
    * redirigimos a la página gestionar
    *o por el contrario a la página de error
    */ 
		function gestionarusuarios(){
		if(isset($_SESSION['rol'])){ 	
		$user=$this->model->gestionarusuarios();
        if ($user==TRUE){
               header('Location:'.APP_W.'gestionar');
         }
         else{
               header('Location:'.APP_W.'gestionar');
             }
  		  }
		}

         /**
    * 
    * @return esta función llama al método gestionarlibros el cual si nos retorna true 
    * redirigimos a la página gestionar
    *o por el contrario a la página de error
    */ 
		function gestionarlibros(){
    if(isset($_POST['id'])){ 

		$id=filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
        $user=$this->model->gestionarlibros($id);
         if ($user==TRUE){
               header('Location:'.APP_W.'gestionar');
         }
         else{
               header('Location:'.APP_W.'error');
             }
  		  }
		}


        /**
    * 
    * @return esta función llama al método gestionarperfil el cual si nos retorna true 
    * redirigimos a la página gestionar
    *o por el contrario a la página de error
    */ 

    function gestionarperfil(){
    if(isset($_SESSION['rol'])){  
    $user=$this->model->gestionarperfil();
        if ($user==TRUE){
               header('Location:'.APP_W.'gestionar');
         }
         else{
               header('Location:'.APP_W.'error');
             }
        }
    }

   function gestionarperfilibros($id){
    if(isset($_SESSION['rol'])){  
    $id=filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
    $user=$this->model->gestionarperfilibros($id);
        if ($user==TRUE){
               header('Location:'.APP_W.'gestionar');
         }
         else{
               header('Location:'.APP_W.'error');
             }
        }
    }



    function gestionlibros(){
    if(isset($_SESSION['rol'])){  
    $user=$this->model->gestionlibros();
        if ($user==TRUE){
               header('Location:'.APP_W.'gestionar');
         }
         else{
               header('Location:'.APP_W.'error');
             }
        }
    }

     function gestionargenero(){
    if(isset($_SESSION['rol'])){  
    $genero=filter_input(INPUT_POST, 'genero', FILTER_SANITIZE_STRING);
    $user=$this->model->gestionargenero($genero);
        if ($user==TRUE){
               header('Location:'.APP_W.'gestionar');
         }
         else{
               header('Location:'.APP_W.'error');
             }
        }
    }

}
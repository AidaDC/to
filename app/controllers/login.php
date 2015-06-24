<?php /**
* @author Andreu Sanz Miedes y Aida Dahdah Castelló
* @author asanzm.sanz@gmail.com, aidadahdah@gmail.com
* @copyright 2015 PROYECTO FINAL
* @version 1.0
*/
	class Login extends Controller{
		
		function __construct(){
			parent::__construct($this->params);
			$this->conf=Registry::getInstance();

			$this->model=new mlogin;
			$this->view=new vlogin;
		}
		function home(){
						
		}

		  
    /**
    * 
    * @return esta función llama al método login el cual si nos retorna true 
    * redirigimos a la página home
    *o por el contrario a la página de registro
    */

		function login(){
		if(isset($_POST['usuario'])){
         $nusuario=filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
         $password=md5(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
         $user=$this->model->login($nusuario,$password);
         if ($user== TRUE){
               header('Location:'.APP_W.'home');
         }
         else{
               header('Location:'.APP_W.'reg');
             }
  		  }
		}
	}
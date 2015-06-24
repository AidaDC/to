<?php /**
* @author Andreu Sanz Miedes y Aida Dahdah Castelló
* @author asanzm.sanz@gmail.com, aidadahdah@gmail.com
* @copyright 2015 PROYECTO FINAL
* @version 1.0
*/

	final class home extends Controller{
		
		function __construct($params){
			parent::__construct($params);
			$this->conf=Registry::getInstance();
			$this->model=new mHome($params);
			$this->view=new vHome;
		}

      /**
    * 
    * @return esta función llama al método gestionarhome el cual si nos retorna true 
    * redirigimos a la página home
    *o por el contrario a la página de error
    */ 
		public function home(){
       $user=$this->model->gestionarhome();
        if ($user==TRUE){
         }
         else{
               header('Location:'.APP_W.'error');
             }

    }	

    /**
    * 
    * @return esta función se encarga de destruir las variables de sesión 
    * y redirigir a la página home una vez salgamos de nuestra sesión.
    */
       function salir(){
        session_destroy();
        $this->home();
         header('Location:'.APP_W);
    }
	}
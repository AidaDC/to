<?php /**
* @author Andreu Sanz Miedes y Aida Dahdah Castelló
* @author asanzm.sanz@gmail.com, aidadahdah@gmail.com
* @copyright 2015 PROYECTO FINAL
* @version 1.0
*/
		class Carrito extends Controller{
		
		function __construct(){
			parent::__construct($this->params);
			$this->conf=Registry::getInstance();

			$this->model=new mCarrito;
			$this->view=new vCarrito;
		}

		function home(){
			
			}

 /**
    * 
    * @return esta función llama al método carrito el cual si nos retorna true 
    * redirigimos a la página carrito
    *o por el contrario a la página de error
    */

        function carrito(){
    if(isset($_SESSION['rol'])){  
      
    $id=filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
    $nombre=filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
    $precio=filter_input(INPUT_POST, 'precio', FILTER_SANITIZE_STRING);
    $cantidad=1;
    $user=$this->model->carrito($id,$nombre,$precio,$cantidad);
        if ($user==TRUE){
               header('Location:'.APP_W.'carrito');
         }
         else{
               header('Location:'.APP_W.'error');
             }
        }
    }


     /**
    * 
    * @return esta función llama al método gestionarcarrito el cual si nos retorna true 
    * redirigimos a la página home
    *o por el contrario a la página de error
    */

     function gestionarcarrito(){

    if(isset($_SESSION['rol'])){  
        $precio=filter_input(INPUT_POST, 'precio', FILTER_SANITIZE_NUMBER_FLOAT, 
        FILTER_FLAG_ALLOW_FRACTION);
        $id1=filter_input(INPUT_POST, 'lib1', FILTER_SANITIZE_NUMBER_INT);
        $id2=filter_input(INPUT_POST, 'lib2', FILTER_SANITIZE_NUMBER_INT);
        $id3=filter_input(INPUT_POST, 'lib3', FILTER_SANITIZE_NUMBER_INT);
        $id4=filter_input(INPUT_POST, 'lib4', FILTER_SANITIZE_NUMBER_INT);
        $id5=filter_input(INPUT_POST, 'lib5', FILTER_SANITIZE_NUMBER_INT);
        $id6=filter_input(INPUT_POST, 'lib6', FILTER_SANITIZE_NUMBER_INT);
        $id7=filter_input(INPUT_POST, 'lib7', FILTER_SANITIZE_NUMBER_INT);
        $id8=filter_input(INPUT_POST, 'lib8', FILTER_SANITIZE_NUMBER_INT);
        $id9=filter_input(INPUT_POST, 'lib9', FILTER_SANITIZE_NUMBER_INT);
        $tarjetacredito=filter_input(INPUT_POST, 'tarjetacredito', FILTER_SANITIZE_NUMBER_INT);
         $user=$this->model->gestionarcarrito($precio,$id1,$id2,$id3,$id4,$id5,$id6,$id7,$id8,$id9,$tarjetacredito);
   
        if ($user==TRUE){
               header('Location:'.APP_W.'home');
         }
         else{
               header('Location:'.APP_W.'error');
             }
        }
    }


	
}
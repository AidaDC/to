<?php /**
* @author Andreu Sanz Miedes y Aida Dahdah Castelló
* @author asanzm.sanz@gmail.com, aidadahdah@gmail.com
* @copyright 2015 PROYECTO FINAL
* @version 1.0
*/
	final class Install extends Controller{
		
		function __construct($params){
			parent::__construct($params);
			$this->conf=Registry::getInstance();

			$this->model=new mInstall($params);
			$this->view=new vInstall;
		}
		function home(){
			
		}
		function create(){
			$dbname=$_POST['dbname'];
			if ($this->model->create($dbname)){
				//create file .deployed
				$fp = fopen(ROOT.'.deployed', 'w');
				// and redirects to home
				echo '<meta http-equiv="refresh" content="0; URL='.APP_W.'home/">';
				//header('location: '.APP_W.'home');
			};
			
		}
	}
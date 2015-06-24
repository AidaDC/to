<?php /**
* @author Andreu Sanz Miedes y Aida Dahdah Castelló
* @author asanzm.sanz@gmail.com, aidadahdah@gmail.com
* @copyright 2015 PROYECTO FINAL
* @version 1.0
*/

	class Controller {
		protected $model;
		protected $view;
		protected $params;
		protected $conf;
		function __construct($params){
			$this->params=$params;
			$this->conf=Registry::getInstance();
			
		}

		function ajax_set($output){
			ob_clean();
			$resp=json_encode($output);
			echo $resp;
		}
	}


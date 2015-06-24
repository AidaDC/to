<?php /**
* @author Andreu Sanz Miedes y Aida Dahdah Castelló
* @author asanzm.sanz@gmail.com, aidadahdah@gmail.com
* @copyright 2015 PROYECTO FINAL
* @version 1.0
*/
	class Model {
			protected $db;
			protected $params_in;
			protected $data_out;
			protected $conf;

		function __construct($params=null){
			$this->conf=Registry::getInstance();

			$this->params_in=$params;
			if($this->conf->deployed!='false'){
				$this->db=DB::singleton();
       			$this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			}
		}
	}
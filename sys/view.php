<?php /**
* @author Andreu Sanz Miedes y Aida Dahdah Castelló
* @author asanzm.sanz@gmail.com, aidadahdah@gmail.com
* @copyright 2015 PROYECTO FINAL
* @version 1.0
*/
	
	class View{
		protected $reg;
		
		function __construct($contents){
			$this->reg=Registry::getInstance();
			//access to app_data
			$array_app=(array)$this->reg->app_data;
			ob_start();
			Template::load($contents,$array_app);
				
		}
		
	}